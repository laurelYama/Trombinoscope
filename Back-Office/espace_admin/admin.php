<?php
session_start();
include 'afficher_utilisateur.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

// Vérifie si l'utilisateur est administrateur ou a un accès autorisé
if ($_SESSION['role'] !== 'admin') {
    $errorMessage = ($_SESSION['role'] === 'normal') ? 
        "Accès refusé. Vous n'avez pas les autorisations nécessaires." : 
        "Accès refusé. Votre rôle ne permet pas d'accéder à cette page.";
    
    header('Location: acces_refuse.php?error=' . urlencode($errorMessage));
    exit();
}

// Bouton de déconnexion
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}


function searchStudents($pdo, $searchTerm, $sortColumn) {
    $searchTerm = '%' . $searchTerm . '%'; // Ajouter les wildcards pour la recherche

    // Construire la requête SQL avec le terme de recherche correctement formaté et le tri spécifié
    $sql = "select * FROM users WHERE username LIKE :searchTerm ORDER BY $sortColumn ASC";

    // Préparer et exécuter la requête SQL
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();

    // Récupérer les résultats de la requête
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $students;
}

// Vérifier si le formulaire de recherche a été soumis
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])) {
    // Récupérer le terme de recherche depuis le formulaire
    $searchTerm = $_GET["search"];

    // Déterminer la colonne de tri par défaut et le sens de tri (ASC ou DESC)
    $sortColumn = isset($_GET["sort"]) ? $_GET["sort"] : "username"; // Par défaut, trier par username

    // Effectuer la recherche dans la base de données en utilisant la fonction searchStudents
    $results = searchStudents($pdo, $searchTerm, $sortColumn);

    
} else {
    // Si aucun terme de recherche n'est spécifié, récupérer tous les étudiants sans critères de recherche
    $sortColumn = isset($_GET["sort"]) ? $_GET["sort"] : "username"; // Par défaut, trier par username
    $results = searchStudents($pdo, "", $sortColumn); // Recherche sans terme spécifié
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="icon" type="../../images/logos.jpeg" href=https://esiitech-gabon.com/images/favicon.jpeg>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Administration</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../../images/logo.jpeg" alt="logo ESIITECH" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Utilisateur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../etudiant.php">Etudiant</a>
                </li>
                <li class="nav-item">
                    <form method="post">
                        <button type="submit" class="btn btn-danger" name="logout">
                            <i class="bi bi-power"></i> Déconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Barre de recherche -->
    <div class="container mt-3">
    <form class="d-flex" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="searchForm">
    <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Rechercher" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    <button class="btn btn-outline-success" type="submit">Rechercher</button>
    </form>
    </div>

    <!-- Message de succès -->
    <div class="container mt-3">
        <?php
        if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
            unset($_SESSION['success_message']);
        }
        ?>
    </div>
<?php
    // Vérifie si le paramètre 'success' est présent et égal à 'true'
if (isset($_GET['success']) && $_GET['success'] === 'true') {
    $successMessage = htmlspecialchars($_GET['message']);
    echo '<div class="alert alert-success">' . $successMessage . '</div>';
}
?>

    <!-- Contenu de la page -->
    <div class="container mt-4">
        <a href="creer_utilisateur.php" class="btn btn-primary mb-3">
            <i class="bi bi-plus"></i> Créer
        </a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col"><a href="?sort=username" class="text-decoration-none text-dark">sername</a></th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($results as $datas): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($datas['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($datas['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($datas['role'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="modifierUtilisateur.php?id=<?php echo htmlspecialchars($datas['id'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-info btn-sm">
                                        <i class="bi bi-pencil-square"></i> Modifier
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-bs-toggle="modal" data-bs-target="#confirmationModal" data-user-id="<?php echo htmlspecialchars($datas['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation de Suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cet utilisateur ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Script pour gérer la modal de suppression -->
    <script>
        var confirmationModal = document.getElementById('confirmationModal');
        confirmationModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var userId = button.getAttribute('data-user-id');

            var confirmButton = confirmationModal.querySelector('#confirmDeleteButton');
            confirmButton.onclick = function () {
                window.location.href = 'suprimerUtilisateur.php?id=' + encodeURIComponent(userId);
            };
        });


        document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('searchForm');
    const searchInput = searchForm.querySelector('input[name="search"]');

    // Écouteur pour détecter le changement dans l'input de recherche
    searchInput.addEventListener('input', function () {
        if (searchInput.value === '') {
            window.location.href = window.location.pathname; // Rediriger vers la page sans paramètre de recherche
        }
    });
});
    </script>
</body>
</html>
