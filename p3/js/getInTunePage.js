$(".string").click (function () {
 	thisString = $(this).attr("id");
 	thisAudio = 'Audio_' + thisString;
 	thisStringElem = document.getElementById(thisAudio);

 	if (isPlaying(thisStringElem)) {
     	document.getElementById(thisAudio).pause();
     	document.getElementById(thisAudio).currentTime = 0;
    }
    else {
    	document.getElementById(thisAudio).play();
    }		 
}); 	

function isPlaying(thisStringElem) { 
    return !thisStringElem.paused; 
}; 	
