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
    // Afficher un formulaire pour modifier les informations de l'utilisateur
    echo '<form action="traitement_modifier_profil.php" method="post">';
    echo '<input type="hidden" name="id_utilisateur" value="' . $row['id_utilisateur'] . '">';
    echo 'Nom d\'utilisateur: <input type="text" name="nom_utilisateur" value="' . htmlspecialchars($row['nom_utilisateur']) . '"><br>';
    echo 'Rôle: <input type="text" name="role" value="' . htmlspecialchars($row['role']) . '"><br>';
    echo '<button type="submit">Modifier</button>';
    echo '</form>';
} else {
    echo "Utilisateur non trouvé.";
}

$stmt->close();
$conn->close();
?>
