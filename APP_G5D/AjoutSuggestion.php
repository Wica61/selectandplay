<?php
    function EnvoiSuggestion($db,$id_musique){
        $stmt = $db->prepare("INSERT INTO suggestion (id_suggestion, billet_id_billet, musique_id_musique) 
        VALUES (NULL, 1, :id_musique)");

        //$stmt->bindParam(':id_billet', $_SESSION["id_billet"]);
        $stmt->bindParam(':id_musique', $id_musique);

        $stmt->execute();
}
?>
 