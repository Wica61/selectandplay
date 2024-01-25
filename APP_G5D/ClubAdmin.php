<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une Boîte de Nuit</title>
    <link rel="stylesheet" href="Styles/FormUpdate.css">
    <link rel="icon" href="LogoIcon.png" type="image/png">
    <?php 
        require_once("Header.php")
        ?>
</head>
<body1>
<div class=formclub>
    <form action="AjoutClubADMIN.php" method="post">
        Numéro SIRET: <input type="text" name="num_siret" class="input3"><br>
        Adresse: <input type="text" name="adresse" class="intput3"><br>
        Nom: <input type="text" name="nom" class="intput3"><br>
        <input type="submit" value="Ajouter"class = "input4">
    </form>
</div>

</body1>
</html>
