<?php
	require_once('head.html');

//session_start();
//require_once('fun.php');
//connect_db();

$page="pealeht";
if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
}

switch($page){
	case "pealeht":
		include("pealeht.html");
	break;
	case "discgolf":
		include("discgolfist.html");
	break;
	case "players":
		include("players.html");
	break;
	default:
		include("pealeht.html");
	break;
}
require_once('foot.html');
?>
