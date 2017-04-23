
<div id="wrap">
	<h3>Vali oma lemmik :)</h3>
	<form action="?page=tulemus" method="POST">

		<?php
			if (!empty($_SESSION['pilt'])) {
				echo "Thank you, you already voted for picture <br />";
			//	echo $_SESSSION["pilt"];
			//echo "<img src=pildid/nameless".$_SESSION["pilt"].".jpg"." alt="."nimetu ".$_SESSION["pilt"]." height="100"";
				
				echo "<a href=\"?page=end_s\">End session</a>";
			}
			else {

			$pictures = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless4.jpg", "nameless5.jpg", "nameless6.jpg");
			foreach ($pictures as $pos => $name) {
				$pos+=1;
			echo 	'<p>
					<label for="p'.$pos.'">
					<img src="pildid/'.$name.'" alt="nimetu '.$pos.'" height="100" />
					</label>
					<input type="radio" value="'.$pos.'" id="p'.$pos.'" name="pilt"/>
				</p>';
			}}
		?>
	
		<br><br/>
		<input type="submit" value="Valin!"/>
	</form>

</div>
