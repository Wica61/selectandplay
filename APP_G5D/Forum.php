<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Select and Play - Forum</title>
    <link rel="stylesheet" href="Styles/Forum.css">
    <?php require_once("header.php");
    ?>
</head>
<body>

<div class="container">
    <h2>Forum</h2><br>


    <h1>Manage Forum</h1>

    <?php

    $conn = $db;


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT Forum.id_Forum, Forum.question, Forum.answer, GROUP_CONCAT(Forum_message.message SEPARATOR '<br>') AS replies
            FROM Forum
            LEFT JOIN Forum_message ON Forum.Forum_message_id_Forum_message = Forum_message.id_Forum_message
            GROUP BY Forum.id_Forum, Forum.question, Forum.answer";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            echo '<div class="question">';
            echo $row["question"];
            echo '<a href="delete.php?id_Forum=' . $row["id_Forum"] . '">Supprimer</a>';
            echo '<a href="modifier.php?id_Forum=' . $row["id_Forum"] . '">Modifier</a>';
            echo '<button onclick="toggleReplyForm(' . $row["id_Forum"] . ')">Répondre</button>';
            echo '</div>';
            echo '<div class="answer">' . $row["answer"] . '</div>';
            echo '<div id="replyForm' . $row["id_Forum"] . '" style="display:none;">';
            echo '<form action="reply_forum.php" method="post">';
            echo '<input type="hidden" name="id_Forum" value="' . $row["id_Forum"] . '">';
            echo '<label for="reply">Votre réponse:</label><br>';
            echo '<textarea id="reply" name="reply"></textarea><br>';
            echo '<input type="submit" value="Répondre">';
            echo '</form>';
            echo '</div>';
            echo '<div class="replies">' . $row["message"] . '</div>';
        }
    } else {
        echo "No Forum found.";
    }

    $conn->close();
    ?>


    <div class="container">
        <h2>Ajouter une question</h2><br>

        <form action="add_forum.php" method="post">
            <label for="question">Question:</label><br>
            <input type="text" id="question" name="question"><br><br>

            <label for="answer">Réponse:</label><br>
            <textarea id="answer" name="answer"></textarea><br><br>

            <input type="submit" value="Ajouter">
        </form>
    </div>

    <script>
        function toggleReplyForm(id) {
            var replyForm = document.getElementById('replyForm' + id);
            if (replyForm.style.display === 'none' || replyForm.style.display === '') {
                replyForm.style.display = 'block';
            } else {
                replyForm.style.display = 'none';
            }
        }
    </script>
</div>

</body>
</html>
