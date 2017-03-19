var ball = document.getElementsByClassName("bead");
	//console.log(ball);
	window.onload = function() {
		
		for (var i = 0; i < ball.length; i++) {
			ball[i].onclick = function () {
				uusfloat(this);
			}	
		}
		
		function uusfloat(theone) {
			if (window.getComputedStyle(theone).getPropertyValue("float") == "left") {
				theone.style.cssFloat = "right";
			}
			else if (window.getComputedStyle(theone).getPropertyValue("float") == "right") {
				theone.style.cssFloat = "left";
			}
		} 
	};
	