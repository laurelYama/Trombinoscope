<?php
require('../connection.php');

// Vérification que l'ID est passé en paramètre GET
if (!isset($_GET['id'])) {
    echo "Erreur : id non défini.";
    exit;
}

$id = $_GET['id'];

// Préparation et exécution de la requête SQL
$query = $pdo->prepare("SELECT * FROM users  WHERE id = :id");
$query->execute(['id' => $id]);
$datas = $query->fetch(PDO::FETCH_ASSOC);

// Vérification que les données de l'étudiant ont été trouvées
if (!$datas) {
    echo "Aucun utilisateur trouvé avec cet ID.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Utilisateur</title>
</head>
<body>
    <h2>Créer un Utilisateur</h2>
    <form action="traitement_creer_utilisateur.php" method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($datas['email']); ?>" required>
        <br>
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($datas['username']); ?>" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($datas['password']); ?>" required>
        <br>
        <label for="role">Rôle :</label>
        <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($datas['role']); ?>" required>
        <br>
        <button type="submit" name="create_user">Créer</button>
    </form>
</body>
</html>