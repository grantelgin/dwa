<?php

class regulators_controller extends base_controller {
	
	public function __construct() 
	{	
		parent::__construct();
		
		# Make sure user is logged in if they want to use anything in this controller
		    if (!$this->user) {
		    	die("Members only. <a href='/users/login/'>Please login</a>"); 
		    }	
	}
	
		
	public function reglist() 
	{
		# Set up the view
		$this->template->content = View::instance("v_regulators_reglist");
		$this->template->title   = "Regulators";
		
		# Load CSS / JS
		$client_files = Array(
				"/css/style.css",
				"/js/regulators.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
        
        # Build our query to get all the data for this user
        $q = "SELECT * FROM users WHERE user_id = ".$this->user->user_id;
        
		$users = DB::instance(DB_NAME)->select_rows($q);
		
		# Build our query to get all the regulators
		$q = "SELECT *
			FROM regulators r
			LEFT JOIN regulatorCities c ON r.regulator_id = c.regulator_id";
	
		# Execute the query to get all the regulators. Store the result array in the variable $regulators
		$regulators = DB::instance(DB_NAME)->select_rows($q);
	
				
		# Pass data (users and regulators) to the view
		$this->template->content->regulators = $regulators;
		$this->template->content->users      = $users;
			
		# Render the view
		echo $this->template;
	}
	

	public function profile($regulator_id = null)
	{
		
		# Setup view
		$this->template->content = View::instance('v_regulators_profile');
		
				# Load CSS / JS
		$client_files = Array(
				"/css/style.css",
				"/js/regulators.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
			
		# Build a query of this regulators info
		$q = "SELECT *
		FROM regulators r
		WHERE regulator_id = ".$regulator_id;
			
		# Execute our query, storing the results in a variable 
		$regulatorsProfile = DB::instance(DB_NAME)->select_rows($q);
		
		$q = "SELECT * FROM complianceItems WHERE regulator_id = ".$regulator_id;
		
		# Execute our query, storing the results in a variable 
		$complianceItems = DB::instance(DB_NAME)->select_rows($q);
		
		$q = "SELECT *
		FROM regulators r
		LEFT JOIN cities c ON r.regulatorCityId = c.city_id";
		
		# Execute our query, storing the results in a variable 
		$cities = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass data to the view
		$this->template->content->regulatorsProfile = $regulatorsProfile;
		$this->template->content->complianceItems = $complianceItems;
		$this->template->content->cities = $cities;
		
		# Render view
		echo $this->template;	
	}

	public function items()
	{
		
		# Setup view
		$this->template->content = View::instance('v_regulators_items');
		
				# Load CSS / JS
		$client_files = Array(
				"/css/style.css",
				"/js/regulators.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
					
		$q = "SELECT *
			FROM regulators r
			LEFT JOIN complianceItems c ON r.regulator_id = c.regulator_id";
	
		# Execute the query to get all the users. Store the result array in the variable $users
		$complianceItems = DB::instance(DB_NAME)->select_rows($q);
				
		# Pass data to the view
		$this->template->content->complianceItems = $complianceItems;
		
		# Render view
		echo $this->template;	
	}

		
	
}