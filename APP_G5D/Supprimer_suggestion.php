<?php
    if (isset($_POST['id_to_delete'])) {
        $id_to_delete = $_POST['id_to_delete'];

        $db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM suggestion WHERE id_suggestion = :id_to_delete";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_to_delete', $id_to_delete, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Musique validée avec succès.";
            
             header('Location: ListeSuggestion.php');
        } else {
            echo "Erreur lors de la validation.";
        }
    }
?>
