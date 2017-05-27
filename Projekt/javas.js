window.onload = function () {
	var pa = document.getElementById("par").innerHTML;
	var l = pa.length;

	document.getElementById("wcount").value = l;
	document.getElementById("par").addEventListener("mouseover", mouseOver);
	document.getElementById("par").addEventListener("mouseout", mouseOut);	

	function getRandomColor() {
        	var letters = '0123456789ABCDEF';
        	color = '#';
	        	for (var i = 0; i < 6; i++ ) {
        	    	color += letters[Math.floor(Math.random() * 16)];
	        	}
    	}

	function mouseOver() {
		getRandomColor();
		document.getElementById("par").style.color = color;
		}
	function mouseOut() {
	 	document.getElementById("par").style.color = "black";
	}
}

