<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ajouterEtudiant.css">
    <title>Formulaire Étudiant</title>
</head>
<body>
    <h2>Ajouter un Étudiant</h2>
    <form action="insertion.php" method="POST" enctype="multipart/form-data" id="my-form">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="telephone">Numéro de téléphone :</label>
        <input type="tel" id="telephone" name="numeroTelephone" pattern="[0-9]{9}" required><br><br>

        <label for="email">Adresse émail :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="id_promotion">Promotion :</label>
        <select id="promotion" name="id_promotion" required>
            <option value="">Sélectionnez une promotion</option>
            <option value="1">2021</option>
            <option value="2">2022</option>
            <option value="3">2023</option>
        </select><br><br>

        <label for="id_parcours">Parcours :</label>
        <select id="parcours" name="id_parcours" required>
            <option value="">Sélectionnez un parcours</option>
            <option value="1">Licence Professionnelle informatique</option>
        </select><br><br>

        <label for="id_specialite">Spécialité :</label>
        <select id="specialite" name="id_specialite" required>
            <option value="">Sélectionnez une spécialité</option>
            <option value="1">CYBER DEFENSE</option>
            <option value="2">MONETIQUE BANCAIRE</option>
            <option value="3">DEVELOPPEMENT WEB & MOBILE</option>
            <option value="4">RESEAUX HAUT DEBIT ET SANS FIL</option>
            <option value="5">BIG DATA</option>
            <option value="6">CLOUD COMPUTING</option>
        </select><br><br>

        <label for="photo">Demi photo numérique de l'étudiant :</label>
        <input type="file" id="photo" name="photo" accept="image/*" required><br><br>

        <input type="submit" value="Ajouter">
    </form>

    <!-- Modale pour demander si l'utilisateur veut ajouter un autre étudiant -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Voulez-vous ajouter un autre étudiant ?</p>
            <button id="btn-oui">Oui</button>
            <button id="btn-non">Non</button>
        </div>
    </div>

    <script>
        function afficherModale() {
            var modal = document.getElementById('modal');
            modal.style.display = 'block';

            var span = document.getElementsByClassName('close')[0];
            span.onclick = function() {
                modal.style.display = 'none';
            }

            var btnOui = document.getElementById('btn-oui');
            btnOui.onclick = function() {
                modal.style.display = 'none';
                window.location.href = 'ajouterEtudiant.php';
            }

            var btnNon = document.getElementById('btn-non');
            btnNon.onclick = function() {
                window.location.href = 'etudiant.php';
            }
        }

        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                alert("Étudiant ajouté avec succès! ");
                afficherModale();
            } else if (urlParams.has('error')) {
                const error = urlParams.get('error');
                if (error === 'invalid_email') {
                    alert("Erreur: Adresse email invalide. ❌");
                } else if (error === 'invalid_photo') {
                    alert("Erreur: Photo invalide ou trop volumineuse. ❌");
                } else if (error === 'insert_failed') {
                    alert("Erreur: Échec de l'ajout de l'étudiant. ❌");
                }
            }
        }
    </script>
</body>
</html>
