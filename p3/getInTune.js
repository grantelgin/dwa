(function(){

//check for jQuery v.1.6.3 or later. If not here, load it.
var v = '1.6.3';

if (window.jQuery === undefined || window.jQuery.fn.jquery < v) {
	var done = false;
	var script = document.createElement('script');
	script.src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js";
	script.onload = script.onreadystatechange = function(){
		if (!done && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")) {
		done = true;
		initGetInTune();
		}
	};
	document.getElementsByTagName("head")[0].appendChild(script);
} else {
	initGetInTune();
  }
  
  // Append div to body and load tuner. 
  function initGetInTune() {
	  var containerDiv = document.createElement('div');
	  $(containerDiv).load('http://p3.grantelgin.com/tune.html', function (){ console.log(containerDiv.innerHTML); });
	  document.body.appendChild(containerDiv);
	  
  }

}());
	
