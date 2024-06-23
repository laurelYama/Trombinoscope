<?php
session_start();

include 'connection.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    // Redirigez vers la page de connexion
    header('Location: espace_admin/login.php');
    exit();
}

// Vérifiez si l'utilisateur est administrateur ou a un accès autorisé
if ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'normal') {
    // Redirigez vers une autre page ou affichez un message d'erreur
    header('Location: login.php?error=Accès refusé');
    exit();
}

// Bouton de déconnexion
if (isset($_POST['logout'])) {
    session_destroy(); // Détruit la session
    header('Location: espace_admin/login.php');
    exit();
}

function searchStudents($pdo, $searchTerm, $sortColumn) {
    $searchTerm = '%' . $searchTerm . '%'; // Ajouter les wildcards pour la recherche

    // Construire la requête SQL avec le terme de recherche correctement formaté et le tri spécifié
    $sql = "select idEtudiant, nom, prenom, numeroTelephone, email, photo, niveau, nom_specialite, annee from etudiant
                        INNER JOIN parcours on parcours.idParcours = etudiant.id_parcours
                        INNER JOIN specialite on specialite.idSpecialite = etudiant.id_specialite
                        INNER JOIN promotion on promotion.idPromotion = etudiant.id_promotion WHERE nom LIKE :searchTerm OR prenom LIKE :searchTerm ORDER BY $sortColumn ASC";

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
    $sortColumn = isset($_GET["sort"]) ? $_GET["sort"] : "nom"; // Par défaut, trier par nom

    // Effectuer la recherche dans la base de données en utilisant la fonction searchStudents
    $results = searchStudents($pdo, $searchTerm, $sortColumn);

    
} else {
    // Si aucun terme de recherche n'est spécifié, récupérer tous les étudiants sans critères de recherche
    $sortColumn = isset($_GET["sort"]) ? $_GET["sort"] : "nom"; // Par défaut, trier par nom
    $results = searchStudents($pdo, "", $sortColumn); // Recherche sans terme spécifié
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="icon" type="../images/logos.jpeg" href=https://esiitech-gabon.com/images/favicon.jpeg>
    <link rel="stylesheet" href="../css/etudiant.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Administration</title>
</head>
<style>
.logo {
    width: 400px;
    height: auto;
}
.message {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .alert {
            width: 300px;
            padding: 15px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-close {
            cursor: pointer;
            background-color: transparent;
            border: none;
        }
    </style>
<body> 

<div class="message">
<?php
// Vérifier si la suppression a été effectuée avec succès
if (isset($_GET['success']) && $_GET['success'] === 'true') {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            var successModal = new bootstrap.Modal(document.getElementById("successModal"));
            successModal.show();
        });
    </script>';
}
?>

 </div>

    <!-- début navbar responsive -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="../images/logo.jpeg" alt="logo ESIITECH" class="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav ms-auto"> <!-- Ajout de la classe ms-auto -->
            <li class="nav-item">
                <a class="nav-link" href="espace_admin/admin.php">Utilisateur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Etudiant</a>
            </li>
            <li class="nav-item"> <!-- Ajout de la classe ms-auto pour aligner à droite -->
                <form method="post">
                    <button type="submit" class="btn btn-danger" name="logout">
                        <i class="bi bi-power"></i> Déconnexion
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>


    <!-- fin navbar responsive -->

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Succès</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Étudiant supprimé avec succès.
            </div>
        </div>
    </div>
</div>


    <!-- Barre de recherche -->
    <div class="container mt-3">
    <form class="d-flex" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="searchForm">
    <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Rechercher" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
    <button class="btn btn-outline-success" type="submit">Rechercher</button>
    </form>
</div>

<!--afficher le nombre d'etudiant retrouver-->
<?php if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["search"])): ?>
        <?php $numberOfStudents = count($results); ?>
        <div class="alert alert-info" role="alert">
            <strong><?php echo $numberOfStudents; ?></strong> étudiants trouvés
        </div>
    <?php endif; ?>

    <!-- Contenu de la page -->
    <div class="container mt-4">
        <!-- Bouton Ajouter avec icône -->
        <a href="ajouterEtudiant.php"><button class="btn btn-primary mb-3">
            <i class="bi bi-plus"></i> Ajouter
        </button></a>

        <!-- Tableau des étudiants -->
        <div class="container mt-3">
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col"><a href="?sort=nom" class="text-decoration-none text-dark">Nom</a></th>
                    <th scope="col"><a href="?sort=prenom" class="text-decoration-none text-dark">Prénom</a></th>
                    <th scope="col">Numéro</th>
                    <th scope="col">Email</th>
                    <th scope="col">Promotion</th>
                    <th scope="col">Parcours</th>
                    <th scope="col">Spécialité</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $datas): ?>
    <tr>
        <td><img src="../images/depot/<?php echo $datas['photo']; ?>" alt="Avatar" class="img-thumbnail" style="max-width: 50px;"></td>
        <td><?php echo $datas['nom']; ?></td>
        <td><?php echo $datas['prenom']; ?></td>
        <td><?php echo $datas['numeroTelephone']; ?></td>
        <td><?php echo $datas['email']; ?></td>
        <td><?php echo $datas['annee']; ?></td>
        <td><?php echo $datas['niveau']; ?></td>
        <td><?php echo $datas['nom_specialite']; ?></td>
        <td>
            <div class="btn-group" role="group">
                <a href="modifierInfoEtudiant.php?idEtudiant=<?php echo $datas['idEtudiant']; ?>" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Modifier</a>
                <button class="btn btn-danger btn-sm btn-delete" data-delete-url="suprimerEtudiant.php?idEtudiant=<?php echo $datas['idEtudiant']; ?>"><i class="bi bi-trash"></i> Supprimer</button>
            </div>
        </td>
    </tr>
<?php endforeach; ?>

            </tbody>
        </table>
        </div>
        </div>
    </div>

    <!-- Modal de confirmation -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmer la suppression</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Êtes-vous sûr de vouloir supprimer cet étudiant ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="button" class="btn btn-danger" id="confirmDeleteButton">Supprimer</button>
          </div>
        </div>
      </div>
    </div>

       
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');
        let deleteUrl = '';

        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function () {
                deleteUrl = this.dataset.deleteUrl;
                confirmDeleteModal.show();
            });
        });

        confirmDeleteButton.addEventListener('click', function () {
            window.location.href = deleteUrl;
        });

        // Vérifier si la page a été rechargée après une suppression
        const isPageReloadedAfterDelete = performance.getEntriesByType('navigation').find(nav => nav.type === 'reload');
        if (isPageReloadedAfterDelete) {
            history.replaceState(null, '', window.location.href.split('?')[0]); // Supprimer les paramètres de l'URL
        }
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



<script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

