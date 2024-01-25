<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Select and Play - Clubs</title>
		<link rel="stylesheet" href="Styles/StylesClubs.css">
		<?php
		require_once("Header.php")
		?>

	</head>


	<body>
	<div class="clubs">
	    	<p> Nos Clubs affiliés </p>
	    </div>
	   
		
		<?php
		 
		$db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");

		$query = "SELECT adresse, nom FROM boite_de_nuit";

		$stmt = $db->query($query);

		
		echo '<div class="listclub">';

		
		if ($stmt->rowCount() > 0) {
		    
		    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		        echo '<div class="nightclub">';
		        echo "<h2>" . htmlspecialchars($row['nom']) . "</h2>";
		        echo "<p>" . htmlspecialchars($row['adresse']) . "</p>";
		        echo '</div>';
		    }
		} else {
		    echo "<p>Aucune boîte de nuit trouvée.</p>";
		}

		echo '</div>';

		?>
		</body>



	    
	</body>


	<footer>
		<?php
		require_once("Footer.php")
		?>

	</footer>



</html>







    

