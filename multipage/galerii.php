<?php
	require_once('head.html');
?>

<div id="wrap">
	<h3>Fotod</h3>
	<div id="gallery">
		<?php
			$pictures = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless4.jpg", "nameless5.jpg", "nameless6.jpg");
			foreach ($pictures as $pos => $name) {
				$pos+=1;
			echo '<img src="pildid/'.$name.'" alt="nimetu '.$pos.'" />';
			}
		?>
	</div>
</div>

<?php
	require_once('foot.html');
?>
