
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
        ?> 
    </head>

    <body>

        <h1>Liste des suggestions</h1>


<?php
    $sql2= "SELECT m.Titre, m.Artiste, m.Durée, m.Genre, m.Date_de_sortie FROM musique as m JOIN suggestion as s WHERE s.musique_id_musique = m.id_musique";
        $result2=$db->query($sql2);


    if ($result2->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>Titre</th><th>Artiste</th><th>Durée</th><th>Genre</th><th>Date de Sortie</th></tr>"; 

        while ($row = $result2->fetch()) {
            $Titre = $row['Titre'];
            $Artiste = $row['Artiste'];
            $Durée = $row['Durée'];
            $Genre = $row['Genre'];
            $Date_de_sortie = $row['Date_de_sortie'];

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

</body>
</html>




