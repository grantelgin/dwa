<div class="profileContainer">
	
		<p>Do you own or rent your home?</p>
<form name='new-post' method='POST' action='/users/p_ownsProperty' style="padding-left:20px; padding-top:30px; float:left;">
		<input type="submit" value="own" class="btn" name="ownsHome" style="width:120px; height:40px; margin:0px; padding-left:5px;" >
</form>

<form name='new-post' method='POST' action='/users/p_rentsProperty' style="padding-left:20px; padding-top:30px; float:left;">	
		<input type="submit" value="rent" class="btn" name="ownsHomeNo" title="No" onclick="ownsOrRents('rents');" style="width:120px; height:40px; margin:0px; padding-left:5px;" >	
		
		
</form>
<div style="clear:both;">&nbsp;</div>

</div>

<div id='results'></div>

