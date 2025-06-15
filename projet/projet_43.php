<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet - 43</title>
    <link rel="stylesheet" href="projet.css">
</head>
<body>
     <?php
    session_start();
    $role = $_SESSION['role'] ?? 'inconnu';


    $id_trace = 43;
    ?>
    <nav class="navbar navbar-expand-lg navbar-custom px-3">
  <button onclick="window.history.back()">Retour</button>
  <div class="navbar-nav me-auto">
    <a class="nav-link text-white" href="../accueil/index.html">Accueil</a>
    <a class="nav-link text-white" href="../projet/portfolioacadémique.php">Portfolio académique</a>
    <a class="nav-link text-white" href="../connexion/deconnexion.php">Déconnexion</a>
  </div>
</nav>
<section>
    <div class="projects-container">
        <div class="project-card">
            <div class="project-image">
               <p><img src="uploads/Capture d&#039;écran 2025-06-15 175529.png" alt="Image du projet"></p>
            </div>
    <div class="project-details">
        <h1>Site MMI Glisse </h1>
        <div>
        <p><strong>Année de BUT:</strong>BUT MMI 1 </p>
        <p><strong>Compétence :</strong>Développer </p>
        <p class="description"> Au cours du semestre 1, on a du réaliser un site marchand par groupe de 3. On s&#039;est alors réparti les tâches et chacun de nous à fait une partie : le panier, la structure des pages, le tri,... Cela nous a permis de mieux comprendre le codage et de coder un tout premier site en entier. Cette trace a été réalisé lors de la SAE 1.05. Ce projet m&#039;a permis de mieux comprendre le CSS/HTML et de commencer à coder en PHP.</p>
        <p>2025-02-01</p>
        </div>
    </div>
</section>
<section>
        <?php if ($role === 'Concepteur' || $role === 'Évaluateur'): ?>
            <div class="comments-section">
                <h4>Commentaires</h4>
                <div id="comments-container">
                    <!-- Les commentaires seront chargés ici dynamiquement -->
                    
                </div>

                <form action="submit_comment.php" method="post" class="comment-form">
                    <input type="hidden" name="id_trace" value="<?php echo $id_trace; ?>">
                    <label for="utilisateur">Nom:</label>
                    <input type="text" id="utilisateur" name="utilisateur" value="<?php echo htmlspecialchars($_SESSION['utilisateur']); ?>" required>
                    <label for="commentaire">Commentaire:</label>
                    <textarea id="commentaire" name="commentaire" required></textarea>
                    <button type="submit">Poster le commentaire</button>
                </form>
                 <?php 
                    $_GET['id_trace'] = $id_trace;
                    include 'afficher_commentaires.php';
                    include 'reponse_commentaires.php';?>
            </div>
        <?php endif; ?>
    </section>
</body>
</html>
