<?php
include '/connexion/connexionDB.php';

$sql = "SELECT * FROM traces";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Numéro d'immatriculation</th><th>titre</th><th>Type</th><th>Année de BUT</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["numero_immatriculation"]."</td><td>".$row["titre"]."</td><td>".$row["id_type"]."</td><td>".$row["annee_but"]."</td><td><a href='/projet/detail_projet.php?id=".$row["id_trace"]."'>Voir les détails</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 résultats";
}

$conn->close();
?>