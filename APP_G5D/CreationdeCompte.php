<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="Styles/inscriptioncss.css">

  <script src="https://www.google.com/recaptcha/api.js"></script>
 
  <script>
  function onSubmit(token) {
    document.getElementById("Signinform").submit();
    }
  </script>

  <?php
  require_once("Header.php")
  ?>
  

</head>

<body>


<center>
  <form name="Signinform" method="post" action="phpinscription.php" title="Connexion" class="formlog" onsubmit="return veriform()">

    <fieldset class="box">

      <legend class="police1">Création de Compte</legend>

      <input type="radio" id="Utilisateur" name="Utilisateur" value="Client" class="cases" id="myForm">
      <label name="client"> Utilisateur</label>
      <input type="radio" id="DJ" name="Utilisateur" value="DJ" class="cases" id="myForm">
      <label name="DJ"> DJ</label>
      <br>
      
      <input type="text" name="prenom" placeholder="  Prenom" class="entree">
      <br>
      <input type="text" name="nom" placeholder="  Nom" class="entree">
      <br>
      <input type="text" name="username" placeholder="  Nom d'utilisateur" class="entree">
      <br>
      <input type="text" name="mail" placeholder="  Adresse E-mail" class="entree">
      <br>
      <input type="text" name="tel" placeholder="  Telephone" class="entree">
      <br>
      <div style="margin-top: 10px;"></div>
      <input type="password" name="mdp" placeholder="  Mot de Passe" class="entree">
      <br>
      <input type="password" name="confirmpassword" placeholder="  Confirmer le Mot de Passe" class="entree">
      <br>
      <div style="margin-top: 30px;"></div>
      <button class="g-recaptcha"
          data-sitekey="6Lfn3lkpAAAAAIBDzBS_PYjdakEdwqveOys-dhVh"
          data-callback='onSubmit'
          data-action='submit'>
        
      </button>
      <div class="g-recaptcha" data-sitekey="6Lfn3lkpAAAAAIBDzBS_PYjdakEdwqveOys-dhVh"></div>
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <input type="submit" name="inscription bouton" id="Inscription" value="Créer votre compte" class="loginbutton">
    </fieldset>
    <div style="font-size: medium; margin-top: 60px;"><p>Vous avez déjà un compte ?</p></div>
    <a href="login.php"><input type="button" id="Connexion" value="Connexion" class="loginbutton"></a>
    <div style="font-size: medium; margin-top: 60px;"><p>Crée un compte Select & Play pour continuer</p></div>
</center>


<script>
      function veriform() {
        var prenom = document.forms["Signinform"]["prenom"];
        var nom = document.forms["Signinform"]["nom"];
        var username = document.forms["Signinform"]["username"];
        var mail = document.forms["Signinform"]["mail"];
        var tel = document.forms["Signinform"]["tel"];
        var mdp = document.forms["Signinform"]["mdp"];
        var cmdp = document.forms["Signinform"]["confirmpassword"];


        if (prenom.value == "") {
          alert("Mettez votre prenom.");
          prenom.focus();
          return false;
        }
        if (nom.value == "") {
          alert("Mettez votre nom.");
          nom.focus();
          return false;
        }
        if (username.value == "") {
          alert("Mettez votre nom d'utilisateur.");
          username.focus();
          return false;
        }
        if (mail.value == "") {
          alert("Mettez une adresse email valide.");
          mail.focus();
          return false;
        }
        if (mail.value.indexOf("@", 0) < 0) {
          alert("Mettez une adresse email valide.");
          mail.focus();
          return false;
        }
        if (mail.value.indexOf(".", 0) < 0) {
          alert("Mettez une adresse email valide.");
          mail.focus();
          return false;
        }
        if (tel.value == "") {
          alert("Mettez votre numéro de téléphone.");
          tel.focus();
          return false;
        }
        if (mdp.value == "") {
          alert("Saisissez votre mot de passe");
          mdp.focus();
          return false;
        }
/*        if (mdp.value != cmdp.value) {
          alert("Saisissez le même mot de passe");
          mdp.focus();
          return false;
        }*/
        return true;
      }
    </script>
</body>
</html>
  