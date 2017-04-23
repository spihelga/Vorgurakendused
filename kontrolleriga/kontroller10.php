<?php
session_start();

require_once('head.html');

$pictures = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless4.jpg", "nameless5.jpg", "nameless6.jpg");

function end_this_s(){
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(), '', time()-60, '/');
	}
	$_SESSION=array();
	session_destroy();
}

if (isset($_GET['page'])) $check = $_GET['page'];
if (!empty($check))
	switch ($check) {
		case 'galerii':	include 'galerii.php';	break;
		case 'vote':	include 'vote.php';	break;
		case 'tulemus':	include 'tulemus.php';	break;
		case 'end_s': end_this_s(); include 'pealeht.php'; break;
		default:	include 'pealeht.php';
	}
else include 'pealeht.php';

require_once('foot.html');
?>
