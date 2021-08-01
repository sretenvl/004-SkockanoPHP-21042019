<?php
	include("setup/konektor.php");

	$upit = "SELECT * FROM meni";
	$state = $konektor -> query($upit);
	$linkovi = $state -> fetchAll();
	foreach($linkovi as $link){
		$veza = $link -> link;
		$naziv = $link -> naziv;
		echo "<li><a href = '$veza'>$naziv</a></li>";
	}
?>