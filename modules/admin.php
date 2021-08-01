<?php
	require_once "../setup/konektor.php";
	if(isset($_POST['submit'])){
		$upitUbacivanja = "INSERT INTO listaproizvoda (naziv, opis, cena, ocena, tipproizvodaid) VALUES (:naziv, :opis, :cena, :ocena, :tipproizvodaid)";
		$naziv = $_POST['naziv'];
		$opis = $_POST['opis'];
		$cena = $_POST['cena'];
		$ocena = $_POST['ocena'];
		$tipproizvodaid = $_POST['kategorija'];
		$vezaUbacivanja = $konektor -> prepare("$upitUbacivanja");
		$vezaUbacivanja->bindParam(":naziv", $naziv);
		$vezaUbacivanja->bindParam(":opis", $opis);
		$vezaUbacivanja->bindParam(":cena", $cena);
		$vezaUbacivanja->bindParam(":ocena", $ocena);
		$vezaUbacivanja->bindParam(":tipproizvodaid", $tipproizvodaid);
		$dodaj = $vezaUbacivanja -> execute();
		header("Location: ../admin.php");
	}
?>