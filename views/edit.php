<?php
	require_once "../setup/konektor.php";
	$upitTipa = "SELECT * FROM tipoviproizvoda";
	$tipovi = $konektor->query($upitTipa)->fetchAll();
	$id = $_GET['id'];
	$naziv = $_GET['naziv'];
	$opis = $_GET['opis'];
	$cena = $_GET['cena'];
	$slika = $_GET['slika'];
	$ocena = $_GET['ocena'];
	$tipproizvodaid = $_GET['tipproizvodaid'];
	if(isset($_POST['edituj'])){
		$nazivE = $_POST['naziv'];
		$opisE = $_POST['opis'];
		$cenaE = $_POST['cena'];
		$slikaE = $_POST['slika'];
		$ocenaE = $_POST['ocena'];
		$tipproizvodaidE = $_POST['kategorija'];
		$upitBrisanja = "UPDATE listaproizvoda SET naziv = :naziv, opis = :opis, cena = :cena, slika = :slika, ocena = :ocena, tipproizvodaid = :tipproizvodaid WHERE id = :id";
		$vezaEdit = $konektor -> prepare("$upitBrisanja");
		$vezaEdit->bindParam(":id", $id);
		$vezaEdit->bindParam(":naziv", $nazivE);
		$vezaEdit->bindParam(":opis", $opisE);
		$vezaEdit->bindParam(":cena", $cenaE);
		$vezaEdit->bindParam(":slika", $slikaE);
		$vezaEdit->bindParam(":ocena", $ocenaE);
		$vezaEdit->bindParam(":tipproizvodaid", $tipproizvodaidE);
		$edituj = $vezaEdit -> execute();
		header("Location: ../admin.php");
	}
?>
<link rel="stylesheet" type="text/css" href="../css/styleEdit.css">
<div id = "editDrzac">
	<h2>Novi proizvod</h2>
	<form method = "POST" action = "edit.php?id=<?php echo $id?>&naziv=<?php echo $naziv?>&opis=<?php echo $opis?>&cena=<?php echo $cena?>&slika=<?php echo $slika?>&ocena=<?php echo $ocena?>&tipproizvodaid=<?php echo $tipproizvodaid?>">
		<lable>Naziv proizvoda</lable><br>
		<input type = "text" name = "naziv" value="<?php echo $naziv?>"/><br>
		<lable>Cena proizvoda</lable><br>
		<input type = "number" name = "cena" value="<?php echo $cena?>"/><br>
		<lable>Slika proizvoda</lable><br>
		<input type = "file" name = "slika" value="<?php echo $slika?>"/><br>
		<lable>Ocena proizvoda</lable><br>
		<input type = "number" name = "ocena" value="<?php echo $ocena?>"/><br>
		<lable>Opis proizvoda</lable><br>
		<textarea name = "opis" placeholder = "Opis proizvoda" rows = "3"><?php echo $opis?></textarea><br>
		<lable>Kategorija proizvoda</lable><br>
		<select name = "kategorija" value="<?php echo $tipproizvodaid?>">
			<?php foreach($tipovi as $tp): ?>
				<option value = "<?=$tp->id?>"><?=$tp->naziv?></option>
			<?php endforeach; ?>
		</select><br>
		<button type = "submit" name = "edituj">Promeni</button>
	</form>
</div>