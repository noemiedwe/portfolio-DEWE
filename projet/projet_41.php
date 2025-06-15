<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet - <?php echo $id_trace; ?></title>
    <link rel="stylesheet" href="projet.css">
</head>
<body>
     <?php
    session_start();
    $role = $_SESSION['role'] ?? 'inconnu';


    $id_trace = 41;
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
               <p><img src="uploads/49e962f7-2cbe-4c0f-af2f-e5a8773951c7.png" alt="Image du projet"></p>
            </div>
    <div class="project-details">
        <h1>Titre : rezrejkerzj </h1>
        <div>
        <p><strong>Année de BUT:</strong> fsqhjshf</p>
        <p><strong>Compétence :</strong> </p>
        <p class="description"> sdfnfh</p>
        <p><strong>Date:</strong> 5667-05-23</p>
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
