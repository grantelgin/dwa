<div class="title" style="padding-top:30px; padding-bottom:10px; text-align:center; width:600px;">Here is a list of items you have to be in compliance with.</div>
<form method='POST' action='/posts/p_follow'>
		
		
	<div>
		<? foreach($complianceItems as $ci): ?>
		<div class="post" style="width:600px;">
		
			<div style="float:left; margin-top:20px;">
				<img src="../images/<?=$ci['regulatorLogo']?>.png" alt="logo_1" width="60" />
			</div>

			<p style="padding-left:70px;">
				<?=$ci['ciName']?>
			</p>
			
			<p style="margin-left:70px;">
				<span style="float:left;"><a href="/regulators/profile/<?=$ci['regulator_id']?>"><?=$ci['regulatorName']?></a></span><span style="float:right;">Add reminder</span>
			</p>

			<div style="clear:both;">&nbsp;</div>
		
			<br>
		
		</div>
	
		<? endforeach; ?>
	</div>
	
</form>