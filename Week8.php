<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<title>Spihelga Vorgurakendused</title>

	<?php
	$here="Your text will be here";
		if (isset($_POST['here']) && $_POST['here']!="") {
		$here=htmlspecialchars($_POST['here']);
		}
	$textc="#FFFF00";
		if (isset($_POST['textc']) && $_POST['textc']!="") {
		$textc=htmlspecialchars($_POST['textc']);
		}
	$bgc="#008000";
		if (isset($_POST['bgc']) && $_POST['bgc']!="") {
		$bgc=htmlspecialchars($_POST['bgc']);
		}
	$textsize="15";
		if (isset($_POST['textsize']) && $_POST['textsize']!="") {
		$textsize=htmlspecialchars($_POST['textsize']);
		}
	$borderc="#000000";
		if (isset($_POST['borderc']) && $_POST['borderc']!="") {
		$borderc=htmlspecialchars($_POST['borderc']);
		}
	$borderw="1";
		if (isset($_POST['borderw']) && $_POST['borderw']!="") {
		$borderw=htmlspecialchars($_POST['borderw']);
		}
	$borderr="50";
		if (isset($_POST['borderr']) && $_POST['borderr']!="") {
		$borderr=htmlspecialchars($_POST['borderr']);
		}
	?>
		<style type="text/css">
			.Entity {
				border-radius:<?php echo $borderr; ?>px;
				width:500px;
				border-style:dashed;
				color:<?php echo $textc; ?>;
				background:<?php echo $bgc; ?>;
				padding:10px;
				border-width:<?php echo $borderw; ?>px;
				border-color:<?php echo $borderc; ?>;
				font-size:<?php echo $textsize; ?>px;
				}
		</style>
	</head>
	
<body>
	<div class="Entity">
		<?php echo $here; ?>
	</div>
	<form action="Week8.php" method="POST">
		<fieldset>
  			<legend>Tekst ja taust</legend>
  			<input type="text" value="Insert text here" name="here"/><br></br>
			<input type="color" name="textc" value="<?php echo $textc; ?>"/> Text color<br></br>
			<input type="color" name="bgc" value="<?php echo $bgc; ?>"/> Background color<br></br>
		</fieldset>
		<fieldset>
			<legend>Piirjoone parameetrid</legend>
			<input type="range" name="textsize" max="20" min="5" step="1" value="<?php echo $textsize; ?>"."px"/> Text size<br></br>
			<input type="color" name="borderc" value="<?php echo $borderc; ?>"/> Border color<br></br>
			<input type="range" name="borderw" max="20" min="1" step="1" value="<?php echo $borderw; ?>"."px"/> Border weight<br></br>
			<input type="number" name="borderr" max="100" min="5" step="1" value="<?php echo $borderr; ?>"."px"/> Border corner radius<br></br>
 		</fieldset>
			<input type="submit" value="Submit" name="sbutton"/>
	</form>

</body>
//<?php

//if (isset($_POST['text1'])){
//	; }
	//echo "<p>  ".$_POST['text1']."</p>"; }

//<?php $bg_col="#fff"; // vaikimisi valge
//if (isset($_POST['bg_color']) && $_POST['bg_color']!="") {
//    $bg_col=htmlspecialchars($_POST['bg_color']);
//}?> 
</html>
