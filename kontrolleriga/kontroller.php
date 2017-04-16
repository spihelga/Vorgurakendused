<?php
require_once('head.html');

$pictures = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless4.jpg", "nameless5.jpg", "nameless6.jpg");

if (isset($_GET['page'])) $check = $_GET['page'];
	switch ($check) {
		case 'galerii':
			include 'galerii.php';
			break;
		case 'vote':
			include 'vote.php';
			break;
		case 'tulemus':
			include 'tulemus.php';
			break;
		default:
			include 'pealeht.php';
	}
else include 'pealeht.php';

require_once('foot.html');
?>