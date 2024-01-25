<?php
    $db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
    require_once("Header.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Question = $_POST["Question"];
        $Reponse = $_POST["Reponse"];
    
        $stmt = $db->prepare("INSERT INTO faq (Question, Reponse) VALUES (:Question, :Reponse)");
        $stmt->bindParam(':Question', $Question);
        $stmt->bindParam(':Reponse', $Reponse);
        if ($stmt->execute()) {
            echo "FAQ updated successfully!";
        } else {
            echo "Error updating FAQ: " . $stmt->errorInfo()[2];
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
    <title>Update FAQ</title>
</head>
<body1>
    <h1>Update FAQ</h1>
    <form action="FAQADMIN.php" method="post">
        <label for="Question">Question:</label>
        <input type="text" name="Question" required><br>

        <label for="Reponse">Reponse:</label>
        <textarea name="Reponse" required></textarea><br>

        <input type="submit" value="Update FAQ">
    </form>
</body1>
</html>
#RAPPEL DELET LES QUESTION PLUS POUVOIR VOIR LES QUESTION ET REPONSE A MODIFIER