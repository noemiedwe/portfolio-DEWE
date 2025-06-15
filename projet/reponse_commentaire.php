<?php
session_start();
include '../connexion/connexionDB.php';

$id_trace = $_GET['id_trace'];
$id_commentaire = $_POST['id_commentaire'];
$utilisateur = $_SESSION['utilisateur']; // Assurez-vous que l'utilisateur est connecté
$reponse = $_POST['reponse'];
$date_reponse = date('Y-m-d H:i:s');

if (!isset($_POST['id_commentaire']) || !isset($_POST['utilisateur']) || !isset($_POST['reponse'])) {
    die("Erreur: Les données du formulaire sont incomplètes.");
}

// Insérer la réponse dans la base de données
$sql = "INSERT INTO reponses (id_trace, utilisateur, reponse, date_reponse, id_commentaire) VALUES ('$id_trace', '$utilisateur', '$reponse', '$date_reponse', '$id_commentaire')";

if ($conn->query($sql) === TRUE) {
    header("Location: " . $_SERVER['HTTP_REFERER']); // Redirige vers la page précédente
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>