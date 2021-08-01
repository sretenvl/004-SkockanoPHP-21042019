<?php
	require_once "../setup/konektor.php";
	$id = $_GET['id'];
	if(isset($_POST['brisac'])){
		$proizvodBrisi = $_GET['brisac'];
		$upitBrisanja = "DELETE FROM listaproizvoda WHERE id = :id";
		$vezaBrisanja = $konektor -> prepare("$upitBrisanja");
		$vezaBrisanja->bindParam(":id", $id);
		$obrisi = $vezaBrisanja -> execute();
		header("Location: ../admin.php");
	}
?>
<a href = "../admin.php">Lista korisnika</a>
<h1>Obrisi korisnika</h1>
<form method = "POST" action = 'izbrisi.php?id=<?php echo $id?>'>
	<input type="submit" name="brisac" value="Obrisi"/>
</form>