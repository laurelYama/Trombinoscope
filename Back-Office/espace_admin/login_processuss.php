<?php
session_start();

include '../connection.php';
include 'crypto.php'; // Fichier contenant les fonctions encryptPassword et decryptPassword

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, username, password, role FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $decrypted_password = decryptPassword($user['password']);
        if ($password === $decrypted_password) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header('Location: ../etudiant.php');
            exit();
        } else {
            header('Location: login.php?error=Mot de passe incorrect');
            exit();
        }
    } else {
        header('Location: login.php?error=Email incorrect');
        exit();
    }
}
?>
