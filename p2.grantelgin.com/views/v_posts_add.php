<div class="title" style="text-align:center; padding-top:20px;">Share details about a pitch!</div>

<form method="POST" action='/posts/p_add' style="width:300px; margin:auto;">



<input class="pitchInput" type="text" name="pitchName" placeholder="Name of pitch" style="width:100%; height:40px; margin:0px; padding:0px;" /><br>

<input class="pitchInput" type="text" name="pitchLocation" placeholder="<?=$location['city'] ?>, <?= $location['state'] ?>" style="width:100%; height:40px; margin:0px; padding:0px;" /><br>
<div class="title">When were you there?</div><br>
<input class="pitchInput" type="text" name="pitchTime" placeholder="<?=date('D, M d, Y  g:i a', $now) ?>" style="width:100%; height:40px; margin:0px; padding:0px;" />


<h2>Comment on this location</h2>
<textarea name='content' placeholder="How was your performance? Good crowd?" style="width:100%; height:100px; margin:0px; padding:0px;"></textarea><br>


<p>Pedestrian traffic</p>
<input name='pedTraffic' class="pitchInput" type="range" value="20" min="0" max="100" step="20" style="width:100%; height:10px; margin:0px; padding:0px;" /><br>

<p>Visibility</p>
<input name='visibility' class="pitchInput" type="range" value="20" min="0" max="100" step="20" style="width:100%; height:10px; margin:0px; padding:0px;" /><br>

<p>Background noise level</p>
<input name='bgNoise' class="pitchInput" type="range" value="20" min="0" max="100" step="20" style="width:100%; height:10px; margin:0px; padding:0px;" /><br>

<p>Crowd generosity</p>
<input name='generosity' class="pitchInput" type="range" value="20" min="0" max="100" step="20" style="width:100%; height:10px; margin:0px; padding:0px;" /><br>
<br>
<input class="pitchInput" type='submit' />

</form>