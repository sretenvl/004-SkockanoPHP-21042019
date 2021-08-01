<div id = "proizvodiW">
	<div id = "proizvodi">
		<?php
			include("modules/proizvodi.php");
			foreach ($articles as $article){
				echo "<div class='proizvod'>";
        		echo "<img src='{$article -> slika}' alt='{$article -> naziv}'/>";
        		echo "<h3>{$article -> naziv}</h
        		3>";
        		echo "<p class = 'opisP'>Opis: {$article -> opis} </p>";
        		echo "<div class='cenaW'>";
        		echo "<span>Cena:</span>";
        		echo "<span class = 'cena'>{$article -> cena} RSD</span>";
        		echo "</div></div>";
			}
		?>
		<div id = "pLinkovi">
			<?php for($i = 1; $i <= $numlinks; $i++){
				echo "<a href = 'index.php?link=proizvodi&page=" .$i. "&per_page=6'>" .$i. "</a>";
				}
			?>
		</div>
	</div>
</div>
