<?php
session_start();
include 'connexionDB.php';

if (!isset($_GET['id'])) {
    die("ID de l'utilisateur non spécifié.");
}

$id_utilisateur = $_GET['id'];

// Supprimer l'utilisateur
$sql = "DELETE FROM utilisateurs WHERE id_utilisateur = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_utilisateur);

if ($stmt->execute()) {
    echo "Utilisateur supprimé avec succès.";
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
header("Location: ../projet/role.php");
exit;
?>
