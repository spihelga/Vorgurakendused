<!DOCTYPE html>

<html>

	<head>
		<meta charset="UTF-8">
		<title>10-Spihelga Vorgurakendused</title>

	<?php
$cookie1 = 'c_text';
setcookie($cookie1, "Your text will be here", time()+60, "/");
$cookie2 = 'c_textc';
setcookie($cookie2, "#FFFF00", time()+60, "/");
$cookie3 = 'c_bgc';
setcookie($cookie3, "#008000", time()+60, "/");
$cookie4 = 'c_textsize';
setcookie($cookie4, "15", time()+60, "/");
$cookie5 = 'c_borderc';
setcookie($cookie5, "#000000", time()+60, "/");
$cookie6 = 'c_borderw';
setcookie($cookie6, "1", time()+60, "/");
$cookie7 = 'c_borderr';
setcookie($cookie7, "50", time()+60, "/");

if(!isset($_COOKIE[$cookie1])) {
	$here="Your text will be here";}
else{
		if (isset($_POST['here']) && $_POST['here']!="") {
		$here=htmlspecialchars($_POST['here']);
		setcookie($cookie1, $here, time()+60, "/");
		}}
if(!isset($_COOKIE[$cookie2])) {
        $textc="#FFFF00";}
else{
		if (isset($_POST['textc']) && $_POST['textc']!="") {
		$textc=htmlspecialchars($_POST['textc']);
		setcookie($cookie2, $textc, time()+60, "/");
		}}
if(!isset($_COOKIE[$cookie3])) {
        $bgc="#008000";}
else{
		if (isset($_POST['bgc']) && $_POST['bgc']!="") {
		$bgc=htmlspecialchars($_POST['bgc']);
		setcookie($cookie3, $bgc, time()+60, "/");
		}}
if(!isset($_COOKIE[$cookie4])) {
        $textsize="15";}
else{
		if (isset($_POST['textsize']) && $_POST['textsize']!="") {
		$textsize=htmlspecialchars($_POST['textsize']);
		setcookie($cookie4, $textsize, time()+60, "/");
		}}
if(!isset($_COOKIE[$cookie5])) {
        $borderc="#000000";}
else{
		if (isset($_POST['borderc']) && $_POST['borderc']!="") {
		$borderc=htmlspecialchars($_POST['borderc']);
		setcookie($cookie5, $borderc, time()+60, "/");
		}}
if(!isset($_COOKIE[$cookie6])) {
        $borderw="1";}
else{
		if (isset($_POST['borderw']) && $_POST['borderw']!="") {
		$borderw=htmlspecialchars($_POST['borderw']);
		setcookie($cookie6, $borderw, time()+60, "/");
		}}
if(!isset($_COOKIE[$cookie7])) {
        $borderr="50";}
else{
		if (isset($_POST['borderr']) && $_POST['borderr']!="") {
		$borderr=htmlspecialchars($_POST['borderr']);
		setcookie($cookie7, $borderr, time()+60, "/");
		}}
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
	<form action="Week10.php" method="POST">
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
</html>
