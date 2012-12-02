
<div class="title" style="padding-top:30px; padding-bottom:10px; text-align:center;">Manage the buskers you follow below.</div>
<form method='POST' action='/posts/p_follow'>
		
			
	<div>
		<? foreach($users as $user): ?>
		<div class="post">
		<!-- Print this user's name -->
		<h2><a href="/users/profile/<?=$user['user_id']?>"><?=$user['first_name']?> <?=$user['last_name']?></a>  
			<span class="trade"><?=$user['trade']?></span></span>
		</h2>
		
		<!-- If there exists a connection with this user, show a unfollow link -->
		<? if(isset($connections[$user['user_id']])): ?>
			<div class="unfollow" ><a style="padding-left:30px;" href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a></div>
		
		<!-- Otherwise, show the follow link -->
		<? else: ?>
			<div class="follow" ><a style="padding-left:30px;" href='/posts/follow/<?=$user['user_id']?>'>Follow</a></div>
		<? endif; ?>
	
		<br>
		
	</div>
	<? endforeach; ?>

	
	</div>
	
</form>