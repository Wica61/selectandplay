<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Conditions Générales d'Utilisation</title>
  <link rel="stylesheet" href="Styles/StylesCGU.css">

  <?php
    require_once("Header.php");
    ?>

</head>

<body>
<h1>CONDITIONS GÉNÉRALES D'UTILISATION</h1>
<?php
$requete_sql = $db->prepare("SELECT id_cgu, Titre, Texte FROM cgu");
$requete_sql -> execute();
if ($requete_sql->rowCount() > 0) {
    while($row = $requete_sql->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='article'>"; 
        echo "<h2>Article " . $row["id_cgu"] . ": " . $row["Titre"] . "</h2>"; 
        echo "<p>" . $row["Texte"] . "</p>"; 
        echo "</div>"; 
    }
}
else {
    echo "Aucun article existant";
}
?>


<footer>
    <?php 
        require_once("Footer.php"); 
    ?>
</footer>
</body>

</html>