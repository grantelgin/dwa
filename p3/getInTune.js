(function(){
console.log(window.jQuery.fn.jquery);
//check for jQuery v.1.6.3 or later. If not here, load it.
var v = '1.6.3';

if (window.jQuery === undefined || window.jQuery.fn.jquery < v) {
	var done = false;
	var script = document.createElement('script');
	script.src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js";
	script.onload = script.onreadystatechange = function(){
		if (!done && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")) {
		done = true;
		console.log(window.jQuery.fn.jquery);
		initGetInTune();
		}
	};
	document.getElementsByTagName("head")[0].appendChild(script);
} else {
console.log(window.jQuery.fn.jquery);
	initGetInTune();
  }
  
  // Append divs to body and load tuner. 
  function initGetInTune() {
	  var containerDiv = document.createElement('div');
	  var div1 = '<div id="DIV_tuner"style="width:250px;height:160px;background-color:#dbecff;padding:10px;position:fixed;top:10px;right:10px; z-index:999;">';
	  var div2 = '<div style="color:black;font-family:sans-serif;font-weight:bold;font-size:16px;float:left;">Get in tune!</div>';
	  var div3 = '<div style="color:black;font-family:sans-serif;font-weight:bold;font-size:22px;float:right;"><a href="javascript:$(\'#DIV_tuner\').hide()">X</a></div><br><br>';
	  var div4 = '<div style="color:black;font-family:sans-serif;font-weight:bold;font-size:16px;float:left; margin-bottom:5px;">Standard tuning</div><br>';
	  var div5E = '<div id="E" class="string" style="width:30px;height:30px;border:1px solid #007cff;background-color:#06538b;color:white;font-family:sans-serif;font-weight:bold;font-size:20px;text-align:center;padding-top:10px;margin-top:5px;margin-right:5px;float:left;cursor:pointer;"><audio src="http://grantelgin.com/dwa/p3/audio/E.mp3" id="Audio_E" loop="loop"></audio>E</div>';
	  var div5A = '<div id="A" class="string" style="width:30px;height:30px;border:1px solid #007cff;background-color:#06538b;color:white;font-family:sans-serif;font-weight:bold;font-size:20px;text-align:center;padding-top:10px;margin-top:5px;margin-right:5px;float:left;cursor:pointer;"><audio src="http://grantelgin.com/dwa/p3/audio/A.mp3" id="Audio_A" loop="loop"></audio>A</div>';
	  var div5D = '<div id="D" class="string" style="width:30px;height:30px;border:1px solid #007cff;background-color:#06538b;color:white;font-family:sans-serif;font-weight:bold;font-size:20px;text-align:center;padding-top:10px;margin-top:5px;margin-right:5px;float:left;cursor:pointer;"><audio src="http://grantelgin.com/dwa/p3/audio/D.mp3" id="Audio_D" loop="loop"></audio>D</div>';
	  var div5G = '<div id="G" class="string" style="width:30px;height:30px;border:1px solid #007cff;background-color:#06538b;color:white;font-family:sans-serif;font-weight:bold;font-size:20px;text-align:center;padding-top:10px;margin-top:5px;margin-right:5px;float:left;cursor:pointer;"><audio src="http://grantelgin.com/dwa/p3/audio/G.mp3" id="Audio_G" loop="loop"></audio>G</div>';
	  var div5B = '<div id="B" class="string" style="width:30px;height:30px;border:1px solid #007cff;background-color:#06538b;color:white;font-family:sans-serif;font-weight:bold;font-size:20px;text-align:center;padding-top:10px;margin-top:5px;margin-right:5px;float:left;cursor:pointer;"><audio src="http://grantelgin.com/dwa/p3/audio/B.mp3" id="Audio_B" loop="loop"></audio>B</div>';
	  var div51 = '<div id="1" class="string" style="width:30px;height:30px;border:1px solid #007cff;background-color:#06538b;color:white;font-family:sans-serif;font-weight:bold;font-size:20px;text-align:center;padding-top:10px;margin-top:5px;margin-right:5px;float:left;cursor:pointer;"><audio src="http://grantelgin.com/dwa/p3/audio/1stStringE.mp3" id="Audio_1" loop="loop"></audio>e</div>';
	  var div6 = '<div style="clear:both;"></div><div style="color:black;font-family:sans-serif;font-size:15px;float:left;padding-top:20px;">Click a note above to hear the tone.<br>Click it again to stop.</div>';
	  var div7 = '<script type="text/javascript">$(document).ready()(function(){$(".string").click(function(){thisString=$(this).attr("id");thisAudio=\'Audio_\' + thisString;thisStringElem=document.getElementById(thisAudio);if(isPlaying(thisStringElem){document.getElementById(thisAudio).pause();document.getElementById(thisAudio).currentTime=0;}else{document.getElementById(thisAudio).play();}console.log("was clicked");});function isPlaying(thisStringElem){return !thisStringElem.paused;}});</script>';
	  var div8 = '</div>'; 
	  
	  containerDiv.innerHTML = div7 + div1 + div2 + div3 + div4 + div5E + div5A + div5D + div5G + div5B + div51 + div6 +  div8;
	  document.body.appendChild(containerDiv);
  
  console.log($('#Audio_1').src());
  console.log($('#E').html());
  
  }

}());
	
