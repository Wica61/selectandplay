<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["nom"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["objet"]));
    $message = strip_tags(trim($_POST["message"]));

 
    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
 
        echo "Veuillez remplir tous les champs correctement.";
        exit;
    }

    
    $recipient = "fredericwat94@gmail.com";

   
    $headers = "De: $name <$email>";
    if (mail($recipient, $subject, $message, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Votre message n'a pas pu être envoyé.";
    }
} else {
    echo "Il semble y avoir un problème avec la méthode de soumission du formulaire.";
}
?>