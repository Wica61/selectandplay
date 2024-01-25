<?php
session_start();


$dsn = "mysql:host=localhost;dbname=S&P_BDD;charset=utf8mb4";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}

if (!isset($_SESSION['client_id'])) {
    die("Utilisateur non connecté. Rediriger vers la page de connexion.");
}

$userID = $_SESSION['client_id'];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $motDePasseActuel = $_POST["mot_de_passe_actuel"];
    $nouveauMotDePasse = $_POST["nouveau_mot_de_passe"];
    $confirmerMotDePasse = $_POST["confirmer_mot_de_passe"];

    if (empty($motDePasseActuel) || empty($nouveauMotDePasse) || empty($confirmerMotDePasse)) {
        $erreur = "Veuillez remplir tous les champs.";
    } else {

        $stmt = $db->prepare("SELECT mdp FROM client WHERE id_client = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor(); 

        if ($result && $result["mdp"] === $motDePasseActuel) {
           
            if ($nouveauMotDePasse === $confirmerMotDePasse) {
               
                $stmt = $db->prepare("UPDATE client SET mdp = :nouveauMotDePasse WHERE id_client = :userID");
                $stmt->bindParam(':nouveauMotDePasse', $nouveauMotDePasse, PDO::PARAM_STR);
                $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
                $stmt->execute();
                $message = "Le mot de passe a été modifié avec succès.";
            } else {
                $erreur = "Les nouveaux mots de passe ne correspondent pas.";
            }
        } else {
            $erreur = "Le mot de passe actuel est incorrect.";
        }
    }
}


$db = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier le mot de passe</title>
    <link rel="stylesheet" href="styles/modifmdp.css"/>

</head>
<body>

<h2>Modifier le mot de passe</h2>

<?php if (isset($erreur)) : ?>
    <p style="color: red;"><?php echo $erreur; ?></p>
<?php endif; ?>

<?php if (isset($message)) : ?>
    <p style="color: green;"><?php echo $message; ?></p>
<?php endif; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="mot_de_passe_actuel">Mot de passe actuel:</label>
    <input type="password" name="mot_de_passe_actuel" required><br><br>

    <label for="nouveau_mot_de_passe">Nouveau mot de passe:</label>
    <input type="password" name="nouveau_mot_de_passe" required><br><br>

    <label for="confirmer_mot_de_passe">Confirmer le nouveau mot de passe:</label>
    <input type="password" name="confirmer_mot_de_passe" required><br><br>

    <button class="submit" type="submit">Modifier le mot de passe</button>
</form>

<p><a href="page_utilisateur.php">Retour sur son profil</a></p>

</body>
</html>