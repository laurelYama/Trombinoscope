<?php
include 'connection.php';
include '../rapport/log_functions.php';
session_start();

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
        writeLog("Tentative d'ajout avec email invalide: $email");
        header('Location: ajouterEtudiant.php?error=email_invalide');
        exit();
    }

    if (!in_array($photo_extension, $allowed_extensions) || $_FILES['photo']['size'] > 5000000) {
        writeLog("Tentative d'ajout avec photo invalide: $photo");
        header('Location: ajouterEtudiant.php?error=photo_invalide');
        exit();
    }

    // Vérifier si l'email existe déjà
    $stmtEmail = $pdo->prepare("SELECT COUNT(*) FROM etudiant WHERE email = ?");
    $stmtEmail->execute([$email]);
    $countEmail = $stmtEmail->fetchColumn();

    if ($countEmail > 0) {
        writeLog("Tentative d'ajout avec email existant: $email");
        header('Location: ajouterEtudiant.php?error=email_existant');
        exit();
    }

    // Vérifier si le numéro de téléphone existe déjà
    $stmtTelephone = $pdo->prepare("SELECT COUNT(*) FROM etudiant WHERE numeroTelephone = ?");
    $stmtTelephone->execute([$numeroTelephone]);
    $countTelephone = $stmtTelephone->fetchColumn();

    if ($countTelephone > 0) {
        writeLog("Tentative d'ajout avec numéro de téléphone existant: $numeroTelephone");
        header('Location: ajouterEtudiant.php?error=telephone_existant');
        exit();
    }

    $photo = time() . '_' . $photo; // Éviter les collisions de noms de fichier
    if (move_uploaded_file($photo_tmp, "../images/depot/$photo")) {
        $stmt = $pdo->prepare("INSERT INTO etudiant (nom, prenom, numeroTelephone, email, photo, id_promotion, id_parcours, id_specialite) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$nom, $prenom, $numeroTelephone, $email, $photo, $id_promotion, $id_parcours, $id_specialite])) {
            writeLog("Ajout réussi de l'étudiant: $email");
            header('Location: ajouterEtudiant.php?success=1');
        } else {
            writeLog("Échec de l'insertion dans la base de données pour l'étudiant: $email");
            header('Location: ajouterEtudiant.php?error=echec_insertion');
        }
    } else {
        writeLog("Échec du téléchargement de la photo pour l'étudiant: $email");
        header('Location: ajouterEtudiant.php?error=echec_upload_photo');
    }
    exit();
}
?>
