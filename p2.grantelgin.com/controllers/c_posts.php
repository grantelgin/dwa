<?php

class posts_controller extends base_controller {
	
	public function __construct() 
	{	
		parent::__construct();
		
		# Make sure user is logged in if they want to use anything in this controller
		    if (!$this->user) {
		    	die("Members only. <a href='/users/login/'>Please login</a>"); 
		    }	
	}
	
	public function add() 
	{
		# Set up the view
		$this->template->content = View::instance("v_posts_add");
		$this->template->title = "Add a new post";
		
		# Load CSS / JS
		$client_files = Array(
				"/css/global.css",
				"/js/profile.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
        
        #load defaults for placeholders
        $location = Geolocate::locate();   
	  	$now = Time::now();
	  	
	  	$this->template->content->location = $location;
	  	$this->template->content->now = $now;
	  	   
		#Render template
		echo $this->template;
	}
	
	public function p_add() 
	{	
		# if user did not change location shown in placeholder, use ip location
		$location = Geolocate::locate();
		
		# prepare fields to be inserted in to correct table
		$location['ip'] = sha1(TOKEN_SALT.$location['ip'].Utils::generate_random_string());
	  	   $location['user_id']   = $this->user->user_id;
	  	   $location['pitchName'] = $_POST['pitchName'];
	  	   if ($_POST['pitchLocation'] == '')
	  	   {
		  	   $location['userLoc'] = $location['city'].', '.$location['state'];
	  	   }
	  	   else
	  	   {
		  	   $location['userLoc'] = $_POST['pitchLocation'];
	  	   }
	  	   
	  	   if ($_POST['pitchTime'] == '')
	  	   {
		  	  $location['userTime'] =  Time::now();
	  	   }
	  	   else
	  	   {
		  	   $location['userTime'] = $_POST['pitchTime'];
	  	   }
	  	   
	  	   $location['pedTraffic'] = $_POST['pedTraffic'];
	  	   $location['visibility'] = $_POST['visibility'];
	  	   $location['bgNoise']    = $_POST['bgNoise'];
	  	   $location['generosity'] = $_POST['generosity'];
	  	   
		
		$comment['created']  = Time::now();
		$comment['modified'] = Time::now();
		$comment['user_id']  = $this->user->user_id;
		$comment['content']  = $_POST['content'];
		
	  	# insert this post and location in to tables 
	  	DB::instance(DB_NAME)->insert("locations", $location);
	  	DB::instance(DB_NAME)->insert('posts', $comment);
		
		echo "Your post has been added. <a href='/posts/add'>Add another post.</a>";
	}
	
	public function index() 
	{
		# Set up view
		$this->template->content = View::instance('v_posts_index');
		$this->template->title   = "Posts";
		
		# Load CSS / JS
		$client_files = Array(
				"/css/global.css",
				"/js/profile.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
	
		# Build a query of the users this user is following
		$q = "SELECT * 
			FROM users_users
			WHERE user_id = ".$this->user->user_id;
	
		# Execute our query, storing the results in a variable $connections
		$connections = DB::instance(DB_NAME)->select_rows($q);
	
		# In order to query for the posts we need, we're going to need a string of user id's, separated by commas
		# To create this, loop through our connections array
		$connections_string = "";
		foreach($connections as $connection) 
		{
			$connections_string .= $connection['user_id_followed'].",";
		}
	
		# Remove the final comma 
		$connections_string = substr($connections_string, 0, -1);
	
		# Connections string example: 10,7,8 (where the numbers are the user_ids of who this user is following)

		# Now, lets build our query to grab the posts and trades. with multiple 'created' fields, rename the one we will use p.created AS p_created 
		$q = "SELECT *, p.created AS p_created  
			FROM posts p 
			LEFT JOIN users u ON p.user_id = u.user_id
			LEFT JOIN trades t ON p.user_id = t.user_id
			WHERE p.user_id IN (".$connections_string.")"; # This is where we use that string of user_ids we created
				
		# Run our query, store the results in the variable $posts
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass data to the view
		$this->template->content->posts = $posts;
		
		#This is a cleaner debug view than print_r(obj)
		#echo Debug::dump($posts, "user_id");
		
		# Render view
		echo $this->template;
	}
	
	public function users() 
	{
		# Set up the view
		$this->template->content = View::instance("v_posts_users");
		$this->template->title   = "Users";
		
		# Load CSS / JS
		$client_files = Array(
				"/css/global.css",
				"/js/profile.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);
		
		# Build our query to get all the users
		$q = "SELECT *
			FROM users u
			LEFT JOIN trades t ON u.user_id = t.user_id";
			
		# Execute the query to get all the users. Store the result array in the variable $users
		$users = DB::instance(DB_NAME)->select_rows($q);
		
		# Build our query to figure out what connections does this user already have? I.e. who are they following
		$q = "SELECT * 
			FROM users_users
			WHERE user_id = ".$this->user->user_id;
			
		# Execute this query with the select_array method
		# select_array will return our results in an array and use the "users_id_followed" field as the index.
		# This will come in handy when we get to the view
		# Store our results (an array) in the variable $connections
		$connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');
				
		# Pass data (users and connections) to the view
		$this->template->content->users        = $users;
		$this->template->content->connections  = $connections;
		
	
		# Render the view
		echo $this->template;
	}

	public function follow($user_id_followed) 
	{	
		# Prepare our data array to be inserted
		$data = Array(
			"created" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
			);
		
		# Do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);
	
		# Send them back
		Router::redirect("/posts/users");	
	}

	public function unfollow($user_id_followed)
	{
		# Delete this connection
		$where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
		DB::instance(DB_NAME)->delete('users_users', $where_condition);
		
		# Send them back
		Router::redirect("/posts/users");
	}
	
	
}