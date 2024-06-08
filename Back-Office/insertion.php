<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
    $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
    $numeroTelephone = filter_var($_POST['numeroTelephone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $id_promotion = filter_var($_POST['id_promotion'], FILTER_SANITIZE_NUMBER_INT);
    $id_parcours = filter_var($_POST['id_parcours'], FILTER_SANITIZE_NUMBER_INT);
    $id_specialite = filter_var($_POST['id_specialite'], FILTER_SANITIZE_NUMBER_INT);
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $photo_extension = pathinfo($photo, PATHINFO_EXTENSION);

    if ($email === false) {
        header('Location: ajouterEtudiant.php?error=invalid_email');
        exit();
    }

    if (!in_array($photo_extension, $allowed_extensions) || $_FILES['photo']['size'] > 5000000) {
        header('Location: ajouterEtudiant.php?error=invalid_photo');
        exit();
    }

    $photo = time() . '_' . $photo; // Prevent file name collision
    move_uploaded_file($photo_tmp, "../images/depot/$photo");

    $stmt = $pdo->prepare("INSERT INTO etudiant (nom, prenom, numeroTelephone, email, photo, id_promotion, id_parcours, id_specialite) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$nom, $prenom, $numeroTelephone, $email, $photo, $id_promotion, $id_parcours, $id_specialite])) {
        header('Location: ajouterEtudiant.php?success=1');
    } else {
        header('Location: ajouterEtudiant.php?error=insert_failed');
    }
    exit();
}
?>