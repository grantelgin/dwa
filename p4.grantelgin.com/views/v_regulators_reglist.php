<div class="title" style="padding-top:30px; padding-bottom:10px; text-align:center;">Regulators</div>
<form method='POST' action='/regulators/p_profile'>
		
			
	<div>
		<? foreach($regulators as $regulator): ?>
		<div class="post">
		<!-- Print this user's name -->
		<h2><a href="/regulators/profile/<?=$regulator['regulator_id']?>"><?=$regulator['regulatorName']?></a>  
			<span class="trade"><?=$regulator['regulatorWww']?></span></span>
		</h2>
		
		<!-- If there exists a connection with this user, show a unfollow link -->
				<br>
		
	</div>
	<? endforeach; ?>

	
	</div>
	
</form>