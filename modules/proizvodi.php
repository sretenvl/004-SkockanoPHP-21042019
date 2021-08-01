<?php
	//KONEKCIJA
	include("setup/konektor.php");

	//USER INPUT
	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 6 ? (int)$_GET['per-page'] : 3;

	//POSITIONING
	$pocetak = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	//QUERY
	$upit = "SELECT * FROM listaproizvoda LIMIT {$pocetak}, {$perPage}";

	$articles = $konektor -> prepare($upit);
	$articles -> execute();


	$countsql = $konektor -> prepare("SELECT COUNT(naziv) as broj FROM listaproizvoda");
	$countsql -> execute();
	$row = $countsql -> fetch();
	$numrecords = $row -> broj;
	$numlinks = ceil($numrecords/$perPage);
?>