<?php
session_start();

include '../portail-web/afficher.php';
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

    // Bouton de déconnexion
if (isset($_POST['logout'])) {
    session_destroy(); // Détruit la session
    header('Location: espace_admin.login.php');
    exit();
}
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/etudiant.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Document</title>
</head>
<body>  

    <!-- début navbar responsive -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../images/logo.jpeg" alt="logo ESIITECH" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="espace_admin/admin.php">Utilisateur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Etudiant</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rapports</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav2">
            <ul class="navbar-nav ms-auto">
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
        <form class="d-flex" method="get" action="rechercheEtudiants.php">
            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </div>

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
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Numéro</th>
                    <th scope="col">Email</th>
                    <th scope="col">Promotion</th>
                    <th scope="col">Parcours</th>
                    <th scope="col">Spécialité</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($datas = $data->fetch(PDO::FETCH_ASSOC)): ?>
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
