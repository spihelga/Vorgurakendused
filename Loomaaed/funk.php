<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)
global $connection;

if (!empty($_SESSION['user'])){
	header("Location: ?page=loomad");
}
else if (!empty($_SERVER['REQUEST_METHOD'])) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (empty($_POST['user']) || empty($POST['pass'])) {
			$errors[] = "Palun sisesta kasutajanimi ja parool";
		}
		else {
			$user = mysqli_real_escape_string($connection, $_POST['user']);
			$pass = mysqli_real_escape_string($connection, $_POST['pass']);
			
			$sql = "SELECT * FROM spihelga_kylastajad WHERE username='$user' AND passw=SHA1('$pass')";
			$saadud = mysqli_query($connection, $sql);
			
			if (mysqli_num_rows($saadud) != 0){
				while ($roll = mysqli_fetch_assoc($saadud)) {
					$_SESSION['roll'] = $roll['roll'];
				}
				$_SESSION['user'] = 1;
				header("Location: ?page=loomad");
			}
			else {
				$errors[] = "Vale kasutajanimi või parool";
			}
		}
	}
}
include_once('views/login.html');

}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	// siia on vaja funktsionaalsust
	if ($_SESSION['user'] !=1){ 		//see on logi funktsioonis määratud 1-ks või mitte, vaata ülalt
	header("Location: ?page=login");
	}
	else{
		global $connection;
		$puurid = array();
		$number = array();
		$sql = "SELECT DISTINCT puur, nimi FROM spihelgaloomaaed ORDER BY puur";   			//SQL lause järgmises muutujas
		$saadud = mysqli_query($connection, $sql) or die ("$query - " .mysqli_error($connection));	//Tulemuse rida
	
		while($i = mysqli_fetch_assoc($saadud)) {
			$puurid[$i['puur']]=$i['puur'];
		}
	
		$loomad = array();
	
		foreach($puurid as $value){				//igale puurile oma rida
			$loomad[$value] = array();	
			$loomarida ="SELECT * FROM spihelgaloomaaed WHERE puur=$value";
			$saadud2 = mysqli_query($connection, $loomarida);
	
			while ($j = mysqli_fetch_assoc($saadud2)){	//igale puurile loom
				array_push($loomad[$j['puur']], $j['liik']);	//lisan arraysse
			}
		}
	
		echo "<pre>";
		print_r($loomad);
		echo "</pre>";
	
		include_once('views/puurid.html');
	}
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)
global $connection;
if ($_SESSION['user'] = 1 && $_SESSION['roll'] == 'admin'){
	if(!empty($_SERVER['REQUEST_METHOD'])){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(empty($_POST['nimi']) || empty($_POST['puur']) || upload('liik') == ""){
				$errors[] = "Vorm pole korrektselt täidetud";
			}
			else{
				$nimi = mysqli_real_escape_string($connection,$_POST['nimi']);
				$puur = mysqli_real_escape_string($connection,$_POST['puur']);
				$liik = mysqli_real_escape_string($connection,upload('liik'));

				$sql = "INSERT INTO spihelgaloomaaed (nimi, puur, liik) VALUES ('$nimi', $puur, '$liik')";
				$saadud = mysqli_query($connection, $sql);
				echo mysqli_insert_id($connection);

				if(mysqli_insert_id($connection) !=0){
					header("Location: ?page=loomad");
				}
			}
		}
	}
}
else{
header("Location: ?page=login");
}
include_once('views/loomavorm.html');
}

function hangi_loom($id) {
global $connection;

$sql = "SELECT * FROM spihelgaloomaaed WHERE id=$id";
$saadud = mysqli_query($connection, $sql) or die ("See loom on veel tulemata");

	if (mysqli_num_rows($saadud) !=0) {
		$info = array();
		while ($rida=mysqli_fetch_assoc($saadud)) {
			$info=$rida;
		
		return $info;
		}
	}
	else {
		header("Location: ?page=loomad");
	}
}

function muuda(){
global $connection;

	if ($_SESSION['user'] = 1 && $_SESSION['roll'] == 'admin'){
		
		if (!empty($_SERVER['REQUEST_METHOD'])){
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				if (empty($_POST['id']) || ($_GET['page'] != 'muuda')){
					header("Location: ?page=loomad");
				}
				hangi_loom($_POST['id']);
				if (empty($_POST['nimi']) || upload('liik') == ""){
					$errors[] = "Looma pole veel lisatud";
				}
				else{
					$nimi = mysqli_real_escape_string($connection, $_POST['nimi']);
					$puur = mysqli_real_escape_string($connection, $_POST['puur']);
					$liik = mysqli_real_escape_string($connection, $_POST['liik']);
					
					$sql = "UPDATE spihelgaloomaaed SET nimi='$nimi', puur='$puur', liik='$liik'";
					$saadud = mysqli_query($connection, $sql);
					echo mysqli_insert_id($connection);

					header("Location: ?page=loomad");
				}
			}
		}
	}
include_once('views/editvorm.html');
}


function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}

?>
