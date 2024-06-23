<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="../images/logos.jpeg" href=https://esiitech-gabon.com/images/favicon.jpeg>
    <link rel="stylesheet" href="../css/ajouterEtudiant.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <title>Formulaire Étudiant</title>
</head>

<style>
    /*style pour les messages d'erreur*/
    .error {
        display: none;
        color: red;
        font-size: 12px;
    }

    .error.active {
        display: block;
    }

    .invalid {
        border-color: red;
    }

    .error-icon {
        margin-left: 5px;
        font-size: 16px;
    }
</style>
</head>
<body>
    <form action="insertion.php" method="POST" enctype="multipart/form-data" id="my-form">
        <h2>Ajouter un étudiant</h2>
        
        <input type="text" id="nom" name="nom" placeholder="Nom" required>
        <span id="nom-error" class="error"></span>
        
        <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
        <span id="prenom-error" class="error"></span>

        <input type="tel" id="telephone" placeholder="Numéro de téléphone" name="numeroTelephone" pattern="[0-9]{9}" title="Le numéro de téléphone doit comporter 9 chiffres" required>
        <span id="telephone-error" class="error"></span><span id="telephone-icon" class="error-icon"></span>

        <input type="email" id="email" name="email" placeholder="Email" required>
        <span id="email-error" class="error"></span><span id="email-icon" class="error-icon"></span>

        <select id="promotion" name="id_promotion" required>
            <option value="">Sélection de la Promotion</option>
            <option value="1">2021</option>
            <option value="2">2022</option>
            <option value="3">2023</option>
        </select>

        <select id="parcours" name="id_parcours" required>
            <option value="">Sélection du Parcours</option>
            <option value="1">Licence Professionnelle Informatique</option>
        </select>

        <select id="specialite" name="id_specialite" required>
            <option value="">Sélection de la Spécialité</option>
            <option value="1">CYBER DEFENSE</option>
            <option value="2">MONETIQUE BANCAIRE</option>
            <option value="3">DEVELOPPEMENT WEB & MOBILE</option>
            <option value="4">RESEAUX HAUT DEBIT ET SANS FIL</option>
            <option value="5">BIG DATA</option>
            <option value="6">CLOUD COMPUTING</option>
        </select>

        <input type="file" id="photo" name="photo" accept="image/*" required>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>


    <!-- Modale pour demander si l'utilisateur veut ajouter un autre étudiant -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Voulez-vous ajouter un autre étudiant ?</p>
            <button id="btn-oui">Oui</button>
            <button id="btn-non">Non</button>
        </div>
    </div>

    <script src="../js/ajouterEtudiant.js"></script>
</body>
</html>
