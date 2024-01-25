<!DOCTYPE HTML>
<html>
	<head>
		<title>Modification du Profil</title>
		<link rel="stylesheet" href="styles/modifprofil.css"/>
		<?php
require_once("Header.php")
?>
	</head>
	<body>


<h1>Vérifiez ou modifiez vos informations</h1>
<?php
session_start();

if (session_status() == PHP_SESSION_ACTIVE) {
    
  
    if (isset($_SESSION['id_DJ'])) {
      
        $id_DJ = $_SESSION['id_DJ'];
        
        
        echo "<br><br>";
    } else {
        echo "L'ID du DJ n'est pas défini dans la session.";
    }

} else {
    echo "La session n'est pas active.";
}
?>
<?php
function updateUsers($db,$nom,$prenom,$username,$mail,$telephone,$id){
        $reponse = $db->prepare("update DJ set Nom = ?, Prenom = ?,Username=?,Mail=?,Telephone=? where id_DJ = ?");
	    $reponse->execute(array($_GET["nom"],$_GET["prenom"],$_GET["username"],$_GET["mail"],$_GET["telephone"], $_GET["id"] ));
        return $reponse;
    };

function insertUsers($db,$nom,$prenom,$username,$mail,$telephone){
        $reponse = $db->prepare("insert into DJ (Nom,Prenom,username,Mail,Telephone) values (?,?,?,?,?)");
        $reponse->execute(array($_GET["Nom"], $_GET["Prenom"], $_GET["Username"],$_GET["Mail"],$_GET["Telephone"]));
        return $reponse;
    };


function selectUsers($db,$id){
    $reponse = $db->prepare("select * from DJ where id_DJ=?");
    $reponse->execute(array($_GET["id"]));
    return $reponse;
};


function selectAll($db,$id_DJ){	
    $reponse = $db->prepare("select * from DJ where id_DJ = $id_DJ");
        $reponse->execute();
    return $reponse;
};

?>

<?php
$db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
?>

<?php


if(isset($_GET["action"]) && $_GET["action"]=="save") {
		if(isset($_GET["id"]) &&  $_GET["id"]!=null) {
			$reponse = updateUsers($db,$_GET["nom"],$_GET["prenom"],$_GET["username"],$_GET["mail"],$_GET["telephone"],$_GET["id"]);
			
			
		} else {
			$reponse = updateUsers($db,$_GET["nom"],$_GET["prenom"],$_GET["username"],$_GET["mail"],$_GET["telephone"]);
			
		}
	}





if(isset($_GET["action"]) && ($_GET["action"]=="ajouter" || $_GET["action"]=="modifier")) {
		$nom = "";
		$prenom = "";
		$id = "";
        $username= "";
        $mail= "";
		$telephone = "";

		if($_GET["action"]=="modifier") {
			$reponse = selectUsers($db,$_GET['id']);

		while($user = $reponse->fetch()){
			$nom = $user["Nom"];		
			$prenom = $user["Prenom"];		
			$id = $user["id_DJ"];
			$username =$user["Username"];
            $mail = $user["Mail"];
            $telephone = $user["Telephone"];
		}
	}
?>	
	
	<form action="Modif_Profil_DJ.php" method="get">
		Nom : <input type="text" name="nom" value="<?php echo $nom; ?>"/><br><br>
		Prenom : <input type="text" name="prenom" value="<?php echo $prenom; ?>"/><br><br>
        username : <input type="text" name="username" value="<?php echo $username; ?>"/><br><br>
        mail : <input type="text" name="mail" value="<?php echo $mail; ?>"/><br><br>
        numero de telephone : <input type="text" name="telephone" value="<?php echo $telephone; ?>"/><br><br>
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		<input type="hidden" name="action" value="save"/>
		<input class="submit" type="submit"/>
	</form>

<?php	
} else {
	$reponse = selectAll($db,$id_DJ);



?>
<table border=1px>
	<?php
	while($user = $reponse->fetch()) {
	?>				
	<tr>
		<td>
			<?php echo $user["Nom"]; ?>
		</td>
		<td>
			<?php echo $user["Prenom"]; ?>
		</td>
        <td>
			<?php echo $user["Username"]; ?>
		</td>
        <td>
			<?php echo $user["Mail"]; ?>
		</td>
        <td>
			<?php echo $user["Telephone"]; ?>
		</td>
		<td>
			<?php echo '<a href="Modif_Profil_DJ.php?action=modifier&id='.$user["id_DJ"].'">modifier</a>' ?>
		</td>
	</tr>
	<?php } ?>	
	
</table>
<br>
<a href="modifier_mdp_DJ.php">modifier son mot de passe</a>
    <br><br>
<a href="profil_DJ_2.php">Retour à votre profil</a>
<?php } ?>	
	</body>
</html>

