<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Select and Play - Acceuil</title>
		<link rel="stylesheet" href="Styles/StylesHeader.css">
		<link rel="icon" href="LogoIcon.png" type="image/png">

		<?php
		$db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");





		?>

		<ul>
		  <li><a href="pageacceuil.php"><img class="logo" src="img/logo-without-text.png"></a></li>
		  <li><a style="margin-top: 8px;" href="pageacceuil.php" class="underlign">Accueil</a></li>
		  <li><a style="margin-top: 8px;" href="Evenement.php" class="underlign">Evenements</a></li>
		  <li><a style="margin-top: 8px;" href="val_Capteur.php" class="underlign">Capteur</a></li>
		  <li><a style="margin-top: 8px;" href="choix_musique.php" class="underlign">Musique</a></li>
		  <li><a style="margin-top: 8px;" href="Contact.php" class="underlign">Contact</a></li>
		  <li><a style="margin-top: 8px;" href="FAQ.php" class="underlign">FAQ</a></li>
		  <li><a style="margin-top: 8px;" href="Forumclient.php" class="underlign">Forum</a></li>
		  <li><a style="margin-top: 8px;" href="Apropos.php" class="underlign">About</a></li>


		  <div>


		  <?php
		  /*
		    // Vérifier si une session est déjà active
		    if (session_status() === PHP_SESSION_NONE) {
		        // Aucune session active, vous pouvez en démarrer une si nécessaire
		        echo '<a href="login.php" class="underlign">Se connecter</a></li>'; 
		    } else {
		        // Une session est déjà active
		        echo '<a href="page_utilisateur.php" class="underlign">Mon Profil</a></li>'; // Correction ici
		    }
		    */
		?>

		  	
			<a href="login.php"><img class="user" src="img/user.png"></a>
		  </div>
		</ul>
	  
	  

	</head>

</html>
