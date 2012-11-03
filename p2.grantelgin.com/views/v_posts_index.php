<div style="padding-left:20px;">
<? foreach($posts as $post): ?>
	
	<h2><a href="/users/profile/<?=$post['user_id']?>"><?=$post['first_name']?> <?=$post['last_name']?></a><span class="trade">  <?=$post['trade']?>
	</span></h2>
	<div class="postCaption">
		posted on: <?=date('D, M d, Y  g:i a', $post['p_created'])?>
	</div>
	<div class="post">
		<?=$post['content']?>
	</div>
	
	<br>
	
<? endforeach; ?>

</div>