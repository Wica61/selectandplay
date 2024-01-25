<?php
$db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Assurez-vous d'inclure les fichiers nécessaires de pChart
include("pChart2.1.4/class/pData.class.php");
include("pChart2.1.4/class/pDraw.class.php");
include("pChart2.1.4/class/pImage.class.php");



$sql = "SELECT e.capteur_id_capteur, e.dB, e.heure, b.nom FROM enregistrement as e JOIN soiree as s JOIN boite_de_nuit as b WHERE e.soiree_id_soiree=s.id_soiree AND b.Num_Siret=s.boite_de_nuit_Num_Siret";
$result = $db->query($sql);
$tab_heure=[];
$tab_dB=[];

if ($result->rowCount() > 0) {
    echo "<table>";
    echo "<tr><th>Nom Boîte de Nuit</th><th>ID Capteur</th><th>Db</th><th>heure</th></tr>";

    while ($row = $result->fetch()) {
        $tab_heure[]=$row['heure'];
        $tab_dB[]=$row['dB'];
    }



$MyData = new pData();
$MyData->addPoints($tab_dB, "dB");
$MyData->setAxisName(0, "Niveau de dB");
$MyData->addPoints($tab_heure, "Labels");
$MyData->setSerieDescription("Labels", "Heure");
$MyData->setAbscissa("Labels");

$myPicture = new pImage(700, 230, $MyData);

$myPicture->setFontProperties(array("FontName" => "pChart2.1.4/fonts/pf_arma_five.ttf", "FontSize" => 10));

$myPicture->setGraphArea(60, 40, 650, 200);

$myPicture->drawScale();
$myPicture->drawLineChart();
$myPicture->drawPlotChart(array("DisplayValues" => TRUE, "PlotBorder" => TRUE, "BorderSize" => 2, "Surrounding" => -60, "BorderAlpha" => 80));

$myPicture->stroke();
?>
