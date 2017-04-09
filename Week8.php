<!DOCTYPE html>


<html>



	<head>
	
		<meta charset="UTF-8">

		<title>Spihelga Vorgurakendused</title>

		<style>
			.view {border:solid black 1px; width:500px; color:Chartreuse; background:black; padding:5px;}
		</style>
	</head>
	
<body>


	<p>
		<div class="view">Example</div>
	</p>
	
	<form action="Week8.php" method="get" id="form1">
 		
		<fieldset>
  			<legend>Tekst ja taust</legend>
  			<input type="text" placeholder="Insert text here" name="text1"/>
			<input type="color" name="textc"/> Text color
			<input type="color" name="bgc"/> Background color
		</fieldset>
		
		<fieldset>
			<legend>Piirjoone parameetrid</legend>			
			<input type="range" name="textsize" max="20" min="5" step="1"/> Text size
			<input type="color" name="borderc"/> Border color
			<input type="range" name="borderweight "max="20" min="1" step="1"/> Border weight
			<input type="range" name="borderr" max="100" min="5" step="1"/> Border corner radius
 		</fieldset>
	<br></br>
	</form>
	<input type="submit" placeholder="Submit" name="sbutton"/>
	</body>



<?php $bg_col="#fff"; // vaikimisi valge
if (isset($_POST['bg_color']) && $_POST['bg_color']!="") {
    $bg_col=htmlspecialchars($_POST['bg_color']);
}?>
</html>
