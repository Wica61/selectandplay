<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Header</title>
  <link rel="stylesheet" href="Styles/styleapropos.css">

  <?php
    $db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
    require_once("Header.php");
    $stmt = $db->query("SELECT * FROM faq");
    $faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

</head>
<body>
  <div class="center-message">
    <h2 class="bold">Question Frequemment Poser de Select & Play</h2>
    <?php
        if (empty($faqs)) {
            echo "<p>Aucune question fréquemment posée disponible.</p>";
        } else {
            foreach ($faqs as $faq) {
                echo "<div>";
                echo "<h3>{$faq['Question']}</h3>";
                echo "<p>{$faq['Reponse']}</p>";
                echo "</div>";
            }
        }
        ?>






</body>
</html>
