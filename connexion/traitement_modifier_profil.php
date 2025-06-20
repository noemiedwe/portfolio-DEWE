<?php
session_start();
include 'connexionDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez si l'utilisateur est un concepteur
    if ($_SESSION['role'] !== 'Concepteur') {
        header("Location: /accueil.html");
        exit();
    }

    // Récupérez les données du formulaire
    $id_utilisateur = $_POST['id_utilisateur'];
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $role = $_POST['role'];
    
    $sql = "UPDATE utilisateurs SET nom_utilisateur = ?, role = ? WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($sql);

    // Liez les paramètres et exécutez la requête
    $stmt->bind_param("ssi", $nom_utilisateur, $role, $id_utilisateur);

    if ($stmt->execute()) {
        echo "Profil modifié avec succès.";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: ../projet/role.php");
exit;
?>
