<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" href="styles/styleslogin.css">
		
		<?php
	    require_once("./Header.php")
	    ?>
	  
	  </head>



	<body>
		<center>
		<form method="post" action="phplogin.php" title="Connexion" class="formlog">

			<fieldset class="box">
				<legend class="police1">Connexion</legend>
				
				<input type="radio" id="Utilisateur" name="Utilisateur" value="Client" class="cases" id="myForm">
				<label name="client"> Utilisateur</label>

				<input type="radio" id="DJ" name="Utilisateur" value="DJ" class="cases" id="myForm">
				<label name="DJ"> DJ</label>
				<br>
				<input type="text" name="username" placeholder="  Nom d'utilisateur" class="entree">
				<br>
				<div style="margin-top: 10px;"></div>
				<input type="password" name="password" placeholder="  Mot de Passe" class="entree">
				<br>
				<div style="margin-top: 30px;"></div>
				<input type="submit" name="connexion bouton" id="Connexion" value="Connexion" class="loginbutton">
			</fieldset>
		<div style="font-size: medium; margin-top: 60px;"><p>Vous n'avez pas encore de compte ?</p></div>
		<a href="CreationdeCompte.php"><input type="button" id="Inscription" value="Inscription" class="loginbutton"></a>
		<br><br>
		<a href="loginadmin.php"><input type="button" id="LoginAdminbtn" value="Connexion Administrateur" class="loginbutton"></a>
		</center>
	</body>

</html>