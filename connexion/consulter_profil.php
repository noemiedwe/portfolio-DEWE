<?php
session_start();
include 'connexionDB.php';

if (!isset($_GET['id'])) {
    die("ID de l'utilisateur non spécifié.");
}

$id_utilisateur = $_GET['id'];

// Récupérer les informations de l'utilisateur
$sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_utilisateur);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Afficher les informations de l'utilisateur
    echo "Nom d'utilisateur: " . htmlspecialchars($row['nom_utilisateur']) . "<br>";
    echo "Rôle: " . htmlspecialchars($row['role']) . "<br>";
} else {
    echo "Utilisateur non trouvé.";
}

$stmt->close();
$conn->close();
?>
