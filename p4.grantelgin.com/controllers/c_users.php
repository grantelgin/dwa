<?php

class users_controller extends base_controller {
	
	public function __construct()
	{
		
		parent::__construct();
	}
	
	public function index()
	{
		Router::redirect("/users/signup");
		#index will avoid 404 page if uesr doesn't specify a method
	}
	
	public function signup()
	{
		# Setup view
		$this->template->content = View::instance("v_users_signup");
		$this->template->title = "Signup";
	
		# Load CSS / JS
		$client_files = Array(
				"/css/style.css",
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
		#$art['trade'] = $_POST['art'];
		#$art['user_id'] = $user_id;
		#$trade = DB::instance(DB_NAME)->insert("trades", $art);
		
		#$connection['user_id'] = $user_id;
		#$connection['user_id_followed'] = $user_id;
		#$connection['created'] = $_POST['created'];
		#$connection1 = DB::instance(DB_NAME)->insert("users_users", $connection);
		
		Router::redirect("/users/login");
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
			Router::redirect("/users/location/");
		
			# But if we did, login succeeded! 
		} 
		else
		 {	
			 # Store this token in a cookie
			 setcookie("token", $token, strtotime('+1 year'), '/');
		
			 # Send them to the main page - or whever you want them to go
			 Router::redirect("/users/location");			
		}
	}

	
	
	public function location()
	{
		# Set up the view
		$this->template->content = View::instance("v_users_location");
		$this->template->title = "location";
		
		# Load CSS / JS
		$client_files = Array(
				
				"/js/jquery.form.js",
				"/css/style.css",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
		
		echo $this->template;

	}
	#TODO - establish profile_id on location, update that record on property, auto, etc.
	
	public function p_location ()
	{
		$_POST['created']     = Time::now();
		$_POST['modified']    = Time::now();
		$locPost['home_city'] = $_POST['home_city'];
		$locPost['home_st']   = $_POST['home_st'];
		$locPost['work_city'] = $_POST['work_city'];
		$locPost['work_st']   = $_POST['work_st'];
		$locPost['created']   = $_POST['created'];
		$locPost['modified']  = $_POST['modified'];
		
		$q = "SELECT city_id 
			FROM cities 
			WHERE City = '".$_POST['home_city']."' LIMIT 1";
			
	    $locPost['homeCity_id'] = DB::instance(DB_NAME)->select_field($q);
	    
	    $q = "SELECT city_id 
			FROM cities 
			WHERE City = '".$_POST['work_city']."' LIMIT 1";
		
		$locPost['workCity_id'] = DB::instance(DB_NAME)->select_field($q);
		
		#$data = Array("hasAutomobile" => "1");
		DB::instance(DB_NAME)->update("users", $locPost, "WHERE user_id = ".$this->user->user_id);
		#$user_id = DB::instance(DB_NAME)->insert("users", $locPost);
		
		#$profile_id = $user_id;
		#print_r($this->profile_id);
		#echo Debug::dump($_POST, "profile_id");
		Router::redirect("/users/property");
		
	}
	
	public function property()
	{
		#$user_id = $this->user->user_id;
		# Set up the view
		$this->template->content = View::instance("v_users_property");
		$this->template->title = "prop";
		
		# Load CSS / JS
		$client_files = Array(
				
				"/js/jquery.form.js",
				"/css/style.css",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);

		
		echo $this->template;
		#echo "User id is".$user_id;
		#print_r($user_id);
		
	}
	
	public function p_ownsProperty()
	{
		$user_id = $this->user->user_id;

		$_POST['ownsHome'] = '1'; 
		
		
		DB::instance(DB_NAME)->update("users", $_POST, "WHERE user_id = ".$user_id);
		Router::redirect("/users/auto");
		#print_r('what');
		#print_r($this->profile_id);
		#echo Debug::dump($_POST, "profile_id");
	}
	
	public function p_rentsProperty()
	{
		$user_id = $this->user->user_id;

		$_POST['ownsHome'] = '0'; 
		
		
		DB::instance(DB_NAME)->update("users", $_POST, "WHERE user_id = ".$user_id);
		Router::redirect("/users/auto");
		#print_r('what');
		#print_r($this->profile_id);
		#echo Debug::dump($_POST, "profile_id");
	}

	
	
	public function auto()
	{
		# Set up the view
		$this->template->content = View::instance("v_users_auto");
		$this->template->title = "auto";
		
		# Load CSS / JS
		$client_files = Array(
				
				"/js/jquery.form.js",
				"/css/style.css",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);

		
		echo $this->template;

	}
	
	public function p_Auto()
	{
		$user_id = $this->user->user_id;
if (isset($_POST['hasAutomobile']))    
{    
          $auto['hasAutomobile'] = '1'; 
}    
if (isset($_POST['hasDriversLic']))    
{    
          $auto['hasDriversLic'] = '1'; 
}    
		
		
		
		DB::instance(DB_NAME)->update("users", $auto, "WHERE user_id = ".$user_id);
		Router::redirect("/users/business");
		#print_r('what');
		#print_r($this->profile_id);
		#echo Debug::dump($_POST, "profile_id");
	}


	public function business()
	{
		# Set up the view
		$this->template->content = View::instance("v_users_business");
		$this->template->title = "business";
		
		echo $this->template;

	}
	
	public function p_business()
	{
		$user_id = $this->user->user_id;

		if (isset($_POST['hasBiz']))    
{    
          $biz['hasBiz'] = '1'; 
}    
 
		
		
		DB::instance(DB_NAME)->update("users", $_POST, "WHERE user_id = ".$user_id);
		Router::redirect("/users/bizlic");
		#print_r('what');
		#print_r($this->profile_id);
		#echo Debug::dump($_POST, "profile_id");
	}

	
	public function bizlic()
	{
		# Set up the view
		$this->template->content = View::instance("v_users_bizlic");
		$this->template->title = "license";
		
		echo $this->template;

	}
	
	public function p_bizlic()
	{
		$user_id = $this->user->user_id;

		
		
		
		DB::instance(DB_NAME)->update("users", $_POST, "WHERE user_id = ".$user_id);
		Router::redirect("/users/auto");
		#print_r('what');
		#print_r($this->profile_id);
		#echo Debug::dump($_POST, "profile_id");
	}



	
} # end of users_controller class