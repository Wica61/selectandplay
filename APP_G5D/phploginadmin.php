<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>phpLogin</title>
    <link rel="stylesheet" href="styles/styleslogin.css">
    <?php
    require_once("Header.php");
    ?>
</head>

<body>
    <?php
    session_start();

    try {
        $connexion = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM administrateur WHERE Username = :username AND mdp = :password";


        $requete = $connexion->prepare($sql);
        $requete->bindParam(':username', $username);
        $requete->bindParam(':password', $password);
        $requete->execute();

        if ($requete->rowCount() > 0) {
            
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            $id_utilisateur = $resultat['id_administrateur']; 
            
            
            $_SESSION['id_administrateur'] = $id_administrateur;
            header("Location:AdminV2.php");
            
            die();
        } else {
            header("Location: nonuser.php");
            die();
        }

        $connexion = null;

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>
</body>

</html>