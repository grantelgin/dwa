<div class="title" style="padding-top:30px; padding-bottom:10px; text-align:center;">Regulators</div>
<form method='POST' action='/posts/p_follow'>
		
			
	<div>
		<? foreach($complianceItems as $ci): ?>
		<div class="post">
		<!-- Print this user's name -->
		<h2>
	<?=$ci['ciName']?>
	
</h2>
<h2>
	<?=$ci['ciDesc']?>
	
</h2>

		<img src="../images/<?=$ci['regulatorLogo']?>.png" alt="logo_1" width="100" />
		<h2><a href="/users/profile/<?=$ci['regulator_id']?>"><?=$ci['regulatorName']?></a>  
			<span class="trade"><?=$ci['regulatorWww']?></span></span>
		</h2>
		<h2>
			<?=$ci['regulatorPhone']?>
		</h2>
		<h2>
			<?=$ci['regulatorAddDesc']?>
		</h2>
		<h2>
			<?=$ci['regulatorStreet1']?>
		</h2>
		<h2>
			<?=$ci['regulatorStreet2']?>
		</h2>
		


		
		<!-- If there exists a connection with this user, show a unfollow link -->
				<br>
		
	</div>
	<? endforeach; ?>
		</div>
	
</form>