<?php
session_start();
include '../connexion/connexionDB.php';

// Vérifiez si l'utilisateur est un concepteur
if ($_SESSION['role'] !== 'Concepteur') {
    header("Location: /accueil/index.html");
    exit();
}

// Récupérer la liste des utilisateurs
$sql = "SELECT * FROM utilisateurs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Profils</title>
    <link rel="stylesheet" href="professionnel.css">
</head>
<body>
    <section>
    <nav class="navbar navbar-expand-lg navbar-custom px-3">
  <button onclick="window.history.back()">Retour</button>
  <div class="navbar-nav me-auto">
    <a class="nav-link text-white" href="../accueil/index.html">Accueil</a>
    <a class="nav-link text-white" href="../projet/portfolioacadémique.php">Portfolio Académique</a>
    <a class="nav-link text-white" href="../connexion/deconnexion.php">Déconnexion</a>
    </section>
    <h1>Gestion des Profils</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom d'Utilisateur</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_utilisateur'] . "</td>";
                echo "<td>" . htmlspecialchars($row['nom_utilisateur']) . "</td>";
                echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                echo "<td>
                        <a href='../connexion/valider_utilisateur.php?id=" . $row['id_utilisateur'] . "'>Valider</a> |
                        <a href='../connexion/consulter_profil.php?id=" . $row['id_utilisateur'] . "'>Consulter</a> |
                        <a href='../connexion/modifier_profil.php?id=" . $row['id_utilisateur'] . "'>Modifier</a> |
                        <a href='../connexion/supprimer_profil.php?id=" . $row['id_utilisateur'] . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce profil ?\")'>Supprimer</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Aucun utilisateur trouvé.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
