<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création d'Utilisateur</title>
</head>
<body>
    <h2>Créer un Utilisateur</h2>
    <form action="traitement_creer_utilisateur.php" method="POST">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="role">Rôle :</label>
        <input type="text" id="role" name="role" required>
        <br>
        <button type="submit" name="create_user">Créer</button>
    </form>
</body>
</html>