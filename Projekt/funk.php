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

function kuva() {
	include('kettad.html');
	
	global $connection;
	$sql = "SELECT * FROM spihelga_discs";		//SQL lause järgmises muutujas
	$result = mysqli_query($connection, $sql) or die ("$sql - " .mysqli_error($connection));	//Tulemuse rida
	
	while($row = mysqli_fetch_assoc($result)) {
		echo $row['id']." ".$row['tootja']." ".$row['nimi']." ".$row['liik']." <img src=".$row['pilt']." height='80px' alt='ketas' /> <br/>";
		}
	
//	include('kettad.html');
}

?>
