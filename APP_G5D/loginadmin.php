<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login Admin</title>
		<link rel="stylesheet" href="styles/styleslogin.css">
		
		<?php
	    require_once("./Header.php")
	    ?>
	  
	  </head>



	<body>
		<center>
		<form method="post" action="phploginadmin.php" title="Connexion" class="formlog">

			<fieldset class="box">
				<legend class="police1">Connexion Administrateur</legend>
				<br>
				<input type="text" name="username" placeholder="  Nom d'utilisateur" class="entree">
				<br>
				<div style="margin-top: 10px;"></div>
				<input type="password" name="password" placeholder="  Mot de Passe" class="entree">
				<br>
				<div style="margin-top: 30px;"></div>
				<input type="submit" name="connexion bouton" id="Connexion" value="Connexion" class="loginbutton">
			</fieldset>
		<div style="font-size: medium; margin-top: 60px;"><p>Vous n'êtes pas Administrateur ?</p></div>
		<a href="./login.php"><input type="button" id="Connexion" value="Connexion" class="loginbutton"></a>
		
		</center>
	</body>


</html>