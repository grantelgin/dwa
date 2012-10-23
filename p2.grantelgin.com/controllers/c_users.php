<?php

class users_controller extends base_controller {
	
	public function __construct(){
		parent::__construct();
		// this gets called every time -- put echo hello world in here - included every time
		echo "users_controller construct method called<br><br>";
	}
	
	public function index(){
		echo "Welcome to the user dept";
		//index will avoid 404 page if uesr doesn't specify a method
	}
	
	public function signup(){
	# Setup view
	$this->template->content = View::instance("v_users_signup");
	$this->template->title = "Signup";
	
	# Render template
	echo $this->template;
		//echo "display the signup page";
	}
	
	public function p_signup (){
		//print_r($_POST);
		
		# insert this user in to the databse
		$user_id = DB::instance(DB_NAME)->insert("users", $_POST);
		
		echo "You all signed up mutha fucka!";
	}	
	
	public function login(){
		echo "display the login page";
	}
	
	public function logout(){
		echo "profile page";
	}
	
	public function profile($user_name){
	# Setup view
	$this->template->content = View::instance('v_users_profile');
	$this->template->title = "Profile";
	
	# Load CSS / JS
	$client_files = Array(
	"css/users.css",
	"js/users.js",
	);
	
	$this->template->client_files = Utils::load_client_files($client_files);
	
	#Pass information to the view
	$this->template->content->user_name = $user_name;
	
	#Render template
	echo $this->template;
		
	
		}
	
	
} # end of users_controller class