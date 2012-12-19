<!DOCTYPE html>
<html>
<head>
	<title><?=@$title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
				
	<!-- Controller Specific JS/CSS -->
	<?=@$client_files; ?>
	
</head>

<body>	

	<div id="Menu_ProfileItems" style="margin:auto;">
		<div style="float:left; margin-right:10px; text-align:center;">Location<br><img src="../images/location.png" alt="location" height="60"></div>
		<div style="float:left; margin-right:10px; text-align:center;">Property<br><img src="../images/property.png" alt="property" height="60"></div>
		<div style="float:left; margin-right:10px; text-align:center;">Auto<br><img src="../images/auto.png" alt="auto" height="60"></div>
		<div style="float:left; margin-right:10px; text-align:center;">Business<br><img src="../images/business.png" alt="business" height="60"></div>
		<div style="float:left; margin-right:10px; text-align:center;">Licenses<br><img src="../images/licenses.png" alt="licenses" height="60"></div>
		
		
		<div style="clear:both;"></div>
		
	</div>

<div>
	<?=$content;?> 
</div>
	<div id="DIV_profile_id" style="display:none;"></div>

</body>
</html>