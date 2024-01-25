
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>phpLogin</title>
    <link rel="stylesheet" href="styles/styleslogin.css">
    <?php require_once("Header.php"); ?>
</head>

<body>
    <?php
    session_start();

    try {
        $connexion = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = $_POST['username'];
        $utilisateur = $_POST["Utilisateur"];

        if ($utilisateur == "DJ") {
            $sql = "SELECT id_DJ, mdp FROM DJ WHERE Username = :username";
        } elseif ($utilisateur == "Client") {
            $sql = "SELECT id_client, mdp FROM client WHERE Username = :username";
        }

        $requete = $connexion->prepare($sql);
        $requete->bindParam(':username', $username);
        $requete->execute();

        if ($requete->rowCount() > 0) {
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            $password_hash = $resultat['mdp'];

            if (password_verify($_POST['password'], $password_hash)) {

                if ($utilisateur == "DJ") {
                    $_SESSION['id_DJ'] = $resultat['id_DJ'];
                    header("Location: Profil_DJ_2.php");
                } elseif ($utilisateur == "Client") {
                    $_SESSION['client_id'] = $resultat['id_client'];
                    header("Location: page_utilisateur.php");
                }
            } else {
             
                header("Location: nonuser.php");
            }
        } else {
        
            header("Location: nonuser.php");
        }
        die();

        $connexion = null;

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>
</body>

</html>
