<div class="title" style="padding-top:30px; padding-bottom:10px; text-align:center;">Regulators</div>
<form method='POST' action='/posts/p_follow'>
		
			
	<div>
		<? foreach($complianceItems as $ci): ?>
		<div class="post" style="width:600px;">
		<!-- Print this user's name -->
		<div style="float:left;">
		<img src="../images/<?=$ci['regulatorLogo']?>.png" alt="logo_1" width="60" />
</div>
<div style="float:left;">
<p>
	<?=$ci['ciName']?><br/>
	<?=$ci['ciDesc']?>
</p>
</div>
<div style="float:right;">
		<p><a href="/regulators/profile/<?=$ci['regulator_id']?>"><?=$ci['regulatorName']?></a><br/>  
			<span class="trade"><?=$ci['regulatorWww']?></span></span>
		</p>
		<p>
			<?=$ci['regulatorPhone']?><br/>
			<?=$ci['regulatorAddDesc']?><br/>
			<?=$ci['regulatorStreet1']?><br/>
			<?=$ci['regulatorStreet2']?><br/>
		</p>
		
</div>
<div style="clear:both;">&nbsp;</div>
		
		<!-- If there exists a connection with this user, show a unfollow link -->
				<br>
		
	</div>
	<? endforeach; ?>
		</div>
	
</form>