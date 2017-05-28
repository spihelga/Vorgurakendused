<?php
	require_once('funk.php');
	session_start();
	connect_db();
	require_once('head.html');

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
	case "kettad":
		include("kettad.html");
	break;
	default:
		include("pealeht.html");
	break;
}
require_once('foot.html');
?>
