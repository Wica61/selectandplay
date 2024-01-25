<head>
    <meta charset="UTF-8">
    <title>Delete Forum - Select and Play Forum</title>
    <link rel="stylesheet" href="Styles/Forum.css">

</head>

<?php

$conn = new mysqli("localhost", "root", "", "S&P_BDD");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $id_Forum = $_POST['id_Forum'];
    $reply = $_POST['reply'];

    $stmt = $conn->prepare("INSERT INTO Forum_replies (id_Forum, reply) VALUES (?, ?)");
    $stmt->bind_param("is", $id_Forum, $reply);

    if ($stmt->execute()) {
        echo "Réponse ajoutée avec succès";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    
    $stmt->close();
}


$conn->close();

header("Location: Forum.php");
exit;
?>
