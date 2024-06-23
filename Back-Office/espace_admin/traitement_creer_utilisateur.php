<?php
include '../connection.php';
include 'crypto.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_user'])) {
    // Récupérer et valider les données du formulaire
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $role = ($_POST['role'] === 'admin') ? 'admin' : 'normal'; // Assurez-vous que le rôle est correctement défini (par exemple, 'admin' ou 'normal')

    if (!$email || empty($username) || empty($password) || empty($role)) {
        $_SESSION['error_message'] = "Veuillez remplir tous les champs correctement.";
        header('Location: creer_utilisateur.php');
        exit();
    }

    // Chiffrer le mot de passe
    $encrypted_password = encryptPassword($password);

    // Vérifier si l'email est déjà utilisé
    $checkEmailQuery = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $checkEmailQuery->execute([$email]);
    $count = $checkEmailQuery->fetchColumn();

    if ($count > 0) {
        $_SESSION['error_message'] = "L'email est déjà utilisé par un autre utilisateur.";
        header('Location: creer_utilisateur.php');
        exit();
    }

    // Insérer l'utilisateur dans la base de données
    $stmt = $pdo->prepare("INSERT INTO users (email, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$email, $username, $encrypted_password, $role]);

    // Ajouter un message de succès à la session
    $_SESSION['success_message'] = "Utilisateur créé avec succès.";

    header('Location: admin.php');
    exit();
}
?>
