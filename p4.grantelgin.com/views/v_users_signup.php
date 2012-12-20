<h2>
Bureaucracy helps you keep track of your red tape.
</h2>

<div class="profileContainer">

<form method="POST" name='new-post' action="/users/p_signup" style="width:300px;">

	<input type="text" name="first_name" placeholder="first name" style="width:294px; height:40px; margin:0px; padding-left:5px;">
	<br>
	
	<input type="text" name="last_name" placeholder="last name" style="width:294px; height:40px; margin:0px; padding-left:5px;">
	<br>

	<input type="text" name="email" placeholder="email" style="width:294px; height:40px; margin:0px; padding-left:5px;">
	<br>

	<input type="password" name="password" placeholder="*******" style="width:294px; height:40px; margin:0px; padding-left:5px;">
	<br>
	
	<div id='results'></div>	
	<div style="width:100%; height:40px; margin:0px;">
		<div class="formDesc">
			<span style="padding-left:10px; padding-top:10px; vertical-align:middle; height:100%;">Signup for Bureaucracy</span>
	
			<input type="submit" value="Sign up" name="Sign up">
			<br><br>
		</div>
	</div>
	<div class="linkSignup" style="width:300px; margin:auto; text-align:center;">
		<a href="/users/login">Already&nbsp;have&nbsp;an&nbsp;account?<br>Login here</a>
	</div>
</form>
</div>

<script type='text/javascript'>
	
	// Set up the options for Ajax and our form
//	var options = { 
//		type: 'POST',
//		url: '/users/p_signup/',
//		beforeSubmit: function() {
//			$('#results').html("Adding...");
//			var text = $(':text');
//			for (i=0; i< text.length; i++)
//			{
//				console.log(text[i]);
//				if ($(text[i]).val() == '')
//					$('#results').html("fill it out");
//			}
//
//		},
//		success: function(response) { 	
//			$('#results').html(response);
//		} 
//	}; 
//		
//	// Using the above options, Ajax'ify the form	
//	$('form[name=new-post]').ajaxForm(options);
//	
</script>