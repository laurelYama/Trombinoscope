<?php
include '../connection.php';
include 'crypto.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_user'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Assurez-vous que le rôle est correctement défini (par exemple, 'admin' ou 'normal')

    // Chiffrer le mot de passe
    $encrypted_password = encryptPassword($password);

    // Insérer l'utilisateur dans la base de données
    $stmt = $pdo->prepare("INSERT INTO users (email, username, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$email, $username, $encrypted_password, $role]);

    header('Location: admin.php');
}
?>
