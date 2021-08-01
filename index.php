<?php
	include("views/head.php");
	include("views/nav.php");
	include("views/login.php");
	//POČETAK STRANICE
	if(isset($_GET['link'])){
		$link = $_GET['link'];
		$fajl = "views/". $link .".php";
		if (file_exists($fajl)){
			include_once($fajl);
		} else {
			echo "Stranica ne postoji!";
		}
	} else {
	//POČETAK STRANICE
?>	
	
	<!--GLAVNI DEO-->
	<main>
		<!--OGLASI-->
		<div class = "glavniW">
			<div id = "opisW">
				<div id = "opis"></div>
				<h1 id = "opisTekst">Skockano za Vas</h1>
			</div>
			<div id = "oglasiOmot">
				<div class = "oglasW">
					<div class = "oglas" id = "kocka">
						<div class = "tekstOglasa">
							<h2>Drvene puzle</h2>
							<p>Pogledajte naše najnovije proizvode</p>
							<div class = "dugme">
								<a href = "index.php?link=proizvodi"><p>Pogledajte  <i class="fas fa-angle-right"></p></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class = "oglasW">
					<div class = "oglas" id = "drvo">
						<div class = "tekstOglasa">
							<h2>Novo prodajno mesto</h2>
							<p>Dodjite u našu novootvorenu prodavnicu u ulici Čarlija Čaplina</p>
							<div class = "dugme">
								<a href = "#kontaktW"><p>Pogledajte  <i class="fas fa-angle-right"></i></p></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--OGLASI KRAJ-->
		<!--O NAMA-->
		<div id = "namaW">
			<div id = "oNama">
				<img id = "slikaLokala" src = "images/pz6.jpg" alt = "slikaLokala"/>
				<div id = "opisLokala">
					<h3>"Skockano" je vaše najbolje mesto za nabavku slagalica</h3><br/>
					<p>Najbolje mesto za slagalice svih vrsta nudimo veliki izbor slagalica i drugih proizvoda za sve uzraste i različitih nivoa težine.</p><br/>
					<p>"Skockano" je novi distributer na tržištu mozgalica, slagalica, trik brava, itd. Mi smo tu da pomognemo entuzijastima, ali i novim fanovima da brzo i lako dođu do novih izazova u igrama i da razviju svoje sposobnosti rešavanja problema. Ovo je prvi korak u razvoju naše prodavnice, a u najskorije vreme ćemo da vam predstavimo i tangrame, žičane slagalice, razne metalne lagalice, klizeće blokove...</p><br/>
					<p>Imamo razvijenu saradnju sa nekoliko mladjih umetnika čije radove ćemo predstaviti u obliku unikatnih slagalica.</p><br/>
					<p>Naše slagalice su potpuno napravljene od recikliranog materijala.</p>
				</div>
			</div>
		</div>
		<!--KRAJ O NAMA-->
		<!--KONTAKT-->
		<div id = "kontaktW">
			<div class = "forma">
				<h1>LOKACIJA</h1>
				<h2>BEOGRAD PALILULA</h2>
				<ul>
					<li>
						<h3>Petra Petrovica 245</h3>
						<p>Radno vreme:</p>
						<p>9:30-21:00(radnim danima)</p>
						<p>10:00-19:00(vikendom)</p>
					</li>
					<li>
						<h3>Dargoslava Srejovića 65b</h3>
						<p>Radno vreme:</p>
						<p>9:30-21:00(radnim danima)</p>
						<p>10:00-19:00(vikendom)</p>
					</li>
					<li>
						<h3>Čarlija Čaplin 55</h3>
						<p>Radno vreme:</p>
						<p>9:30-21:00(radnim danima)</p>
						<p>10:00-19:00(vikendom)</p>
					</li>
				</ul>
			</div>
			<div class = "forma">
				<form onsubmit="provera()">
					<h1>Kontaktirajte nas</h1>
				   	<p class = "formaT">Vaše ime</p>
				   	<input type="text" id="ime"/><br/>
				   	<p class = "formaT">Vaš E-mail</p><br/>
				   	<input type="text" id="email"/><br/> 
				   	<p class = "formaT">Predmet</p>
				   	<input type="text" id="predmet"/><br/>  
				   	<p class = "formaT">Poruka</p>
				   	<textarea cols="45" rows="5" id="poruka"></textarea><br/> 
				   	<br />
				   	<input type="button" id = "posalji" value="Posalji">
				</form>
			</div>
		</div>
		<!--KONTAKT KRAJ-->
		<i id = "vracanjePocetak" class="fas fa-chevron-circle-up fa-5x"></i>
	</main>
	<!--GLAVNI DEO KRAJ-->
	<?php
		//KRAJ STRANICE
		}
		//KRAJ STRANICE
		include("views/footer.php");
	?>
	<script type="text/javascript" src = "js/form.js"></script>
	<script type="text/javascript" src = "js/formJQ.js"></script>
	<script type="text/javascript" src = "js/efekti.js"></script>
</body>
</html>