<?php

class users_controller extends base_controller {
	
	public function __construct()
	{
		# this gets called every time -- put echo hello world in here - included every time
		# parent construct is the construct method from base_controller -- the extended class.
		parent::__construct();
	}
	
	public function index()
	{
		Router::redirect("/users/profile/");
		#index will avoid 404 page if uesr doesn't specify a method
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
		# Prepare the fields to be inserted in to the correct tables
		# Encrypt the password
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['token']    = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		$userPost['password']   = $_POST['password'];
		$userPost['created']    = $_POST['created'];
		$userPost['modified']   = $_POST['modified'];
		$userPost['token']      = $_POST['token']; 
		$userPost['email']      = $_POST['email']; 
		$userPost['first_name'] = $_POST['first_name']; 
		$userPost['last_name']  = $_POST['last_name']; 
		
		# insert this user in to the databse
		$user_id = DB::instance(DB_NAME)->insert("users", $userPost);
		
		#Insert data in to the trades table after the users table item has been created
		$art['trade'] = $_POST['art'];
		$art['user_id'] = $user_id;
		$trade = DB::instance(DB_NAME)->insert("trades", $art);
		
		$connection['user_id'] = $user_id;
		$connection['user_id_followed'] = $user_id;
		$connection['created'] = $_POST['created'];
		$connection1 = DB::instance(DB_NAME)->insert("users_users", $connection);
		
		Router::redirect("/posts/users");
	}	
	
	public function login()
	{	
		$this->template->content = View::instance("v_users_login");
		$this->template->title = "Login";
		
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
			 Router::redirect("/posts/users");			
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
	
	public function profile($user_id = null)
	{
		# if a user_id is not provided, send the user to their own profile.
		if ($user_id == '')
		{
			$user_id = $this->user->user_id;
		}		
		# Setup view
		$this->template->content = View::instance('v_users_profile');
		
				# Load CSS / JS
		$client_files = Array(
				"/css/global.css",
				"/js/profile.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
			
		# Build a query of this users posts
		$q = "SELECT *, posts.created AS posts_created 
			FROM posts JOIN users USING (user_id)
			WHERE posts.user_id = ".$user_id;
			
		# Execute our query, storing the results in a variable $postContent
		$postContent = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass data to the view
		$this->template->content->postContent = $postContent;
		
		# repeat the Build, Execute, Pass sequence to create a 2nd object accessible from the view.
		$q = "SELECT first_name, last_name 
		FROM users WHERE user_id = ".$user_id;
		
		$userName = DB::instance(DB_NAME)->select_rows($q); 
		
		$this->template->content->userName = $userName;
		
		# repeat the Build, Execute, Pass sequence to create a 3rd object accessible from the view. This will be for the user's trade. 
		$q = "SELECT trade FROM trades WHERE user_id = ".$user_id;
		
		$trades = DB::instance(DB_NAME)->select_rows($q); 
		
		$this->template->content->trades = $trades;
		
		#this is a better layout than print_r(data) for debugging
		#echo Debug::dump($userName, "user_id");
		# Render view
		echo $this->template;	
	}
	

	
} # end of users_controller class