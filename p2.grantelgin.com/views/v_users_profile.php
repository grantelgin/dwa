
<div class="profileLeft">
	<div class="userCardContainer" style="padding-top:0px;">
		
		<div class="picOuter" style="float:left;">
			<div class="picBorder"><img src="../images/login1.jpg" alt="login1" width="80" height="80" /></div>
		</div>
		
		<div style="float:left; padding-left:10px; padding-top:0px;">

	<? foreach($userName as $user): ?>
			<h2>
				<?=$user['first_name']?> <?=$user['last_name']?> 
				<span class="trade">
					<? foreach($trades as $trade): ?>
						<?=$trade['trade'];?>
					<? endforeach; ?>
				</span> 
			</h2>
	<? endforeach; ?>		
			
			
		</div>
	</div>
	
	
	<div style="clear:both;"></div>
	
	<div>
	
		<? foreach($postContent as $post): ?>
			<div class="post">
				<?=$post['content']?><br>
				<span class="postCaption">posted on: <?=date('D, M d, Y  g:i a', $post['posts_created'])?></span>
			</div>
		
		<? endforeach; ?>
	
	</div>
	
	<!-- <div class="linkSignup" style="width:300px; margin:auto; text-align:center;"><a href="/posts/p_locate">Mark current location as a pitch!</a></div> -->
	
</div>

<div class="profileRight">
	<? foreach($followedUsers as $fu): ?>
		<div class="post">
			<?=$fu['first_name']?> <?=$fu['last_name']?>
		</div>
	
	<? endforeach; ?>
	
	
</div>
