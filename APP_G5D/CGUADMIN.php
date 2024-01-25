<?php
    $db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
    require_once("Header.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titre = $_POST["titre"];
        $texte = $_POST["texte"];
    
        $stmt = $db->prepare("INSERT INTO cgu (titre, texte) VALUES (:titre, :texte)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':texte', $texte);
        if ($stmt->execute()) {
            echo "CGU updated successfully!";
        } else {
            echo "Error updating CGU: " . $stmt->errorInfo()[2];
        }
        $db = null;
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/FormUpdate.css">
    <title>Update CGU</title>
</head>
<body1>
    <div class="all">
        <h1>Update CGU</h1>
        <div class="FormUpdate">
            <form action="CGUADMIN.php" method="post">
                <label for="titre">titre:</label>
                <input type="titre" name="titre" required><br>

                <label for="texte">texte:</label>
                <textarea name="texte" required></textarea><br>

                <input type="submit" value="Update CGU">
            </form>
        </div>
    </div>
</body1>
</html>
