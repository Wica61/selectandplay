<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Select and Play - Musique</title>
    <link rel="stylesheet" href="Styles/classement.css">
    <link rel="icon" href="LogoIcon.png" type="image/png">
    <?php 
    require_once("Header.php")
    ?>
</head>

<body>
    <?php
    $db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");

    $sql = "SELECT * FROM musique ORDER BY Date_de_sortie DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Artiste</th>
                <th>Date de Sortie</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["Titre"]. "</td>";
                    echo "<td>" . $row["Artiste"]. "</td>";
                    echo "<td>" . $row["Date_de_sortie"]. "</td>";
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