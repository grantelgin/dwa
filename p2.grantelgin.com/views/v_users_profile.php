

<div>
At least the profile is showing up. If you are seeing this, then it is proof that you currently suck at php. On the bright side, It's one more line of code that is correct. Keep calm, carry on. 

</div>

<div>
<? foreach($userdog as $usah): ?>

	<h2><?=$usah['first_name']?> <?=$usah['last_name']?><br>
	<?=$usah['trade']?>
	</h2>
	
	
<? endforeach; ?>

<? foreach($postContent as $post): ?>
	
	<h2><?=$post['first_name']?> <?=$post['last_name']?> posted:</h2>
	<?=$post['content']?>
	
	<br><br>
	
<? endforeach; ?>

</div>