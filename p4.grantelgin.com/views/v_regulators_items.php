<div class="title" style="padding-top:30px; padding-bottom:10px; text-align:center; width:600px;">Regulators</div>
<form method='POST' action='/posts/p_follow'>
		
			
	<div>
		<? foreach($complianceItems as $ci): ?>
		<div class="post" style="width:600px;">
		<!-- Print this user's name -->
<div style="float:left; margin-top:20px;">
		<img src="../images/<?=$ci['regulatorLogo']?>.png" alt="logo_1" width="60" />
</div>

	<p style="padding-left:70px;">
		<?=$ci['ciName']?>
	</p>
	<p style="margin-left:70px;">
		<span style="float:left;"><a href="/regulators/profile/<?=$ci['regulator_id']?>"><?=$ci['regulatorName']?></a></span><span style="float:right;">Add reminder</span>
	</p>

<!-- <div style="float:right;">											    -->
<!-- 		<p><br/>  													    -->
<!-- 			<span class="trade"><?=$ci['regulatorWww']?></span></span>  -->
<!-- 		</p>														    -->
<!-- 		<p>															    -->
<!-- 			<?=$ci['regulatorPhone']?><br/>							    -->
<!-- 			<?=$ci['regulatorAddDesc']?><br/>						    -->
<!-- 			<?=$ci['regulatorStreet1']?><br/>						    -->
<!-- 			<?=$ci['regulatorStreet2']?><br/>						    -->
<!-- 		</p>														    -->
<!-- 		<?=$ci['ciDesc']?>											    -->
<!-- </div>																    -->
<div style="clear:both;">&nbsp;</div>
		
		<!-- If there exists a connection with this user, show a unfollow link -->
				<br>
		
	</div>
	<? endforeach; ?>
		</div>
	
</form>