<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha512-DkPsH9LzNzZaZjCszwKrooKwgjArJDiEjA5tTgr3YX4E6TYv93ICS8T41yFHJnnSmGpnf0Mvb5NhScYbwvhn2w==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha512-0xrMWUXzEAc+VY7k48pWd5YT6ig03p4KARKxs4Bqxb9atrcn2fV41fWs+YXTKb8lD2sbPAmZMjKENiyzM/Gagw==" crossorigin="anonymous"></script>
    <title>Trombinoscope ESIITECH</title>
</head>
<body>

    <!-- début navbar responsive -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="images/logo.jpeg" alt="logo ESIITECH" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="portail-Web/recherchePromotion.php">Trombinoscope</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">À propos</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- fin navbar responsive -->

    <div class="accueil">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contenu">
                        <h1>Découvrez</h1>
                        <p>les promotions des étudiants de l'ESIITECH</p>
                        <a href="portail-Web/recherchePromotion.php"><button type="button" class="btn btn-primary">Suivant</button></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="images/Online learning-amico.svg" class="img-fluid laptop" alt="">
                </div>
            </div>
        </div>
    </div>

     <!-- divs testimonial-item pour chaque témoignage -->
    <div class="section">
    <div class="container">
        <h2>Témoignages des étudiants</h2>
        <div class="testimonials">
            <div class="testimonial-item">
                <img src="images/promotion_2022/IMG-20240612-WA0038.jpg" alt="Photo de l'etudiant">
                <h3>NSIME MBA</h3>
                <p>2<sup>ème</sup> année | informatique</p>
                <blockquote>
                    "Texte du témoignage de l'étudiant. Lorem ipsum dolor sit amet, consectetur adipiscing elit."
                </blockquote>
            </div>
            
            <div class="testimonials">
            <div class="testimonial-item">
                <img src="images/promotion_2021/IMG-20240612-WA0009.jpg" alt="Photo de de l'etudiant">
                <h3>METCHEBA ILAMBI</h3>
                <p>3<sup>ème</sup> année | informatique</p>
                <blockquote>
                    "Texte du témoignage de l'étudiant. Lorem ipsum dolor sit amet, consectetur adipiscing elit."
                </blockquote>
            </div>
            
        </div>
    </div>
</div>






    <!-- début footer -->
    <footer class="footer-distributed">
        <div class="container">
            <div class="footer-left">
                <h3>ESIITECH <span>Trombinoscope</span></h3>
                <p class="footer-links">
                    <a href="#">Accueil</a>
                    <a href="portail-Web/recherchePromotion.php">Trombinoscope</a>
                    <a target="_blank" href="Back-Office/etudiant.php">Page Administration</a>
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
                    Le Trombinoscope des promotions de ESIITECH est un outil visuel qui célèbre les anciens élèves et leurs permet de rester connectés à leur école,
                    tout en offrant aux visiteurs une vue d'ensemble des différentes générations d'étudiants qui ont fréquenté l'établissement.
                </p>
            </div>
        </div>
    </footer>
    <!-- fin footer -->

    <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
