<?php
include '../connexion/connexionDB.php';

$id_trace = $_GET['id'];

$sql = "SELECT * FROM traces WHERE id_trace = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_trace);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo "<h1>Détails de la Trace</h1>";
    echo "<p><strong>Numéro d'immatriculation:</strong> " . $row["numero_immatriculation"] . "</p>";
    echo "<p><strong>Type:</strong> " . $row["id_type"] . "</p>";
    echo "<p><strong>Année de BUT:</strong> " . $row["annee_but"] . "</p>";
    echo "<p><strong>Argumentaire:</strong> " . $row["argumentaire"] . "</p>";
} else {
    echo "Aucune trace trouvée avec cet ID.";
}

$stmt->close();
$conn->close();
?>