<head>
    <meta charset="UTF-8">
    <title>Delete Forum - Select and Play Forum</title>
    <link rel="stylesheet" href="Selectandplay/Forum.css">
    <!-- Autres balises d'en-tête si nécessaire -->
</head>

<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "S&P_BDD");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérifie si des données ont été soumises via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données de formulaire
    $id = $_POST['id_Forum'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    // Prépare une requête SQL pour mettre à jour la Forum
    $stmt = $conn->prepare("UPDATE Forum SET question = ?, answer = ? WHERE id_Forum = ?");
    $stmt->bind_param("ssi", $question, $answer, $id);

    // Exécute la requête
    if ($stmt->execute()) {
        echo "Forum updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Ferme la requête
    $stmt->close();
}

// Ferme la connexion à la base de données
$conn->close();

// Redirige vers Forum.php
header("Location: Forum.php");
exit;
?>
