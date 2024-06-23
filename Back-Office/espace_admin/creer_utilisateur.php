<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/creer_utilisateur.css">
    <link rel="icon" type="../../images/logos.jpeg" href=https://esiitech-gabon.com/images/favicon.jpeg>
    <title>Création d'Utilisateur</title>
</head>
<style>
    .error-message {
    color: red;
    font-weight: bold;
    margin-top: 10px;
}
</style>
<body>
    <form action="traitement_creer_utilisateur.php" method="POST">
        <h2>Créer un Utilisateur</h2>

        <?php
        // Vérifier s'il y a un message d'erreur dans la session
        session_start();
        if (isset($_SESSION['error_message'])) {
            echo '<div class="error-message">' . $_SESSION['error_message'] . '</div>';
            unset($_SESSION['error_message']); // Supprimer le message après l'avoir affiché
        }
        ?>

        <input type="email" id="email" name="email" placeholder="email" required>

        <input type="text" id="username" name="username" placeholder="username" required>

        <input type="password" id="password" name="password" placeholder="Mot de passe" required>

        <select id="role" name="role" required>
            <option value="">Sélection un rôle</option>
            <option value="admin">admin</option>
            <option value="normal">normal</option>
        </select>

        <input type="submit" value="Créer" name="create_user">
    </form>
</body>
</html>
