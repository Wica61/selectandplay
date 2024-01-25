<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
    require_once("Header.php");

    
    $num_siret = $_POST["num_siret"];
    $adresse = $_POST["adresse"];
    $nom = $_POST["nom"];

    $query = "INSERT INTO boite_de_nuit (num_siret, adresse, nom) VALUES (:num_siret, :adresse, :nom)";
    $stmt = $db->prepare($query);


    $stmt->bindParam(':num_siret', $num_siret);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':nom', $nom);


    $stmt->execute();

    echo "Boîte de nuit ajoutée avec succès.";
}
else {
echo "Formulaire non soumis.";
}
?>



