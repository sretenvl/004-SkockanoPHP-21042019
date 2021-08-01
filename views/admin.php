<link rel="stylesheet" type="text/css" href="css/styleAdmin.css">
<div id = "conteiner">
	<div class = "row">
		<div class = "proizvodA">
			<h2>Proizvodi</h2>
			<div class = "drzac">
				<table>
					<tr>
						<th>Naziv</th>
						<th>Opis</th>
						<th>Cena</th>
						<th>Slika</th>
						<th>Ocena</th>
						<th>Tip proizvoda</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
					<?php foreach($proizvodi as $p): ?>
					<tr>
						<td><?= $p->naziv ?></td>
						<td><?= $p->opis ?></td>
						<td><?= $p->cena ?></td>
						<td><?= $p->slika ?></td>
						<td><?= $p->ocena ?></td>
						<td><?= $p->tipproizvodaid ?></td>
						<td><a class = "adminEdit" href = "views/edit.php?id=<?php echo $p->id?>&naziv=<?php echo $p->naziv?>&opis=<?php echo $p->opis?>&cena=<?php echo $p->cena?>&slika=<?php echo $p->slika?>&ocena=<?php echo $p->ocena?>&tipproizvodaid=<?php echo $p->tipproizvodaid?>">Edit</a></td>
						<td><a class = "adminEdit" href = 'views/izbrisi.php?id=<?php echo $p->id?>' name = "brisac">Delete</a></td>
					</tr>
					<?php endforeach; ?>
				</table>				
			</div>
			<h2>Novi proizvod</h2>
			<form method = "POST" action = "modules/admin.php">
				<lable>Naziv proizvoda</lable><br>
				<input type = "text" name = "naziv" placeholder = "Naziv"/><br>
				<lable>Cena proizvoda</lable><br>
				<input type = "number" name = "cena"/><br>
				<lable>Slika proizvoda</lable><br>
				<input type = "file" name = "slika"/><br>
				<lable>Ocena proizvoda</lable><br>
				<input type = "number" name = "ocena"/><br>
				<lable>Opis proizvoda</lable><br>
				<textarea name = "opis" placeholder = "Opis proizvoda" rows = "3"></textarea><br>
				<lable>Kategorija proizvoda</lable><br>
				<select name = "kategorija">
					<?php foreach($tipovi as $tp): ?>
						<option value = "<?=$tp->id?>"><?=$tp->naziv?></option>
					<?php endforeach; ?>
				</select><br>
				<button type = "submit" name = "submit">Promeni</button>
			</form>
		</div>
	</div>
</div>