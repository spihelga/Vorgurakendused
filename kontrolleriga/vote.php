<?php
	require_once('../head.html');
?>

<div id="wrap">
	<h3>Vali oma lemmik :)</h3>
	<form action="tulemus.php" method="POST">
		
		<?php
			$pictures = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless4.jpg", "nameless5.jpg", "nameless6.jpg");
			foreach ($pictures as $pos => $name) {
				$pos+=1;
			echo 	'<p>
						<label for="p"'.$pos.'>
							<img src="pildid/'.$name.'" alt="nimetu '.$pos.'" height="100" />
						</label>
						<input type="radio" value="'.$pos.'" id="p'.$pos.'" name="pilt"/>
					</p>';
			}
		?>
	
		<br><br/>
		<input type="submit" value="Valin!"/>
	</form>

</div>

<?php
	require_once('../foot.html');
?>