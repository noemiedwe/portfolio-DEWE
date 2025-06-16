<?php
session_start();
$servername = "localhost";
$username = "u148474356_root1";
$password = "Minou007.newt";
$dbname = "u148474356_portfoliouser";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $role = $_POST['role'] ?? 'Concepteur';

    $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, email, nom_utilisateur, mot_de_passe, role) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nom, $prenom, $email, $nom_utilisateur, $mot_de_passe_hache, $role);

    if ($stmt->execute()) {
        header("Location: connexion.php");
        exit;
    } else {
        echo "❌ Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
