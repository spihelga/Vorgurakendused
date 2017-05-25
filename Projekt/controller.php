<?php
session_start();
//require_once('fun.php');
//connect_db();

$page="pealeht";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}

include_once('head.html');

switch($page){
	case "Pealeht":
		include_once("pealeht.html");
	break;
	case "Discgolfist":
		include_once("discgolfist.html")
	break;
	case "Mängijad":
		include_once("players.html")
	break;
	default:
		include_once('pealeht.html');
	break;
}
include_once('foot.html');
?>
