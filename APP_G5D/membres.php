<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Select and Play - Classement</title>
    <link rel="stylesheet" href="Styles/classement.css">
    <link rel="icon" href="LogoIcon.png" type="image/png">
    <?php 
    require_once("Header.php")
    ?>
</head>

<body>
    <?php
    $db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");

    $sql = "SELECT * FROM client";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Mail</th>
                <th>Téléphone</th>
                <th>Points de fidelité</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["id_client"]. "</td>";
                    echo "<td>" . $row["Username"]. "</td>";
                    echo "<td>" . $row["Nom"]. "</td>";
                    echo "<td>" . $row["Prenom"]. "</td>";
                    echo "<td>" . $row["Mail"]. "</td>";
                    echo "<td>" . $row["Telephone"]. "</td>";
                    echo "<td>" . $row["Points_de_fidelite"]. "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>0 résultats</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>