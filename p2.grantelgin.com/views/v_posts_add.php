<form method="POST" action='/posts/p_add'>


<p>Check in to a pitch</p>

<input class="pitchInput" type="text" name="pitchName" placeholder="Name of pitch" /><br>

<input class="pitchInput" type="text" name="pitchLocation" placeholder="<?=$location['city'] ?>, <?= $location['state'] ?>" /><br>
<p>When were you there?</p><br>
<input class="pitchInput" type="text" name="pitchTime" placeholder="<?=date('D, M d, Y  g:i a', $now) ?>" style="width:294px; height:40px; margin:0px; padding-left:5px;" />


<h2>Comment on this location</h2>
<textarea name='content' placeholder="How was your performance? Good crowd?"></textarea><br>


<p>Pedestrian traffic</p>
<input name='pedTraffic' class="pitchInput" type="range" value="20" min="0" max="100" step="20" /><br>

<p>Visibility</p>
<input name='visibility' class="pitchInput" type="range" value="20" min="0" max="100" step="20" /><br>

<p>background noise level</p>
<input name='bgNoise' class="pitchInput" type="range" value="20" min="0" max="100" step="20" /><br>

<p>Crowd generosity</p>
<input name='generosity' class="pitchInput" type="range" value="20" min="0" max="100" step="20" /><br>


<br><br>
<input class="pitchInput" type='submit' />

</form>