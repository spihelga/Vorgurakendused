<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)

	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	// siia on vaja funktsionaalsust
	global $connection;
	$puurid = array();
	$number = array();
	$sql = "SELECT DISTINCT puur, nimi FROM spihelgaloomaaed ORDER BY puur";   			//SQL lause järgmises muutujas
	$saadud = mysqli_query($connection, $sql) or die ("$query - " .mysqli_error($connection));	//Tulemuse rida
	
	while($i = mysqli_fetch_assoc($saadud)) {
		$puurid[$i['puur']]=$i['puur'];
	}
	
	$loomad = array();
	
	foreach($puurid as $value){
		$loomad[$value] = array();
		$loomarida ="SELECT * FROM spihelgaloomaaed WHERE puur=$value";
		$saadud2 = mysqli_query($connection, $loomarida);
		
		while ($j = mysqli_fetch_assoc($saadud2)){
			array_push($loomad[$j['puur']], $j['liik']);
		}
	}
		
	echo "<pre>";
	print_r($loomad);
	echo "</pre>";

	include_once('views/puurid.html');
	
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
	
	include_once('views/loomavorm.html');
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>
