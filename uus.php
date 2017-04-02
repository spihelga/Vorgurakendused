<?php

$kassid=array(
	array('nimi'=>'Miisu', 'vanus'=>2, 'omanik'=>'Risto', 'karvavarvus'=>'pruun', 'kaal(kg)'=>5),
	array('nimi'=>'Tom', 'vanus'=>1, 'omanik'=>'Elisabeth', 'karvavarvus'=>'roheline', 'kaal(kg)'=>4)	
);

include 'kujundus.html';
foreach($kassid as $kass){
	echo "<p>";
	echo "<div>";
	
	
	echo "<span>{$kass['nimi']}</span> on {$kass['vanus']} aastane, {$kass['karvavarvus']} {$kass['kaal(kg)']} kg kaaluv kass";	

	echo "</div>";	
	echo "</p>";	



}
?>
