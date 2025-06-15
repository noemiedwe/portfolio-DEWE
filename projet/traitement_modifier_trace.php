<?php
session_start();
include '../connexion/connexionDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_trace = $_POST['id_trace'];
    $titre = $_POST['titre'];
    $annee_but = $_POST['annee_but'];
    $competence = $_POST['competence'];
    $argumentaire = $_POST['argumentaire'];

    // Gestion du fichier
    $chemin_destination = null;
    if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == UPLOAD_ERR_OK) {
        $fichier = $_FILES['fichier'];
        $nom_fichier = basename($fichier['name']);
        $chemin_temporaire = $fichier['tmp_name'];
        $chemin_destination = 'uploads/' . $nom_fichier;

        $dossier = 'uploads';
        if (!file_exists($dossier)) {
            if (!mkdir($dossier, 0755, true)) {
                die("Erreur: Impossible de créer le dossier '$dossier'.");
            }
        }

        // Supprimez l'ancien fichier s'il existe
        if (file_exists($chemin_destination)) {
            if (!unlink($chemin_destination)) {
                die("Erreur: Impossible de supprimer l'ancien fichier.");
            }
        }

        // Déplacez le nouveau fichier vers l'emplacement de destination
        if (!move_uploaded_file($chemin_temporaire, $chemin_destination)) {
            die("Erreur lors du téléchargement du fichier.");
        }

        $fichierNom = $nom_fichier;
    }

    // Mise à jour de la base de données
    if ($fichierNom !== null) {
        $sql = "UPDATE traces SET titre = ?, annee_but = ?, competence = ?, argumentaire = ?, fichier = ? WHERE id_trace = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssissi", $titre, $annee_but, $competence, $argumentaire,  $chemin_destination, $id_trace);
    } else {
        $sql = "UPDATE traces SET titre = ?, annee_but = ?, competence = ?, argumentaire = ? WHERE id_trace = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisi", $titre, $annee_but, $competence, $argumentaire, $id_trace);
    }

    if ($stmt->execute()) {
        echo "Trace modifiée avec succès.";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
header("Location: portfolioacadémique.php");
exit;
?>
