<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Select and Play - Contact</title>
		<link rel="stylesheet" href="Styles/stylesContact.css">
		<link rel="icon" href="LogoIcon.png" type="image/png">

		<?php
		$db = new PDO("mysql:host=localhost;dbname=app_exemple", "root", "");
		require_once("Header.php");
		?>

	
	  
	  

	</head>

	<body>
		
	<div class="formcontact">

		<form action="sent_email.php" method="post">
		
	        <label for="nom">Nom :</label><br>
	        <input type="text" id="nom" name="nom" class="input1" required>
	   
	        <label for="prenom">Prénom :</label><br>
	        <input type="text" id="prenom" name="prenom" class="input1" required>
	   
	  
	        <label for="email">Email :</label><br>
	        <input type="email" id="email" name="email" class="input1" required>
	   
	        <label for="message">Message :</label><br>
	        <textarea id="message" name="message" rows="4" class="input2" required></textarea>
	    
	        <input type="submit" value="Envoyer">
	    
		</form>
	</div>





<footer>
	<?php require_once("Footer.php")
	?>
</footer>


	</body>


</html>
