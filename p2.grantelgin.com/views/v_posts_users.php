<form method='POST' action='/posts/p_follow'>
		
			
	<div>
		<? foreach($users as $user): ?>
	
		<!-- Print this user's name -->
		<h2><a href="/users/profile/<?=$user['user_id']?>"><?=$user['first_name']?> <?=$user['last_name']?></a>  <span class="trade"></span></h2>
		
		<!-- If there exists a connection with this user, show a unfollow link -->
		<? if(isset($connections[$user['user_id']])): ?>
			<div class="unfollow" ><a style="padding-left:30px;" href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a></div>
		
		<!-- Otherwise, show the follow link -->
		<? else: ?>
			<div class="follow" ><a style="padding-left:30px;" href='/posts/follow/<?=$user['user_id']?>'>Follow</a></div>
		<? endif; ?>
	
		<br><br>
	
	<? endforeach; ?>
	</div>
	
</form>