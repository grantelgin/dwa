<?php

class users_controller extends base_controller {
	
	public function __construct()
	{
		
		parent::__construct();
	}
	
	public function index()
	{
		Router::redirect("/users/property/");
		#index will avoid 404 page if uesr doesn't specify a method
	}
	
	public function property()
	{
		# Setup view
		$this->template->content = View::instance("v_users_property");
		$this->template->title = "Where?";
	
		# Load CSS / JS
		$client_files = Array(
				"",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
	
		# Render template
		echo $this->template;

	}
	
	public function p_property ()
	{
		# Prepare the fields to be inserted in to the correct tables
		# Encrypt the password
		
		
		# insert this user in to the databse
		$profile = DB::instance(DB_NAME)->insert("profiles", $_POST);
	}

	

	
} # end of users_controller class