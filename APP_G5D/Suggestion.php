
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Select and Play - Suggestion</title>
        <link rel="stylesheet" href="Styles/classement.css">
        <link rel="icon" href="LogoIcon.png" type="image/png">

        <?php 
        $db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        require_once("Header.php"); 
        include("pChart2.1.4/class/pData.class.php");
        include("pChart2.1.4/class/pDraw.class.php");
        include("pChart2.1.4/class/pImage.class.php");
        ?> 
    </head>

    <body>

        <h1>Valeur du capteur en temps réel</h1>
        <img src="Graph_capteur.php" alt="Graphique">

        <?php

        $sql2= "SELECT m.Titre, m.Artiste, m.Durée, m.Genre, m.Date_de_sortie FROM musique as m JOIN suggestion as s WHERE s.musique_id_musique = m.id_musique";
        $result2=$db->query($sql2);


    if ($result2->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>Titre</th><th>Artiste</th><th>Durée</th><th>Genre</th><th>Date de Sortie</th></tr>"; 

        while ($row = $result2->fetch()) {
            $heure = $row['heure'];
            $dB = $row['dB'];
            $nom = $row['nom'];

            echo "<tr>";
            echo "<td>" . htmlspecialchars($Titre) . "</td>";
            echo "<td>" . htmlspecialchars($Artiste) . "</td>";
            echo "<td>" . htmlspecialchars($Durée) . "</td>";
            echo "<td>" . htmlspecialchars($Genre) . "</td>";
            echo "<td>" . htmlspecialchars($Date_de_sortie) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

?>