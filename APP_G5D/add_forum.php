
<head>
    <meta charset="UTF-8">
    <title>Delete Forum - Select and Play Forum</title>
    <link rel="stylesheet" href="Selectandplay/Forum.css">
 
</head>
<?php

 n

    $conn = new mysqli("localhost", "root", "", "S&P_BDD");

 

 

    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);

    }

 


    $question = $_POST['question'];

    $answer = $_POST['answer'];

 

    

    $stmt = $conn->prepare("INSERT INTO Forum (question, answer) VALUES (?, ?)");

    $stmt->bind_param("ss", $question, $answer);

 


    if ($stmt->execute()) {

        echo "New Forum added successfully";

    } else {

        echo "Error: " . $stmt->error;

    }

 


    $conn->close();

 

  

    header("Location: Forum.php");

    exit;

 