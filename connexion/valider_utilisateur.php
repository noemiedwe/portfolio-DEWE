<?php
session_start();
include 'connexionDB.php';

if (!isset($_GET['id'])) {
    die("ID de l'utilisateur non spécifié.");
}

$id_utilisateur = $_GET['id'];

// Mettre à jour le statut de validation de l'utilisateur
$sql = "UPDATE utilisateurs SET valide = 1 WHERE id_utilisateur = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_utilisateur);

if ($stmt->execute()) {
    echo "Utilisateur validé avec succès.";
} else {
    echo "Erreur: " . $stmt->error;
}

$stmt->close();
$conn->close();
header("Location: ../projet/role.php");
exit;
?>
