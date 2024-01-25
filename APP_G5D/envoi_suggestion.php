<?php
require_once("choix_musique.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once("AjoutSuggestion.php");
    EnvoiSuggestion($db,$_POST['id_musique']);

}
?>