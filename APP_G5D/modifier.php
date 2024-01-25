<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Select and Play - Modifier Forum</title>
    <link rel="stylesheet" href="Styles/Forum.css">
</head>
<body>

<?php

$conn = new mysqli("localhost", "root", "", "S&P_BDD");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_GET['id_Forum'])) {
    $id = $_GET['id_Forum'];

    
    $stmt = $conn->prepare("SELECT id_Forum, question, answer FROM Forum WHERE id_Forum = ?");
    $stmt->bind_param("i", $id);

    
    $stmt->execute();

    
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $question = $row["question"];
        $answer = $row["answer"];
    } else {
        echo "Forum not found.";
        exit;
    }

  
    $stmt->close();
} else {
    echo "ID not provided.";
    exit;
}
?>

<div class="container">
    <h2>Modifier une question</h2><br>

    <form action="update_forum.php" method="post">
        <input type="hidden" name="id_Forum" value="<?php echo $row['id_Forum']; ?>">
        <label for="question">Question:</label><br>
        <input type="text" id="question" name="question" value="<?php echo $question; ?>"><br><br>

        <label for="answer">Réponse:</label><br>
        <textarea id="answer" name="answer"><?php echo $answer; ?></textarea><br><br>

        <button type="submit">Valider</button>
    </form>
</div>

</body>
</html>
