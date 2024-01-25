<?php

$conn = new mysqli("localhost", "root", "", "S&P_BDD");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id_Forum'];

$sqlDeleteReplies = "DELETE FROM Forum_replies WHERE id_Forum = ?";
$stmtDeleteReplies = $conn->prepare($sqlDeleteReplies);
$stmtDeleteReplies->bind_param("i", $id);

if ($stmtDeleteReplies->execute()) {
    
    $sqlDeleteQuestion = "DELETE FROM Forum WHERE id_Forum = ?";
    $stmtDeleteQuestion = $conn->prepare($sqlDeleteQuestion);
    $stmtDeleteQuestion->bind_param("i", $id);

  
    if ($stmtDeleteQuestion->execute()) {
        echo "Question and associated replies deleted successfully.";
    } else {
        echo "Error deleting question: " . $stmtDeleteQuestion->error;
    }
} else {
    echo "Error deleting replies: " . $stmtDeleteReplies->error;
}

$stmtDeleteReplies->close();
$stmtDeleteQuestion->close();


$conn->close();


header("Location: Forum.php");
exit;
?>
