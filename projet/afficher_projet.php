<?php
include '../connexion/connexionDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_trace = isset($_POST['id_trace']) ? $_POST['id_trace'] : null;

    if ($id_trace) {
        $sql = "SELECT * FROM traces WHERE id_trace = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id_trace);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <title>Projet - <?php echo htmlspecialchars($row["numero_immatriculation"]); ?></title>
            </head>
            <body>
                <h1>Projet: <?php echo htmlspecialchars($row["titre"]); ?></h1>
                <p><strong>Type:</strong> <?php echo htmlspecialchars($row["id_type"]); ?></p>
                <p><strong>Année de BUT:</strong> <?php echo htmlspecialchars($row["annee_but"]); ?></p>
                 <p><strong>Compétence :</strong> <?php echo htmlspecialchars($row["competence"]); ?></p>
                <p><strong>Argumentaire:</strong> <?php echo htmlspecialchars($row["argumentaire"]); ?></p>
                <p><strong>Date:</strong> <?php echo htmlspecialchars($row["date"]); ?></p>
                <p><strong>Fichier:</strong>
                    <?php
                    $fichier = $row["fichier"];
                    if (file_exists($fichier) && is_file($fichier)) {
                        $info = getimagesize($fichier);
                        if ($info !== false) {
                            echo "<img src='".htmlspecialchars($fichier)."' alt='Image du projet' style='max-width: 500px;'>";
                        } else {
                            echo "<a href='".htmlspecialchars($fichier)."'>Télécharger le fichier</a>";
                        }
                    } else {
                        echo "Fichier non trouvé.";
                    }
                    ?>
                </p>
            </body>
            </html>
            <?php
        } else {
            echo "Aucun projet trouvé avec cet ID.";
        }

        $stmt->close();
    } else {
        echo "ID de projet non fourni.";
    }
}

$conn->close();
?>
