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

	<div id="Menu_ProfileItems">
		<a href="/users/location"><div class="title" style="float:left; margin-right:10px; text-align:center;">Location<br><img src="../../images/location.png" alt="location" height="60"></div></a>
		<a href="/users/property"><div class="title" style="float:left; margin-right:10px; text-align:center;">Property<br><img src="../../images/property.png" alt="property" height="60"></div></a>
		<a href="/users/auto"><div class="title" style="float:left; margin-right:10px; text-align:center;">Auto<br><img src="../../images/auto.png" alt="auto" height="60"></div></a>
		<a href="/users/business"><div class="title" style="float:left; margin-right:10px; text-align:center;">Business<br><img src="../../images/business.png" alt="business" height="60"></div></a>

	</div>
	
	<div id="Menu_regulatorItems" style="display:none;">
		<a href="/regulators/reglist"><div class="title" style="float:left; margin-right:20px; text-align:center;">Regulatory<br>Organizations</div></a>
		<a href="/regulators/items"><div class="title" style="float:left; margin-right:10px; text-align:center;">Compliance<br>Items</div></a>
	</div>
	<div style="clear:both;"></div>
	<div style="margin-top:30px;">
		<?=$content;?> 
	</div>
	

</body>
</html>