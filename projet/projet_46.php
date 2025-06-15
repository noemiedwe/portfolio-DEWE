<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet - 46</title>
    <link rel="stylesheet" href="projet.css">
</head>
<body>
     <?php
    session_start();
    $role = $_SESSION['role'] ?? 'inconnu';


    $id_trace = 46;
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
               <p><img src="uploads/RS.png" alt="Image du projet"></p>
            </div>
    <div class="project-details">
        <h1>Réseaux sociaux Vaguav </h1>
        <div>
        <p><strong>Année de BUT:</strong> BUT MMI 1</p>
        <p><strong>Compétence :</strong> concevoir</p>
        <p class="description"> Dans le cadre de notre agence Vaguav, et donc de la SAE 2.02, on a du créer une stratégie de communication sur les réseaux sociaux.  Cela nous a permis d&#039;être présent en ligne et de nous faire connaître. Mon role dans cette partie était de vérifier que nos réseaux fonctionnait, mettre des storys et j&#039;ai aussi publié quelques postes. </p>
        <p>2025-05-01</p>
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
