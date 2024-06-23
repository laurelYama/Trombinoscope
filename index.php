<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="images/logos.jpeg" href=https://esiitech-gabon.com/images/favicon.jpeg>
    <link rel="stylesheet" href="css/style.css">
    <title>Accueil Trombinoscope ESIITECH</title>
</head>
<body>

    <!-- début navbar responsive -->
    <nav class="navbar navbar-expand-lg bg-light">
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
                    <a class="nav-link" href="portail-Web/a_propos.php">À propos</a>
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

    <section id="gallery" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="images/IMG_9884.JPG" alt="Galerie 1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="images/WhatsApp Image 2024-06-22 à 16.41.22_c7f48cb3.jpg" alt="Galerie 2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="images/WhatsApp Image 2024-06-22 à 16.35.05_65acbf12.jpg" alt="Galerie 3">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="why-choose-us" class="section">
    <div class="container">
        <h2>Pourquoi Choisir ESIITECH</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <h3>Programmes de Qualité</h3>
                    <p>Nos programmes sont conçus pour offrir une éducation de qualité répondant aux normes internationales.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-item">
                    <i class="bi bi-trophy"></i>
                    <h3>Excellence Académique</h3>
                    <p>Nos étudiants bénéficient d'un environnement propice à l'excellence académique et professionnelle.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="feature-item">
                    <i class="bi bi-globe"></i>
                    <h3>Ouverture Internationale</h3>
                    <p>Nous favorisons l'ouverture internationale à travers des partenariats avec des institutions renommées.</p>
                </div>
            </div>
        </div>
    </div>
</section>


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
                    <i class="bi bi-geo-alt"></i>
                    <p>Libreville, Gabon</p>
                </div>
                <div>
                    <i class="bi bi-telephone"></i>
                    <p><a href="tel:+24176237638">(+241) 7623 7638</a></p>
                </div>
                <div>
                    <i class="bi-regular bi-envelope"></i>
                    <p><a href="mailto:contact@esiitech-gabon.com">contact@esiitech-gabon.com</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    Le Trombinoscope des promotions de ESIITECH est un outil visuel qui célèbre les anciens élèves et leurs permet de rester connectés à leur école,
                    tout en offrant aux visiteurs une vue d'ensemble des différentes générations d'étudiants qui ont fréquenté l'établissement.
                </p>
                </div>
                <span>Suivez-nous</span>
                    <div class="footer-icons">
                        <a href="https://www.facebook.com/" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/" target="_blank"><i class="bi bi-linkedin"></i></a>
                        <a href="https://twitter.com/" target="_blank"><i class="bi bi-twitter"></i></a>
            </div>
            </div>
        </div>
    </footer>
    <!-- fin footer -->

    <script src="bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
