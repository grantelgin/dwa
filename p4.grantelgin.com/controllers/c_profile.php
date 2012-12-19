<?php

class profile_controller extends base_controller {
	protected $profile_id;
	public function __construct()
	{
		# this gets called every time -- put echo hello world in here - included every time
		# parent construct is the construct method from base_controller -- the extended class.
		parent::__construct();
	}
	
	public function index()
	{
		Router::redirect("/");
		#index will avoid 404 page if uesr doesn't specify a method
	}
	
	public function location()
	{
		# Set up the view
		$this->template->content = View::instance("v_profile_location");
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
		
		$user_id = DB::instance(DB_NAME)->insert("users", $locPost);
		
		$this->profile_id = $profile_id;
		#print_r($this->profile_id);
		#echo Debug::dump($_POST, "profile_id");
		Router::redirect("/profile/property");
		
	}
	
	public function property()
	{
		# Set up the view
		$this->template->content = View::instance("v_profile_property");
		$this->template->title = "prop";
		
		# Load CSS / JS
		$client_files = Array(
				
				"/js/jquery.form.js",
				"/css/style.css",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);

		
		echo $this->template;
		
	}
	
	public function p_property()
	{
		#$_POST['profile_id'] = $this->profile_id;
		#$_POST['ownsCar'] = '1';
		
		$data = Array("hasAutomobile" => "1");
		DB::instance(DB_NAME)->update("profiles", $data, "WHERE profile_id = '".$this->profile_id."'");
		Router::redirect("/profile/auto");
		#print_r('what');
		#print_r($this->profile_id);
		#echo Debug::dump($_POST, "profile_id");
	}
	
	public function auto()
	{
		# Set up the view
		$this->template->content = View::instance("v_profile_auto");
		$this->template->title = "auto";
		
		# Load CSS / JS
		$client_files = Array(
				
				"/js/jquery.form.js",
				"/css/style.css",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);

		
		echo $this->template;

	}

	public function business()
	{
		# Set up the view
		$this->template->content = View::instance("v_profile_business");
		$this->template->title = "business";
		
		echo $this->template;

	}
	
	public function bizlic()
	{
		# Set up the view
		$this->template->content = View::instance("v_profile_bizlic");
		$this->template->title = "license";
		
		echo $this->template;

	}

}