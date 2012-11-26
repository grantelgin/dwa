$(document).ready(function () {
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

}); 

function isPlaying(thisStringElem) { 
    return !thisStringElem.paused; 
}; 	


}); // end of document ready