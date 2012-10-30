
<div class="profileLeft">
	<div class="userCardContainer" style="padding-top:0px;">
		
		<div class="picOuter" style="float:left;">
			<div class="picBorder"><img src="../images/login1.jpg" alt="login1" width="80" height="80" /></div>
		</div>
		
		<div style="float:left; padding-left:10px; padding-top:0px;">
	
	<!--		<? foreach($userdog as $usah): ?>					 -->
	<!--										 					 -->
	<!--	<h2><?=$usah['first_name']?> <?=$usah['last_name']?><br> -->
	<!--	<span class="trade"><?=$usah['trade']?></span>			 -->
	<!--	</h2>								 					 -->
	<!--										 					 -->
	<!--										 					 -->
	<!--	<? endforeach; ?>					 					 --> 
	
			<h2>Grant Elgin <span class="trade">Unicyclist</span></h2>
			<span class="profileLocation">Boston, MA</span>
			<div class="linkEdit" style="width:100px;"><a href="/users/profileEdit">Edit Profile</a></div>
			
		</div>
	</div>
	
	
	<div style="clear:both;"></div>
	
	<div>
	
		<? foreach($postContent as $post): ?>
			<div class="post">
				<?=$post['content']?><br>
				<span class="postCaption">posted on: <?=date('D, M d, Y  g:i a', $post['created'])?></span>
			</div>
		
		<? endforeach; ?>
	
	</div>
	
	<div class="linkSignup" style="width:300px; margin:auto; text-align:center;"><a href="/users/p_locate">Mark current location as a pitch!</a></div>
	
</div>

<div class="profileRight">
	<? foreach($followedUsers as $fu): ?>
		<div class="post">
			<?=$fu['first_name']?> <?=$fu['last_name']?>
		</div>
	
	<? endforeach; ?>
	
	
</div>
