<?php
	session_start();
	include("../setup/konektor.php");
	$errors="";
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		$errors = [];
		$tuser = "/^\w{3,20}$/";

		if(empty($_POST['username'])){
			array_push($errors, "Polje za username je obavezno.");
		}
		elseif(!preg_match($tuser, $_POST['username'])){
			array_push($errors, "Polje je nepravilno uneto.");
		}

		if(!empty($_POST['username'])){
			$upitImena = "SELECT * FROM useri WHERE username = :ime";
			$korisnici = $konektor -> prepare($upitImena);
			$korisnici -> execute(array(':ime' => $_POST['username']));
			if($korisnici -> rowCount()){
				array_push($errors, "Username vec postoji.");
				header("Location: ../index.php");
			} else {
				$username = $_POST['username'];
			}
		}

		if(!$password){
			array_push($errors, "Polje za lozinku je przno.");
		}

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			array_push($errors, "Email nije pravino unet.");
		}

		if(count($errors)){
			$data = $errors;
		}
		else{
			$upit = "INSERT INTO useri(username, password, email) VALUES (:ime, :pass, :email)";
			$registar = $konektor -> prepare($upit);
			$registar -> bindParam(":ime", $username);
			$registar -> bindParam(":pass", $password);
			$registar -> bindParam(":email", $email); 
			$k = $registar -> execute();
			echo "Uspesno ste registrovani";
			header("Location: ../index.php");
		}
		var_dump($errors);
	}
?>