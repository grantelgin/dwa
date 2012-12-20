<div class="profileContainer">


<form method='POST' action='/users/p_login' name="login" style="width:300px;">

	
	<input type='text' name='email' placeholder="email" style="width:100%; height:40px; margin:0px; padding:0px;">
	<br>
	<input type='password' name='password' placeholder="password" style="width:100%; height:40px; margin:0px; padding:0px;">

	<div style="width:100%; height:40px; margin:0px;">
		<div class="formDesc"><span style="padding-left:10px; padding-top:10px; vertical-align:middle; height:100%;">Bureaucracy login</span>
			
			<input type="submit" value="Log in" name="Log in">
		</div>
	</div>
	<div id='results' class="error"></div>
	<div class="linkSignup" style="width:300px; margin:auto; text-align:center;"><a href="/users/signup">or<br>Signup here</a></div>
	
</form>

</div>

<script type='text/javascript'>
	
	// Set up the options for Ajax and our form
	var options = { 
		type: 'POST',
		url: '/users/p_login/',
		beforeSubmit: function() {
			$('#results').html("Logging in...");
		},
		success: function(response) { 	
			$('#results').html(response);
		} 
	}; 
	// Using the above options, Ajax'ify the form	
	$('form[name=login]').ajaxForm(options);
	
</script>