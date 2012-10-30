<form method='POST' action='/posts/p_follow'>
		
	<? foreach($users as $user): ?>
	
		<!-- Print this user's name -->
		<?=$user['first_name']?> <?=$user['last_name']?>
		
		<!-- If there exists a connection with this user, show a unfollow link -->
		<? if(isset($connections[$user['user_id']])): ?>
			<a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>
		
		<!-- Otherwise, show the follow link -->
		<? else: ?>
			<a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
		<? endif; ?>
	
		<br><br>
	
	<? endforeach; ?>
	
	<br><br>
	<div>Can I display just the users this guy is following?<br><br>
		
		<? foreach($users as $user): ?>
		<? if(isset($connections[$user['user_id']])): ?>
		<?=$user['first_name']?> <?=$user['last_name']?> <a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a><br>
		
		<? else: ?>
			
			
		<? endif; ?>
		
		
		
		
		<? endforeach; ?>
		
	</div>
	
	
	<div>
		<? foreach($users as $user): ?>
	
		<!-- Print this user's name -->
		<h2><?=$user['first_name']?> <?=$user['last_name']?>  <span class="trade">Unicorn Juggler, Gargoyle</span></h2>
		
		<!-- If there exists a connection with this user, show a unfollow link -->
		<? if(isset($connections[$user['user_id']])): ?>
			<span class="unfollow"><a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a></span>
		
		<!-- Otherwise, show the follow link -->
		<? else: ?>
			<span class="follow"><a class="follow" href='/posts/follow/<?=$user['user_id']?>'>Follow</a></span>
		<? endif; ?>
	
		<br><br>
	
	<? endforeach; ?>
	</div>
	
</form>