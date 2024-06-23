<?php
require('connection.php');
include 'log_functions.php';

// Vérification que l'ID est passé en paramètre GET
if (!isset($_GET['idEtudiant'])) {
    echo "Erreur : idEtudiant non défini.";
    exit;
}

$idEtudiant = $_GET['idEtudiant'];

// Récupération du nom de l'image avant de supprimer l'enregistrement
$query = $pdo->prepare("SELECT photo FROM etudiant WHERE idEtudiant = :idEtudiant");
$query->execute(['idEtudiant' => $idEtudiant]);
$etudiant = $query->fetch(PDO::FETCH_ASSOC);

if ($etudiant) {
    $photo = $etudiant['photo'];

    // Suppression de l'image du dossier de dépôt
    $photoPath = "../images/depot/" . $photo;
    if (file_exists($photoPath)) {
        unlink($photoPath);
    }

    // Suppression de l'enregistrement de l'étudiant de la base de données
    $deleteQuery = $pdo->prepare("DELETE FROM etudiant WHERE idEtudiant = :idEtudiant");
    if ($deleteQuery->execute(['idEtudiant' => $idEtudiant])) {
        header('Location: etudiant.php?success=true');
exit();

    } else {
        echo "Erreur lors de la suppression de l'étudiant.";
    }
} else {
    echo "Aucun étudiant trouvé avec cet ID.";
}
?>
