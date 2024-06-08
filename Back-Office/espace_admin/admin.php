<?php
session_start();

include 'afficher_utilisateur.php';

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    // Redirigez vers la page de connexion
    header('Location: login.php');
    exit();
}

// Vérifiez si l'utilisateur est administrateur ou a un accès autorisé
if ($_SESSION['role'] !== 'admin') {
    // Redirigez vers une autre page ou affichez un message d'erreur
    header('Location: acces_refuse.php');
    exit();
}

// Bouton de déconnexion
if (isset($_POST['logout'])) {
    session_destroy(); // Détruit la session
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <style>
        .navbar-text {
            font-weight: bold;
            color: #333;
            margin-right: 10px;
        }
        .navbar-text span {
            color: #007bff;
        }
    </style>
    <title>Document</title>
</head>
<body>  

    <!-- début navbar responsive -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../../images/logo.jpeg" alt="logo ESIITECH" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Utilisateur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../etudiant.php">Etudiant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rapports</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav2">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                    <span class="navbar-text">
                        Connecté en tant que : <?php echo $_SESSION['username']; ?>
                    </span>
                </li>
                <li class="nav-item">
                    <form method="post">
                        <button type="submit" class="btn btn-danger" name="logout">Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <!-- fin navbar responsive -->

    <!-- Barre de recherche -->
    <div class="container mt-3">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </div>

    <!-- Contenu de la page -->
    <div class="container mt-4">
        <!-- Bouton Ajouter avec icône -->
        <a href="creer_utilisateur.php"><button class="btn btn-primary mb-3">
            <i class="bi bi-plus"></i> Créer
        </button></a>

        <!-- Tableau des étudiants -->
        <div class="container mt-3">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">username</th>
                            <th scope="col">email</th>
                            <th scope="col">role</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($datas = $data->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $datas['username']; ?></td>
                            <td><?php echo $datas['email']; ?></td>
                            <td><?php echo $datas['role']; ?></td>
                            <td>
                            <div class="btn-group" role="group">
                                <a href="modifierUtilisateur.php?id=<?php echo $datas['id']; ?>" class="btn btn-info btn-sm"><i class="bi bi-pencil-square"></i> Modifier</a>
                                <button class="btn btn-danger btn-sm btn-delete" data-delete-url="suprimerUtilisateur.php?id=<?php echo $datas['id']; ?>"><i class="bi bi-trash"></i> Supprimer</button>
                            </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
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

    <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
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
        });
    </script>
</body>
</html>
