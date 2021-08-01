<?php
	include("setup/konektor.php");
	session_start();
?>
<!--MENI-->
<div id = "gornjiM">
	<div class = "clan" >
		<a href = "index.php"><img id = "logo" src = "images/logo.png" alt = "logo"/></a>
	</div>
	<div class = "clan" id = "opcije">
		<div class = "sadrzajClana" id = "meni"><i class="fas fa-bars fa-3x"></i></div>
		<?php
			if(empty($_SESSION['korisnik'])){
				echo "<div class = 'sadrzajClana' id = 'registracija'><i class='fas fa-sign-in-alt fa-3x'></i></div>";
			}
			else{
				echo "<div class = 'sadrzajClana' id = 'logout'><a href = 'modules/logout.php'><i class='fas fa-sign-out-alt fa-3x'></i></a></div>";
			}
		?>
	</div>
</div>
<div id = "donjiM">
	<nav>
		<ul>
			<?php
				$upit = "SELECT * FROM meni";
				$state = $konektor -> query($upit);
				$linkovi = $state -> fetchAll();
				foreach($linkovi as $link){
					$veza = $link -> link;
					$naziv = $link -> naziv;
					echo "<li><a href = 'index.php?link=$veza'>$naziv</a></li>";
				}
				if(!empty($_SESSION['korisnik'])){
					echo "<li><a href = 'admin.php'>ADMIN PANEL</a></li>";
				}
			?>
		</ul>
	</nav>
</div>
<!--MENI KRAJ-->




