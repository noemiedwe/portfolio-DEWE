<?php
session_start();
include 'connexionDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("SELECT id_utilisateur, mot_de_passe, role FROM utilisateurs WHERE nom_utilisateur = ?");
    $stmt->bind_param("s", $nom_utilisateur);
    $stmt->execute();
    $result = $stmt->get_result();

    

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($mot_de_passe, $row['mot_de_passe']) && $row['role'] == $role) {
            session_start();
            $_SESSION['id_utilisateur'] = $row['id_utilisateur'];
            $_SESSION['nom_utilisateur'] = $nom_utilisateur;
            $_SESSION['role'] = $role;
            header("Location: \projet\portfolioacadémique.php");
        } else {
            echo "Email, mot de passe ou rôle incorrect.";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }
    
    

    $stmt->close();
}
$conn->close();
?>