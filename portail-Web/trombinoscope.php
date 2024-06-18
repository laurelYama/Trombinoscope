<?php
session_start();
include 'afficher.php';

// Vérifier si une recherche a été effectuée et que des résultats sont disponibles dans la session
if (isset($_SESSION['resultats_recherche'])) {
    $etudiants = $_SESSION['resultats_recherche'];
    
} else {
    // Rediriger vers la page de recherche si aucune recherche n'est en cours
    header('Location: recherchePromotion.php');
    exit(); // Assurez-vous de terminer le script après la redirection
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/trombinoscope.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha512-DkPsH9LzNzZaZjCszwKrooKwgjArJDiEjA5tTgr3YX4E6TYv93ICS8T41yFHJnnSmGpnf0Mvb5NhScYbwvhn2w==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha512-0xrMWUXzEAc+VY7k48pWd5YT6ig03p4KARKxs4Bqxb9atrcn2fV41fWs+YXTKb8lD2sbPAmZMjKENiyzM/Gagw==" crossorigin="anonymous"></script>
    <title>Trombinoscope</title>
</head>
<body>  

    <!-- Navbar responsive -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="../images/logo.jpeg" alt="logo ESIITECH" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trombinoscope</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">À propos</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Fin Navbar responsive -->

    <div class="bg-white py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">Promotion ESIITECH</h2>
                    <p class="mt-4 text-lg leading-8 text-gray-600">
                        Nous formons les experts de demain !
                    </p>
                </div>
            </div>

            <div class="row">
            <?php foreach ($etudiants as $datas): ?>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="team-member text-center">
                        <img class="rounded-circle mb-4" src="../images/depot/<?php echo htmlspecialchars($datas['photo']); ?>"alt="Photo de l'étudiant" 
                             data-bs-toggle="modal" data-bs-target="#studentModal"
                             data-name="<?php echo htmlspecialchars($datas['nom']); ?>" data-prenom="<?php echo htmlspecialchars($datas['prenom']); ?>" data-promotion="<?php echo htmlspecialchars($datas['annee']); ?>" data-parcours="<?php echo htmlspecialchars($datas['niveau']); ?>" 
                             data-email="<?php echo htmlspecialchars($datas['email']); ?>" data-telephone="<?php echo htmlspecialchars($datas['numeroTelephone']); ?>" data-specialite="<?php echo htmlspecialchars($datas['nom_specialite']); ?>" data-photo="../images/depot/<?php echo htmlspecialchars($datas['photo']); ?>">
                        <h3 class="text-base"><?php echo htmlspecialchars($datas['nom']); ?> <?php echo htmlspecialchars($datas['prenom']); ?></h3>
                        <p class="text-sm">Promotion <?php echo htmlspecialchars($datas['annee']); ?></p>
                        <p class="text-sm"><?php echo htmlspecialchars($datas['niveau']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Informations de l'étudiant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <img id="modalStudentPhoto" class="rounded-circle" src="" alt="Photo de l'étudiant" style="max-width: 150px;">
                    </div>
                    <ul class="list-unstyled">
                        <li><strong>Nom :</strong> <span id="modalStudentName"></span></li>
                        <li><strong>Prénom :</strong> <span id="modalStudentprenom"></span></li>
                        <li><strong>Téléphone :</strong> <span id="modalStudentTelephone"></span></li>
                        <li><strong>Email :</strong> <span id="modalStudentEmail"></span></li>
                        <li><strong>Promotion :</strong> <span id="modalStudentPromotion"></span></li>
                        <li><strong>Parcours :</strong> <span id="modalStudentParcours"></span></li>
                        <li><strong>Spécialité :</strong> <span id="modalStudentSpacialite"></span></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Début footer -->
    <footer class="footer-distributed">
        <div class="container">
            <div class="footer-left">
                <h3>ESIITECH <span>Trombinoscope</span></h3>
                <p class="footer-links">
                    <a href="../index.php">Accueil</a>
                    <a href="#">Trombinoscope</a>
                    <a target="_blank" href="../Back-office/etudiant.php">Page Administration</a>
                </p>
                <p class="footer-company-name">© 2024 <strong>ESIITECH</strong>. Design & Developed By ESIITECH</p>
            </div>
            <div class="footer-center">
                <div>
                    <i class="fa-solid fa-location-dot"></i>
                    <p>Libreville, Gabon</p>
                </div>
                <div>
                    <i class="fa fa-phone"></i>
                    <p><a href="tel:+24176237638">(+241) 7623 7638</a></p>
                </div>
                <div>
                    <i class="fa-regular fa-envelope"></i>
                    <p><a href="mailto:contact@esiitech-gabon.com">contact@esiitech-gabon.com</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    Le Trombinoscope des promotions de ESIITECH est un outil visuel qui célèbre les anciens élèves et leur permet de rester connectés à leur école,
                    tout en offrant aux visiteurs une vue d'ensemble des différentes générations d'étudiants qui ont fréquenté l'établissement.
                </p>
            </div>
        </div>
    </footer>
    <!-- Début footer -->

    <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>   
    <script src="../js/trombinoscope.js"></script>
</body>
</html>
