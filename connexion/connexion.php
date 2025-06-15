
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    <nav>
        <div class="nav-links">
            <button onclick="window.history.back()">retour</button>
            <a href="../accueil/index.html">accueil</a>
        </div>
    </nav>
    <div class="login-container">
    <h2 class="h2">Connexion</h2>
    <form action="traitement_connexion.php" method="Post" class="formulaire">
        <label for="nom_utilisateur">Nom d'utilisateur :</label>
        <input type="text" id="nom_utilisateur" name="nom_utilisateur" required>
        <br><br>
        <label for="mot_de_passe">Mot de Passe</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required>
        <br>
        <br>
        <label for="role">Profil:</label>
        <select id="role" name="role" required>
            <option value="Concepteur">Concepteur</option>
            <option value="Évaluateur">Évaluateur</option>
        </select>
        <br><br>
        <button type="submit">se connecter</button> 
    </form>
    <br>
    <p>pas de compte ? <a href="inscrire.html">s'inscrire</a></p>
    <br>

    <p>Si vous êtes un visiteur, <a href="/projet/portfolioacadémique.php?Visiteur=1">cliquez ici</a>.</p>
    </div>
</body>
</html>