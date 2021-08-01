<?php
	require_once 'setup/konektor.php';
	session_start();
	if(!$_SESSION['korisnik']){
		header("Location: index.php");
	}
	$upitProizvodi = "SELECT * FROM listaproizvoda";
	$upitTipa = "SELECT * FROM tipoviproizvoda";
	$proizvodi = $konektor->query($upitProizvodi)->fetchAll();
	$tipovi = $konektor->query($upitTipa)->fetchAll();
	require_once 'views/head.php';
	require_once 'views/admin.php';
	require_once 'views/footer.php';
?>
</body>
</html>