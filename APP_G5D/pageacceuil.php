<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Select and Play - Acceuil</title>
		<link rel="stylesheet" href="Styles/stylesAcceuil.css">
		<link rel="icon" href="LogoIcon.png" type="image/png">

		<?php
		$db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
		require_once("Header.php");
		?>

	  

	</head>

	<body>
		<div class="container">
			<div class="Bienvenue">
			<div class="text">
				<p> Bienvenue sur Select and Play !</p><br>
			</div>
			<form action="/submit_form" method="post" class="newsletter">
	        	<label for="Inscrivez vous a notre NewsLetter"></label>
	        	<input type="text" id="Inscription" name="Inscription pour notre newsletter" placeholder="Inscription pour notre newletter" rows="15" cols="40"><br><br>
	        </form>
			<div class="GetReady">
				<p> Soyez pret a vivre une experience incroyable </p>
			</div>
		</div>
				
		    <div class="image">
		        <img width= "626px" height= auto src="img/Logo1.png">
		    </div>

		    <a href="CreationdeCompte.php">

		        <button class="inscription-btn">Inscription</button>	
		    </a>
		    </div>
	    <div class="nosclubs">
	    	<p> Nos Clubs affiliés </p>
	    </div>
	    <div> <center>
	    	<img class="image2" src="img/PartyDarkLogo.png">
	    	<img class="image2" src="img/palaistokyologo.png">
	    	<img class="image2" src="img/RexclubLogo.jpeg">
	    </center>
	    </div>
	    <div class="service">
	    <p>Voici les clubs qui propose notre service</p>
		</div>
		<center>
		<a href ="Clubs.php">
		<button class="voir-btn">Voir tous les clubs</button>
		</a>

	</center>

	<div class="p2">
		<div class="p21">

			
		
			<a href="Evenement.php">
				<button class="voir-btn">Voir tous les evenements</button>
			</a>
			<p> NOS FUTURES  EVENEMENTS</p>
		</div>
		<div class="p21">
			<a href="classement.php">
			<button class="voir-btn"> Classement </button><br>
			</a>
			<p class=> Decouvre ceux qui ont fait le plus de bruit </p><br><br><br><br><br>
		</div>

	</div>	


	<footer>
		<?php
		require_once("Footer.php");	
		?>

</footer>


	</body>


</html>
