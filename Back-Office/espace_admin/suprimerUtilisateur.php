<?php
session_start();
require('../connection.php');

// Vérification que l'ID est passé en paramètre GET
if (!isset($_GET['id'])) {
    $_SESSION['error_message'] = "Erreur : ID non défini.";
    header('Location: admin.php');
    exit();
}

$id = $_GET['id'];

try {
    // Vérification si l'utilisateur existe
    $query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $query->execute([$id]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Suppression de l'enregistrement de l'utilisateur de la base de données
        $deleteQuery = $pdo->prepare("DELETE FROM users WHERE id = ?");
        if ($deleteQuery->execute([$id])) {
            $_SESSION['success_message'] = "Utilisateur supprimé avec succès.";
            header('Location: admin.php');
        } else {
            $_SESSION['error_message'] = "Erreur : Impossible de supprimer l'utilisateur.";
            header('Location: admin.php');
        }
    } else {
        $_SESSION['error_message'] = "Aucun utilisateur trouvé avec cet ID.";
        header('Location: admin.php');
    }
} catch (PDOException $e) {
    $_SESSION['error_message'] = "Erreur PDO : " . $e->getMessage();
    header('Location: admin.php');
} catch (Exception $e) {
    $_SESSION['error_message'] = "Erreur : " . $e->getMessage();
    header('Location: admin.php');
}
exit();
?>
