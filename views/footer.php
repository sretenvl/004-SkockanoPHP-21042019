<!--FOOTER-->
	<footer>
		<div id = "footerW">
			<div id = "footerLinkovi">
				<a href = "index.php"><img id = "logoF" src = "images/logo.png" alt = "logoF"/></a>
				<div id = linkovi>
					<a href = "https://www.facebook.com"><i class="fab fa-facebook fa-4x"></i></a>
					<a href = "https://www.youtube.com"><i class="fab fa-youtube fa-4x"></i></a>
					<a href = "https://www.twitter.com"><i class="fab fa-twitter fa-4x"></i></a>
					<a href = "https://www.instagram.com"><i class="fab fa-instagram fa-4x"></i></a>
				</div>
			</div>
			<nav id = "footerMeni">
				<ul id = "podF">
					<li class = "podnasloviW">
						<ul class = "podM">
							<li class = "podN">MENI</li>
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
					</li>
					<li class = "podnasloviW">
						<ul class = "podM">
							<li class = "podN">SKOLA</li>
							<a href = "sitemap.xml"><li>SITEMAP</li></a>
							<a href = "dokumentacija.pdf"><li>DOKUMENTACIJA</li></a>
						</ul>
					</li>
				</ul>
			</nav>	
		</div>
		<div id = "cpRight">
			<p>Copyright &copy Sreten Vladisavljevic 123/17</p>
		</div>
	</footer>
	<!--KRAJ FOOTERA-->