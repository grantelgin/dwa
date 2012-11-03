<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/global.css">
				
	<!-- Controller Specific JS/CSS -->
	<?php echo @$client_files; ?>
	
</head>

<body>	

	<div id='menu' class='menu'>
	
		<!-- Menu for users who are logged in -->
		<? if($user): ?>
		
		<span class="logo">busker</span>
			
			<a href='/users/profile'>Your profile</a>
			<a href='/posts/users/'>Performers</a>
			<a href='/posts/'>Performer posts</a>
			<a href='/posts/add'>Add a new post</a>
			<a href='/users/logout'>Logout</a>
		
		<!-- Menu options for users who are not logged in -->
		<? else: ?>
		
			
		
		<? endif; ?>
	
	</div>
	
	<div style="margin-top:30px;">
	
	<?=$content;?> 
	
	</div>
	
</body>
</html>