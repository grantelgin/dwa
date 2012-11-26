$(document).ready(function () {
// listen for click on div and play the audio element with similar id. 
	$(".string").click(function () {
 		thisString = $(this).attr("id");
 		thisAudio = 'Audio_' + thisString;
 		thisStringElem = document.getElementById(thisAudio);

 		if (isPlaying(thisStringElem)) {
     		thisStringElem.pause();
     		thisStringElem.currentTime = 0;
     	}
     	else {
    		thisStringElem.play();
    	}		 
    }); // end of click listener 

    function isPlaying(thisStringElem) { 
    	return !thisStringElem.paused; 
    }; 	

}); // end of document ready