
<div id="wrap">
	<h3>Valiku tulemus</h3>

	<?php
		if (!empty($_POST)){
			if (!empty($_POST["pilt"])){

			$pictures = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless4.jpg", "nameless5.jpg", "nameless6.jpg");
                        $picnum = count($pictures);
			$picn = intval($_POST["pilt"]-1);
				
				if (!empty($_SESSION['pilt'])){
				echo "Already voted <br />";
				echo $_POST["pilt"];
				}
			else if ($picn <= $picnum) {
				$_SESSION["pilt"] = $picn+1;
				echo "You chose this picture <br />";
				echo $_POST["pilt"];
			}
		}}
		else {exit ("You may still choose something");}



/*
		if (empty($_POST['pilt']))
			 exit ("You may still choose something");
	
			$pictures = array("nameless1.jpg", "nameless2.jpg", "nameless3.jpg", "nameless4.jpg", "nameless5.jpg", "nameless6.jpg");
			$picnum = count($pictures);

		if (isset($_POST['pilt']) && $_POST['pilt'] <= $picnum) 
			$picnum = $_POST['pilt']-1;
		else exit ("Something went wrong");
		
		if (isset($_POST['pilt'])){ 

			if (!empty($_SESSION['pilt'])){
			echo "<p>You have chosen this picture </p>";
			echo $_POST['pilt'];
			}
		}*/
	?>
<p>
	<a href="?page=end_s">End session</a>
</p>

</div>
