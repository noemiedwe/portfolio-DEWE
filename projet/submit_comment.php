<?php
include '../connexion/connexionDB.php';

setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');

// Récupérer les données du formulaire
$utilisateur = $conn->real_escape_string($_POST['utilisateur']);
$commentaire = $conn->real_escape_string($_POST['commentaire']);
$id_trace = $conn->real_escape_string($_POST['id_trace']);
$date_commentaire = date('Y-m-d H:i:s');

// Insérer le commentaire dans la base de données
$sql = "INSERT INTO commentaires (id_trace, utilisateur, commentaire, date_commentaire) VALUES ('$id_trace', '$utilisateur', '$commentaire', '$date_commentaire')";

if ($conn->query($sql) === TRUE) {
    header("Location: " . $_SERVER['HTTP_REFERER']); // Redirige vers la page précédente
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
