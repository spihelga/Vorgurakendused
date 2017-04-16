<?php
	require_once('head.html');
?>

<div id="wrap">
	<h3>Valiku tulemus</h3>
	
	<?php
		if (empty($_GET["pilt"])) exit ("You may still choose something");
			$pictures = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless4.jpg", "nameless5.jpg", "nameless6.jpg");
			$picnum = count($pictures);
		if (isset($_GET["pilt"]) && $_GET["pilt"] <= $picnum) $picnum = $_GET["pilt"]-1;
		else exit ("Something went wrong");
		if(isset($_GET["pilt"])) echo 'You have chosen picture '.$_GET["pilt"];
	?>

</div>

<?php
	require_once('foot.html');
?>
