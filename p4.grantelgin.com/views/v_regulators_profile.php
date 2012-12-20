<div class="title" style="padding-top:30px; padding-bottom:10px; text-align:center; width:600px;">Regulators</div>
		
			
	<div style="width:600px;">
		<? foreach($regulatorsProfile as $regulator): ?>
			<div class="post">
		
				<img src="../../images/<?=$regulator['regulatorLogo']?>.png" alt="logo_1" width="100" />
		
				<h2>
					<a href="/regulators/profile/<?=$regulator['regulator_id']?>"><?=$regulator['regulatorName']?></a><br>  
					<span class="trade"><?=$regulator['regulatorWww']?></span>
				</h2>
				<p>
					<?=$regulator['regulatorPhone']?><br>
					<?=$regulator['regulatorAddDesc']?><br>
					<?=$regulator['regulatorStreet1']?><br>
					<?=$regulator['regulatorStreet2']?>
				</p>
		
				<p>
					<?=$regulator['regAddDesc2']?><br>
					<?=$regulator['regAddStreet12']?><br>
					<?=$regulator['regAddStreet22']?>
				</p>

				<p>
					<?=$regulator['regAddDesc3']?><br>
					<?=$regulator['regAddStreet13']?><br>
					<?=$regulator['regAddStreet23']?>
				</p>

				<br>
		
			</div>
		<? endforeach; ?>
		
		<div>
			<h2>Compliance Items</h2>
			<? foreach($complianceItems as $ci): ?>

				<p>
					<?=$ci['ciName']?><br>
					<?=$ci['ciDesc']?>
				</p>
			<? endforeach; ?>
		</div>
	</div>
	
</form>