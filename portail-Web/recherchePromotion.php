<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.3-dist/css/bootstrap.css">
    <link rel="icon" type="../images/logos.jpeg" href=https://esiitech-gabon.com/images/favicon.jpeg>
    <link rel="stylesheet" href="../css/recherchePromotion.css">
    <title>Recherche par Promotion</title>
</head>
<body>
    <div class="search-container">
        <img src="../images/Search engines-rafiki.svg" alt="">
        <h2 class="text-center">Rechercher des étudiants</h2>
        <form action="traitement_recherche.php" method="POST" class="search-form">
            <div class="mb-3">
                <label for="annee" class="form-label visually-hidden">Sélectionnez une année d'entrée :</label>
                <select id="annee" name="id_promotion" class="form-select">
                    <option value="">Choisir une année</option>
                    <option value="1">2021</option>
                    <option value="2">2022</option>
                    <option value="3">2023</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="parcours" class="form-label visually-hidden">Sélectionnez un parcours :</label>
                <select id="parcours" name="id_parcours" class="form-select">
                    <option value="">Choisir un parcours</option>
                    <option value="1">Licence professionnelle informatique</option>
                    
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>
    <script src="../bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
