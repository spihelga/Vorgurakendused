<!DOCTYPE html>
<html>

<head>
	<meta charset="tuf-8">
	<title> Spihelga Vorgurakendused</title>
</head>

<body>

<?php

$muutuja="Loodus";
$uus="";
	for($i=0, $length=mb_strlen($muutuja); $i<$length; $i++){
		$uus .=$muutuja{$length-$i-1};
	}
print_r($uus);

 ?>

</body>

</html>
