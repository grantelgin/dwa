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
				
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
        
        # Build our query to get all the data for this user
        $q = "SELECT * FROM users WHERE user_id = ".$this->user->user_id;
        
		$users = DB::instance(DB_NAME)->select_rows($q);
		
		# Build our query to get all the regulators
		$q = "SELECT *
			FROM regulators r
			LEFT JOIN regulatorCities c ON r.regulator_id = c.regulator_id";
	
		# Execute the query to get all the users. Store the result array in the variable $users
		$regulators = DB::instance(DB_NAME)->select_rows($q);
		
		
		
		# Build our query to figure out what connections does this user already have? I.e. who are they following
		#$q = "SELECT * 
		#	FROM users_users
		#	WHERE user_id = ".$this->user->user_id;
			
		# Execute this query with the select_array method
		# select_array will return our results in an array and use the "users_id_followed" field as the index.
		# This will come in handy when we get to the view
		# Store our results (an array) in the variable $connections
		#$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');
				
		# Pass data (users and connections) to the view
		$this->template->content->regulators    = $regulators;
		$this->template->content->users  = $users;
		
	echo Debug::dump($regulators, "regulator_id");
	echo Debug::dump($users, "user_id");
	
		# Render the view
		echo $this->template;
	}
	
	public function p_profile()
	{
		
		
	}

public function profile($regulator_id = null)
	{
		
		# Setup view
		$this->template->content = View::instance('v_regulators_profile');
		
				# Load CSS / JS
		$client_files = Array(
				"/css/style.css",
				
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
			
		# Build a query of this regulators info
		$q = "SELECT *
		FROM regulators
		WHERE regulator_id = ".$regulator_id;
			
		# Execute our query, storing the results in a variable $postContent
		$regulatorsProfile = DB::instance(DB_NAME)->select_rows($q);
		
		$q = "SELECT * FROM complianceItems WHERE regulator_id = ".$regulator_id;
		
		# Execute our query, storing the results in a variable $postContent
		$complianceItems = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass data to the view
		$this->template->content->regulatorsProfile = $regulatorsProfile;
		$this->template->content->complianceItems = $complianceItems;
		
		# repeat the Build, Execute, Pass sequence to create a 2nd object accessible from the view.
		#$q = "SELECT first_name, last_name 
		#FROM users WHERE user_id = ".$user_id;
		
		#$userName = DB::instance(DB_NAME)->select_rows($q); 
		
		#$this->template->content->userName = $userName;
		
		# repeat the Build, Execute, Pass sequence to create a 3rd object accessible from the view. This will be for the user's trade. 
		#$q = "SELECT trade FROM trades WHERE user_id = ".$user_id;
		
		#$trades = DB::instance(DB_NAME)->select_rows($q); 
		
		#$this->template->content->trades = $trades;
		
		#this is a better layout than print_r(data) for debugging
		#echo Debug::dump($userName, "user_id");
		# Render view
		echo $this->template;	
	}

		
	
}