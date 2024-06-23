<?php
// Vérifier si des données de recherche ont été soumises
if(isset($_GET['search'])) {
    include 'connection.php';

    // Préparer la requête SQL pour rechercher les étudiants
    $search = '%' . $_GET['search'] . '%';
    $sql = "SELECT * FROM etudiant WHERE nom LIKE :search OR prenom LIKE :search OR email LIKE :search";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    $stmt->execute();

    // Récupérer les résultats de la recherche
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Rediriger vers une autre page si le paramètre de recherche n'est pas présent
} elseif (empty($_GET['search'])) {
    // Afficher un message d'alerte si le champ de recherche est vide
    echo '<div class="alert alert-warning mt-3" role="alert">Le champ de recherche est vide.</div>';
} 
?>