<?php
session_start();
include '../connexion/connexionDB.php';

if (!isset($_GET['id'])) {
    die("ID de trace non spécifié.");
}

$id_trace = $_GET['id'];

$sql = "SELECT * FROM traces WHERE id_trace = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_trace);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Trace non trouvée.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la Trace</title>
</head>
<body>
    <h1>Modifier la Trace</h1>
    <form action="traitement_modifier_trace.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_trace" value="<?php echo $row['id_trace']; ?>">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($row['titre']); ?>" required>
        <br>
        <label for="annee_but">Année de BUT</label>
        <input type="text" id="annee_but" name="annee_but" value="<?php echo htmlspecialchars($row['annee_but']); ?>" required>
        <br>
        <label for="competence">Compétence :</label>
        <input type="text" id="competence" name="competence" value="<?php echo htmlspecialchars($row['competence']); ?>" required>
        <br>
        <label for="argumentaire">Description :</label>
        <input type="text" id="argumentaire" name="argumentaire" value="<?php echo htmlspecialchars($row['argumentaire']); ?>" required>
        <br>
        <label for="fichier">fichier :</label>
            <input type="file" id="fichier" name="fichier" accept="image/*,video/*">
            <br>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>