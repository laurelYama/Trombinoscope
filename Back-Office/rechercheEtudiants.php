<?php
include 'connection.php';
// Récupérer les paramètres de recherche et de tri depuis l'URL
$q = isset($_GET['q']) ? $_GET['q'] : '';
$tri = isset($_GET['tri']) ? $_GET['tri'] : 'nom';
$ordre = isset($_GET['ordre']) && ($_GET['ordre'] === 'desc' || $_GET['ordre'] === 'asc') ? $_GET['ordre'] : 'asc';

// Effectuer la requête SQL avec le tri
$query = "SELECT * FROM etudiant WHERE nom LIKE '%$q%' ORDER BY $tri $ordre";

// Exécuter la requête SQL et récupérer les résultats
 $stmt = $pdo->query($query); // Utilisez PDO ou mysqli pour exécuter la requête SQL
 $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérez les résultats sous forme de tableau associatif

// Afficher les résultats triés dans le tableau
 foreach ($results as $row) {
//     // Affichez chaque ligne du tableau ici
 }

?>