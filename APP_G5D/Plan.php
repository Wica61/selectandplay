<html>
	<head>
		<meta charset="UTF-8">
		<title>Plan du site</title>
		<link rel="stylesheet" href="styles/stylesplan.css">
		<?php require_once("Header.php") ?> 

		<style>

		</style>
	  </head>

<body>
	<div style="margin-left: 25px;">
    <main>
        <section id="Accueil">
			<h2>Accueil</h2>
			<a href="pageaccueil.php" class="liens">Page d'Accueil</a>
			<br>
        </section>
		<br>
		<section id="Connexion">
			<h2>Connexion et Inscription</h2>
			<a href="login.php" class="liens">Connexion</a><br>
			<a href="loginadmin.php" class="liens">Connexion Administrateur</a><br>
			<a href="CreationdeCompte.php" class="liens">Inscription</a><br>
        </section>
		<br>
		<section id="Profil">
			<h2>Pages Profil</h2>
			<a href="page_utilisateur.php" class="liens">Page Utilisateur</a><br>
			<a href="profilDJ.php" class="liens">Page DJ</a><br>
			<a href="AdminV2.php" class="liens">Page Administrateur</a><br>
        </section>
		<br>
        <section id="Evenement">
			<h2>Evenement</h2>
            <a href="Evenement.php" class="liens">Page Evenement</a>
        </section>
		<br>
        <section id="Capteur">
			<h2>Capteur</h2>
            <a href="val_capteur.php" class="liens">Page Capteur</a>
        </section>
		<br>
		<section id="Musique">
			<h2>Musique</h2>
            <a href="choix_musique.php" class="liens">Page Musique</a>
        </section>
		<br>
		<section id="Contact">
			<h2>Contact</h2>
            <a href="contact.php" class="liens">Page contact</a>
        </section>
		<br>
		<section id="FAQ_Forum">
			<h2>Des questions ?</h2>
            <a href="FAQ.php" class="liens">FAQ</a><br>
			<a href="Forum.php" class="liens">Forum</a>
        </section>
		<br>
		<section id="CGU">
			<h2>CGU</h2>
            <a href="cgu.php" class="liens">Page CGU</a><br>
			<a href="CGUADMIN.php" class="liens">Page CGU admin</a>
        </section>
		<br><br><br>
    </main>
		</div>
	
	<?php require_once("Footer.php") ?> 
</body>

</html>
