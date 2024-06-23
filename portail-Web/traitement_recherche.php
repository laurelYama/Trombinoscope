<?php
// Connexion à la base de données
include 'connection.php';

session_start();

// Validation des données
if (isset($_POST['id_promotion'], $_POST['id_parcours'])) {
    $id_promotion = $_POST['id_promotion'];
    $id_parcours = $_POST['id_parcours'];

    // Requête SQL avec des paramètres nommés
    $query = "SELECT idEtudiant, nom, prenom, numeroTelephone, email, photo, niveau, nom_specialite, annee FROM etudiant
            INNER JOIN parcours ON parcours.idParcours = etudiant.id_parcours
            INNER JOIN specialite ON specialite.idSpecialite = etudiant.id_specialite
            INNER JOIN promotion ON promotion.idPromotion = etudiant.id_promotion WHERE 1";

    $params = [];
    if (!empty($id_promotion)) {
        $query .= " AND id_promotion = :id_promotion";
        $params[':id_promotion'] = $id_promotion;
    }
    if (!empty($id_parcours)) {
        $query .= " AND id_parcours = :id_parcours";
        $params[':id_parcours'] = $id_parcours;
    }

    // Préparation et exécution de la requête avec les paramètres
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Stockage des résultats dans la session
    $_SESSION['resultats_recherche'] = $resultats;

    // Redirection vers la page du trombinoscope
    header('Location: trombinoscope.php');
    exit();
} else {
    // Redirection vers une page d'erreur ou par défaut si aucune donnée de recherche n'est fournie
    header('Location: erreur.php');
    exit();
}
?>
