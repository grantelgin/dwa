<div class="title" style="padding-top:30px; padding-bottom:10px; text-align:center;">Regulators</div>
<form method='POST' action='/posts/p_follow'>
		
			
	<div>
		<? foreach($regulatorsProfile as $regulator): ?>
		<div class="post">
		<!-- Print this user's name -->
		<img src="../images/<?=$regulator['regulatorLogo']?>.png" alt="logo_1" width="100" />
		<h2><a href="/users/profile/<?=$regulator['regulator_id']?>"><?=$regulator['regulatorName']?></a>  
			<span class="trade"><?=$regulator['regulatorWww']?></span></span>
		</h2>
		<h2>
			<?=$regulator['regulatorPhone']?>
		</h2>
		<h2>
			<?=$regulator['regulatorAddDesc']?>
		</h2>
		<h2>
			<?=$regulator['regulatorStreet1']?>
		</h2>
		<h2>
			<?=$regulator['regulatorStreet2']?>
		</h2>
		


		
		<!-- If there exists a connection with this user, show a unfollow link -->
				<br>
		
	</div>
	<? endforeach; ?>
	<div>
	<? foreach($complianceItems as $ci): ?>

<h2>
	<?=$ci['ciName']?>
	
</h2>
<h2>
	<?=$ci['ciDesc']?>
	
</h2>




	<? endforeach; ?>
	</div>
	</div>
	
</form>