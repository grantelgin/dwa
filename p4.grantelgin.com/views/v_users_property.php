<div class="profileContainer">
	
		<p>Do you own or rent your home?</p>
<form name='new-post' method='POST' action='/users/p_ownsProperty' style="margin:auto;padding-left:20px; padding-top:30px;">
		<input type="submit" value="own" class="btn" name="ownsHome" style="width:120px; height:40px; margin:0px; padding-left:5px; float:left;" >
</form>

<form name='new-post' method='POST' action='/users/p_rentsProperty' style="margin:auto;padding-left:20px; padding-top:30px;">	
		<input type="submit" value="rent" class="btn" name="ownsHomeNo" title="No" onclick="ownsOrRents('rents');" style="width:120px; height:40px; margin:0px; padding-left:5px; float:left;" >	
		
		
</form>
<div style="clear:both;">&nbsp;</div>

</div>

<div id='results'></div>

