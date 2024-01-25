
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Select and Play - Capteur</title>
        <link rel="stylesheet" href="Styles/classement.css">
        <link rel="icon" href="LogoIcon.png" type="image/png">

        <?php 
        $db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        require_once("Header.php"); 
        ?> 
    </head>

    <body>

        <h1>Valeur du capteur en temps réel</h1>
    

        <?php

        $sql3 = "SELECT e.capteur_id_capteur, AVG(e.dB) as moyenne_dB, b.nom FROM enregistrement as e JOIN soiree as s ON e.soiree_id_soiree = s.id_soiree JOIN boite_de_nuit as b ON b.Num_Siret = s.boite_de_nuit_Num_Siret GROUP BY e.capteur_id_capteur, b.nom ORDER BY e.capteur_id_capteur";


        $sql2= "SELECT e.capteur_id_capteur, e.dB, e.heure, b.nom FROM enregistrement as e JOIN soiree as s JOIN boite_de_nuit as b WHERE e.soiree_id_soiree=s.id_soiree AND b.Num_Siret=s.boite_de_nuit_Num_Siret ORDER BY e.heure";
        $result2=$db->query($sql2);
        $result3=$db->query($sql3);

    if ($result3->rowCount() > 0) {
    echo "<table>";
    echo "<tr><th>Nom</th><th>capteur</th><th>dB Moyen</th></tr>"; 

    while ($row = $result3->fetch()) {
        $capteur = $row['capteur_id_capteur'];
        $dB_moy = $row['moyenne_dB'];
        $nom2 = $row['nom'];

        echo "<tr>";
        echo "<td>" . htmlspecialchars($nom2) . "</td>";
        echo "<td>" . htmlspecialchars($capteur) . "</td>";
        echo "<td>" . htmlspecialchars($dB_moy) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}


    if ($result2->rowCount() > 0) {
        echo "<table>";
        echo "<tr><th>Nom</th><th>Heure</th><th>dB</th></tr>"; 

        while ($row = $result2->fetch()) {
            $heure = $row['heure'];
            $dB = $row['dB'];
            $nom = $row['nom'];

            echo "<tr>";
            echo "<td>" . htmlspecialchars($nom) . "</td>";
            echo "<td>" . htmlspecialchars($heure) . "</td>";
            echo "<td>" . htmlspecialchars($dB) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }


