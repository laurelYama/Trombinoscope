<?php
require('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idEtudiant = $_POST['idEtudiant'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numeroTelephone = $_POST['numeroTelephone'];
    $email = $_POST['email'];
    $id_promotion = $_POST['id_promotion'];
    $id_parcours = $_POST['id_parcours'];
    $id_specialite = $_POST['id_specialite'];

    // Gestion de la photo
    if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photo = $_FILES['photo']['name'];
        $upload = "../images/depot/" . $photo;
        move_uploaded_file($_FILES['photo']['tmp_name'], $upload);

        // Mise à jour avec nouvelle photo
        $query = "UPDATE etudiant SET photo = ?, nom = ?, prenom = ?, numeroTelephone = ?, email = ?, id_promotion = ?, id_parcours = ?, id_specialite = ? WHERE idEtudiant = ?";
        $params = [$photo, $nom, $prenom, $numeroTelephone, $email, $id_promotion, $id_parcours, $id_specialite, $idEtudiant];
    } else {
        // Mise à jour sans changer la photo
        $query = "UPDATE etudiant SET nom = ?, prenom = ?, numeroTelephone = ?, email = ?, id_promotion = ?, id_parcours = ?, id_specialite = ? WHERE idEtudiant = ?";
        $params = [$nom, $prenom, $numeroTelephone, $email, $id_promotion, $id_parcours, $id_specialite, $idEtudiant];
    }

    $stmt = $pdo->prepare($query);
    if ($stmt->execute($params)) {
        header('Location: etudiant.php');
    } else {
        echo "Erreur lors de la mise à jour.";
    }
}
?>
