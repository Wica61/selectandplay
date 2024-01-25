<!DOCTYPE html>
<head>
        <html>
		<meta charset="utf-8" />
		<title>Select and Play - Choix de musiques</title>
		<link rel="stylesheet" href="Styles/StylesChoixMusique.css">
		<link rel="icon" href="LogoIcon.png" type="image/png">

		<?php
		require_once("Header.php");
        require_once("AjoutSuggestion.php");
		?>
	</head>
<body>
<div>
    <br>
    <label for="searchTitre">Rechercher un Titre :</label>
    <input type="text" id="searchTitre" oninput="rechercherTitreMusique()">

    <label for="searchArtiste">Rechercher un Artiste:</label>
    <input type="text" id="searchArtiste" oninput="rechercherArtisteMusique()">
</div>
<?php
    $sql = "SELECT * FROM musique";
    $result = $db->query($sql);

    if ($result->rowCount() > 0) {
        echo "<table id=\"tableMusiques\">";
        echo "<tr><th>Titre</th><th>Artiste</th><th>Genre</th><th>Date de sortie</th><th>Durée</th></tr>";

        while ($row = $result->fetch()) {
            echo "<tr onclick='ConfirmerSuggestion(\"" . $row['Titre'] . "\", \"" . $row['Artiste'] . "\", \"" . $row['id_musique'] . "\")'>";
            echo "<td>" . $row['Titre'] . "</td>";
            echo "<td>" . $row['Artiste'] . "</td>";
            echo "<td>" . $row['Genre'] . "</td>";
            echo "<td>" . $row['Date_de_sortie'] . "</td>";
            echo "<td>" . $row['Durée'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        unset($result);
    } else {
        echo "Aucun enregistrement trouvé.";
    }
?>



<script>

    function rechercherTitreMusique() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchTitre");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableMusiques");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function rechercherArtisteMusique() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchArtiste");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableMusiques");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function ConfirmerSuggestion(titre, artiste, id_musique) {
        var confirmation = confirm("Voulez-vous suggérer la musique : " + titre + " de " + artiste + " ?");
        
        if (confirmation) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "envoi_suggestion.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert("Musique suggérée : " + titre + " - " + artiste);
                }
            };
            
            xhr.send("id_musique=" + id_musique);
        }

    }
</script>

<?php require_once("Footer.php") ?>

</body>
</html>