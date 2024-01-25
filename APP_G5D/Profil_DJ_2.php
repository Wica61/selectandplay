

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page DJ</title>
    <link rel="stylesheet" href="styles/styleProfilDJ.css"/>


    <?php
require_once("Header.php")
?>
</head>

	
<body>

<br> 
<br>
<br>
<?php
session_start();


if (session_status() == PHP_SESSION_ACTIVE) {
    
   
    if (isset($_SESSION['id_DJ'])) {
       
        $id_DJ = $_SESSION['id_DJ'];
        
        
        echo ">Bienvenue sur votre compte !";
    } else {
        echo "un probléme est survenu veuillez réessayer ultérieurement.";
    }

} else {
    echo "La session n'est pas active.";
}
?>
<?php

if (isset($_GET['logout'])) {
 
    $_SESSION = array();

    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();
    
   
    header("Location: pageacceuil.php");
    exit();
}
?>


<div class="header">
  <a href="pageacceuil.php?logout=1"><button class="un" style="padding: 10px 50px;">Se Déconnecter</button></a>
  <a href="Modif_Profil_DJ.php"><button class="un">Modifier le Profil</button></a>
</div>
  
<br><br><br><br><br><br><br><br>


<div class="row">

  <div class="column" style="margin:50px 0p; padding: 35px;">
  <h2>Détails du Compte</h2>
  <br>
  <p>
  <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "S&P_BDD";
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare("SELECT Username,mail,Telephone FROM DJ WHERE id_DJ =  $id_DJ");  
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result) {
          $telephone = $result["Telephone"];
          echo  "numero de portable : $telephone";
      } else {
          echo "Aucun numero trouvé avec cet ID.";
      }
  } catch (PDOException $e) {
      echo "Erreur de connexion à la base de données : " . $e->getMessage();
  }
  
  $conn = null;
  ?>
  </p>
  </div>
  
  <div class="column" style=" padding: 35px">
  <div style= "  border-radius: 8px;border: 1px solid #DA6BA8; margin:10px 0px;">
  <h2>Nom d'utilisateur</h2>
  <p style="margin-left:20px;"> 
    <?php 
      if ($result) {
          $username = $result["Username"];
          echo  $username;
      } else {
          echo "Aucun username trouvé avec cet ID.";
      }
  
  
  $conn = null;
  ?>
  
  
</p>
  </div>

  <div style= "border-radius: 8px;border: 1px solid #DA6BA8; margin:10px 0px;">
  <h2>E-mail</h2>
  <p style="margin-left:20px;"> <?php 
  if ($result) {
    $mail = $result["mail"];
    echo  $mail;
  } else {
    echo "Aucun mail trouvé avec cet ID.";
  }  ?> 
  </p>
  </div> 
  </div>

</div>

<div class="column" style="margin:50px 0p; padding: 35px;">
<h2>Actions</h2>
</div>

<div class="row" style="text-align:center; color:White">


  <div class="row">
  <div class="column" style ="border:1px solid transparent; margin:5px 10px">
    <div style="margin:5px 10px;border-radius: 8px;border: 1px solid #DA6BA8; margin:10px 0px;">
    <a href="Clubs.php">
                    <button class="un" type="submit" name="" value="Nightclubs List">Liste des clubs affiliés</button>
    </a>
    </div>
  </div>
  
  <div class="column" style ="border:1px solid tranparent; margin:5px 10px">
    <div style="margin:5px 10px;border-radius: 8px;border: 1px solid #DA6BA8; margin:10px 0px;">
    <a href="ListeSuggestion.php">
        <button class="un" type="submit" name="" value="View All">Voir la liste des suggestions</button>
    </a>
    </div>
  </div>
  </div>
  <div  style ="display:flex; align-items: center; justify-content: center">
  </div>
</div>

</div>



<?php
require_once("Footer.php")
?>




</body>
</html>

