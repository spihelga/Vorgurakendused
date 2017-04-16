
<div id="wrap">
	<h3>Valiku tulemus</h3>

	<?php
		if (empty($_POST['pilt'])) exit ("You may still choose something");
			$pictures = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless4.jpg", "nameless5.jpg", "nameless6.jpg");
			$picnum = count($pictures);
		if (isset($_POST['pilt']) && $_POST['pilt'] <= $picnum) $picnum = $_POST['pilt']-1;
		else exit ("Something went wrong");
		if (isset($_POST['pilt'])) echo $_POST['pilt'];
	?>

</div>
