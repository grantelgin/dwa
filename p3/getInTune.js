(function(){

	var setStyles = function(els, stl)
	{
		for (var i=0; i < els.length; i++) els[i].setAttribute('style', stl);
	}
	
	var BUTTON_STYLE = 'width:30px; height:30px; border:1px solid #00ff00; background-color: #159040; color:white; font-family: sans-serif; font-weight:bold; font-size:20px; text-align: center; padding-top:5px; margin-right:5px; float:left;';
	var CONTAINER_STYLE = 'position:fixed;top:10px;right:10px;border:2px solid #000; width:300px; height: 200px; background-color: #dbecff; padding: 10px;';
	
	var CLOSE_LNK_STYLE = 'float: right; margin: 0 0 5px 5px; padding: 5px; border: 1px #008 solid;color:#00f;background-color:#ccf;';
	
	var outlineHTML = '<div id="E" class="string"><audio src="audio/E.mp3" id="Audio_E" loop="loop"></audio>E</div><div id="A" class="string"><audio src="audio/A.mp3" id="Audio_A" loop="loop"></audio>A</div><div id="D" class="string"><audio src="audio/D.mp3" id="Audio_D" loop="loop"></audio>D</div><div id="G" class="string"><audio src="audio/G.mp3" id="Audio_G" loop="loop"></audio>G</div><div id="B" class="string"><audio src="audio/B.mp3" id="Audio_B" loop="loop"></audio>B</div><div id="1" class="string"><audio src="audio/1stStringE.mp3" id="Audio_1" loop="loop"></audio>e</div>
 <div style="clear:both;"></div>'
	
	var containerDiv = document.createElement('div');
	setStyles([containerDiv], CONTAINER_STYLE);
	containerDiv.innerHTML = outlineHTML;
	
	var lnk = containerDiv.insertBefore(document.createElement('a'), containerDiv.firstChild);
	setStyles([lnk], CLOSE_LNK_STYLE);
	lnk.innerHTML = 'Close';
	lnk.href='#';
	lnk.onclick=function(){ document.body.removeChild(containerDiv); containerDiv = lnk = null; };
	
	document.body.appendChild(containerDiv);
	
}());