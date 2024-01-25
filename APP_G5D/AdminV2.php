<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Select and Play - Admin</title>

    <link rel="stylesheet" href="Styles/globaladminV2.css" />
    <link rel="stylesheet" href="Styles/PageadminV2.css" />
    <link rel="stylesheet" href="Styles/styleslogin.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
    />
    <?php
    $db = new PDO("mysql:host=localhost;dbname=S&P_BDD", "root", "");
    require_once("Header.php");
    $stmtC = $db->prepare("SELECT COUNT(id_client) AS client_count FROM client");  
    if ($stmtC->execute()) 
      $resultC = $stmtC->fetch(PDO::FETCH_ASSOC);
    
    $stmtM = $db->prepare("SELECT COUNT(id_musique) AS musique_count FROM musique");  
    if ($stmtM->execute()) 
      $resultM = $stmtM->fetch(PDO::FETCH_ASSOC);

    $stmtP = $db->prepare("SELECT SUM(Points_de_fidelite) AS Points_totaux FROM client");  
    if ($stmtP->execute()) 
      $resultP = $stmtP->fetch(PDO::FETCH_ASSOC);  


?>
        
  </head>
  <body>
    <div class="page">
      <header class="top-bar">
        <div class="top-bar-child"></div>
        <h2 class="title">Administrator Dashboard</h2>
      </header>
      <div class="sidebar">
        <div class="item">
          <div class="frame">
            <div class="icon"></div>
          </div>
          <div class="title1"></div>
        </div>
        <div class="item">
          <div class="frame">
            <div class="icon"></div>
          </div>
          <a href="Apropos.php">
          <div class="title1">Apropos Access</div>
        </a>
        </div>
        <div class="item">
          <div class="frame">
            <div class="icon"></div>
          </div>
          <a href="Stats.php">
          <div class="title1">Statistics</div>
        </a>
        </div>
        <div class="item3" id="itemContainer3">
          <div class="frame">
            <div class="icon"></div>
          </div>
          <a href="membres.php">
          <div class="title1">Member List</div>
        </a>
        </div>
        <div class="item4" id="itemContainer4">
          <div class="frame">
            <div class="icon"></div>
          </div>
          <a href="ListeSuggestion.php">
          <div class="title1">Suggestion</div>
        </a>
        </div>
      </div>
      <section class="section">
        <div class="container">
          <h1 class="title6">Welcome to the Administrator Dashboard!</h1>
          <div class="description">Manage and monitor your system</div>
        </div>
        <img class="section-child" alt="" src="./public/vector-200@2x.png" />
      </section>
      <section class="section1">
        <div class="container1">
          <h1 class="title7">Apropos Access</h1>
          <div class="description1">View and manipulate data</div>
          <button class="button" onclick="openDatabase()">
            <div class="primary">
              <div class="title8">Apropos</div>
              <script>
                function openDatabase() {
                    var filePath = 'Apropos.php';
                    window.open(filePath, '_blank');
                }
            </script>
            </div>
          </button>
        </div>

        <img class="section-item" alt="" src="./public/vector-200@2x.png" />
      </section>
      <section class="section2">
        <div class="container">
          <h1 class="title6">Statistics</h1>
          <div class="list1">
            <div class="metric">
              <b class="title14">Total Users</b>
              <?php
            echo '<div class="data">' . $resultC['client_count'] . '</div>';
              ?>
            </div>
            <div class="metric">
              <b class="title14">Titre Disponible</b>
              <?php
            echo '<div class="data">' . $resultM['musique_count'] . '</div>';
              ?>              
            </div>
            <div class="metric">
              <b class="title14">Total des points de fidelité</b>
              <?php
            echo '<div class="data">' . $resultP['Points_totaux'] . '</div>';
              ?>
            
            </div>
          </div>
        </div>
        <img class="section-child" alt="" src="./public/vector-200@2x.png" />
      </section>
      <section class="section4" data-scroll-to="section">
        <div class="container4">
          <h1 class="title7">Update FAQ</h1>
          <button class="primary1"onclick="Viewall()">
            <div class="title8">View FAQ</div>
          </button>
          <script>
            function Viewall() {
                var filePath = 'FAQADMIN.php';
                window.open(filePath, '_blank');
            }
        </script>
        <h1 class="title7">Update CGU</h1>
          <button class="primary1"onclick="Viewall2()">
            <div class="title8">View CGU</div>
          </button>
          <script>
            function Viewall2() {
                var filePath = 'CGUADMIN.php';
                window.open(filePath, '_blank');
            }
        </script>

        <h1 class="title7">Manage Clubs</h1>
          <button class="primary1"onclick="Viewall3()">
            <div class="title8">Manage Clubs</div>
          </button>
          <script>
            function Viewall3() {
                var filePath = 'ClubAdmin.php';
                window.open(filePath, '_blank');
            }
        </script>
         <h1 class="title7">Manage Forum</h1>
          <button class="primary1"onclick="Viewall4()">
            <div class="title8">Manage Forum </div>
          </button>
          <script>
            function Viewall4() {
                var filePath = 'Forum.php';
                window.open(filePath, '_blank');
            }
          </script>



        
    <script>
      var itemContainer3 = document.getElementById("itemContainer3");
      if (itemContainer3) {
        itemContainer3.addEventListener("click", function () {
          var anchor = document.querySelector("[data-scroll-to='section1']");
          if (anchor) {
            anchor.scrollIntoView({ block: "start", behavior: "smooth" });
          }
        });
      }
      
      var itemContainer4 = document.getElementById("itemContainer4");
      if (itemContainer4) {
        itemContainer4.addEventListener("click", function () {
          var anchor = document.querySelector("[data-scroll-to='section']");
          if (anchor) {
            anchor.scrollIntoView({ block: "start", behavior: "smooth" });
          }
        });
      }
      </script>

  </body>
</html>
