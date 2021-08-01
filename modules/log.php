<?php
	include("../setup/konektor.php");
	$errors="";
	session_start();
	if(isset($_POST['submit'])){
		$username = $_POST['usernameL'];
		$password = md5($_POST['passwordL']);
		$errors = [];
		$tuser = "/^\w{3,20}$/";

		if(empty($_POST['usernameL'])){
			array_push($errors, "Polje za username je obavezno.");
		}
		elseif(!preg_match($tuser, $username)){
			array_push($errors, "Polje je nepravilno uneto.");
		}

		if(empty($_POST['passwordL'])){
			array_push($errors, "Polje za lozinku je przno.");
		}

		if(count($errors) > 0){
			$_SESSION['greske'] = $errors;
			header("Location: ../index.php");
		}
		else{

			$upit = "SELECT * FROM useri WHERE username = :ime AND password = :pass";
			$state = $konektor -> prepare($upit);
			$state -> bindParam(":ime", $username);
			$state -> bindParam(":pass", $password);
			$state -> execute();
			$user = $state -> fetch();
			if($user){
				$_SESSION['korisnik'] = $user -> username;
				echo "Vase korisnicko ime je sad postavljeno na: ".$_SESSION['korisnik']."<br />";
				header("Location: ../index.php");
			}
			else{
				$_SESSION['greske'] = "Pogresno je unet mail ili password.";
				header("Location: ../index.php");
			}
		}
	}
?>