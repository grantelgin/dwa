<?php

class users_controller extends base_controller {
	
	public function __construct()
	{
		// this gets called every time -- put echo hello world in here - included every time
		// parent construct is the construct method from base_controller -- the extended class.
		parent::__construct();
	}
	
	public function index()
	{
		Router::redirect("/users/profile/");
		//index will avoid 404 page if uesr doesn't specify a method
	}
	
	public function signup()
	{
		# Setup view
		$this->template->content = View::instance("v_users_signup");
		$this->template->title = "Signup";
	
		# Load CSS / JS
		$client_files = Array(
				"/css/global.css",
				
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
	
		# Render template
		echo $this->template;
	}
	
	public function p_signup ()
	{
		print_r($_POST);
		
		# Encrypt the password
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		$_POST['created'] = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		# insert this user in to the databse
		$user_id = DB::instance(DB_NAME)->insert("users", $_POST);
		
		Router::redirect("/users/profile/");
	}	
	
	public function login()
	{	
		$this->template->content = View::instance("v_users_login");
		$this->template->title = "Login";
		
		# Load CSS / JS
		$client_files = Array(
				"/css/global.css",
				
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
		
		echo $this->template;
	}
	
	public function p_login() 
	{
		# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
	
		# Hash submitted password so we can compare it against one in the db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	
		# Search the db for this email and password
		# Retrieve the token if it's available
		$q = "SELECT token 
			FROM users 
			WHERE email = '".$_POST['email']."' 
			AND password = '".$_POST['password']."'";
	
		$token = DB::instance(DB_NAME)->select_field($q);	
				
		# If we didn't get a token back, login failed
		if(!$token) 
		{	
			# Send them back to the login page
			Router::redirect("/users/login/");
		
			# But if we did, login succeeded! 
		} 
		else
		 {	
			 # Store this token in a cookie
			 setcookie("token", $token, strtotime('+1 year'), '/');
		
			 # Send them to the main page - or whever you want them to go
			 Router::redirect("/users/profile");
			 //echo "Signed in!";			
		}
	}

	public function logout()
	{
		# Generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
	
		# Create the data array we'll use with the update method
		# In this case, we're only updating one field, so our array only has one entry
		$data = Array("token" => $new_token);
	
		# Do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
	
		# Delete their token cookie - effectively logging them out
		setcookie("token", "", strtotime('-1 year'), '/');
	
		# Send them back to the main landing page
		Router::redirect("/");
	}
	
	public function profile($user_name)
	{
		# Setup view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title = "Profile of ".$this->user->first_name;
		
		# Load CSS / JS
		$client_files = Array(
				"/css/global.css",
				"/js/profile.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
			
		# Build a query of this users posts
		$q = "SELECT * 
			FROM posts JOIN users USING (user_id)
			WHERE user_id = ".$this->user->user_id;
			
		$qname = "SELECT * FROM users JOIN trades USING (user_id) WHERE user_id = ".$this->user->user_id;	
		
		# Build a query of the users this user is following - we're only interested in their posts
	$qfollowing = "SELECT * 
		FROM users_users JOIN users USING (user_id)
		WHERE user_id_followed = user_id";
		
		
	
			
			
		# Execute our query, storing the results in a variable $postContent
		$postContent = DB::instance(DB_NAME)->select_rows($q);
		$userman = DB::instance(DB_NAME)->select_rows($qname);
		$usersFollowed = DB::instance(DB_NAME)->select_rows($qfollowing);
		
		
		# Pass data to the view
		$this->template->content->postContent = $postContent;
		$this->template->content->userdog = $userman;
		$this->template->content->followedUsers = $usersFollowed;
		
		#$this->template->content->user_name = $user_name;
	#print_r($usersFollowed);

		# Render view
		echo $this->template;
			
	}
	
	public function trade(){
		# Setup view
		$this->template->content = View::instance('v_users_trade');
		$this->template->title = "Trades for ".$this->user->first_name;
		
		echo $this->template;
		
		
	}
	
	public function p_trade(){
		
		
		$_POST['user_id'] = $this->user->user_id;
		//print_r($_POST);
		$trade = DB::instance(DB_NAME)->insert("trades", $_POST);
		
		Router::redirect("/users/profile/");
		
	}
	
	
	public function p_locate(){
		$location = geolocate::locate();
		print_r($location);
	}
	
	
	
} # end of users_controller class