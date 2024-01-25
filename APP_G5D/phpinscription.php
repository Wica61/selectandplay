<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <title>postInscription</title>
        <link rel="stylesheet" href="Styles/inscriptioncss.css">
    <?php 
    require_once("Header.php") 
    ?>
	</head>
	<body>

<?php

// reCAPTCHA validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptcha_secret = '6Lfn3lkpAAAAAK8Bs2e9IR60E80hZbNZ4O3wmLQ5'; 
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $response_keys = json_decode($response, true);

    if(!$response_keys["success"]) {
        echo 'Veuillez cocher la case CAPTCHA.';
        exit; 
    }
}
    $connexion = new mysqli("localhost", "root", "", "S&P_BDD");

    $username = $_POST["username"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail = $_POST["mail"];
    $mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
    $tel = $_POST["tel"];   
    $utilisateur = $_POST["Utilisateur"];
    
    if($utilisateur == "DJ") {
        $sql = "INSERT INTO DJ (Username, Nom, Prenom, Mail, mdp, Telephone) VALUES ('$username','$nom','$prenom','$mail','$mdp','$tel')";
    } elseif ($utilisateur == "Client") {
        $sql = "INSERT INTO client (Username, Nom, Prenom, Mail, mdp, Telephone) VALUES ('$username','$nom','$prenom','$mail','$mdp','$tel')";
    }

    if ($connexion->query($sql) === TRUE) {
        echo "Données suivantes enregistrées avec succès : <br><br>";
        if (isset($_POST['username']) && $_POST['username']!=""){
            echo "Nom d'utilisateur : " . $username;
            echo '<br>';
        }
        if (isset($_POST['mail']) && $_POST['mail']!=""){
            echo "Email : " . $mail;
            echo '<br>';
        }
        if (isset($_POST['mdp']) && $_POST['mdp']!=""){
            echo "Mot de passe : " . $mdp;
            echo '<br>';
        }
        if (isset($_POST['confirmPassword']) && $_POST['confirmPassword']!=""){
            echo "Confirmation de mot de passe : " . $mdp;
            echo '<br>';
        }
        if (isset($_POST['tel']) && $_POST['tel']!=""){
            echo "Téléphone: " . $tel;
            echo '<br>';
        }
  
    } else {
        echo "Erreur lors de l'enregistrement des données";
    }

    $connexion->close();
  ?> 



	</body>


</html>