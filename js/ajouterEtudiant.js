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
    // Récupération des paramètres URL pour afficher les messages d'erreur
    const urlParams = new URLSearchParams(window.location.search);

    // Fonction pour afficher les messages d'erreur
    function afficherErreur(inputId, errorMessage) {
        const input = document.getElementById(inputId);
        const errorSpan = document.getElementById(inputId + "-error");
        errorSpan.textContent = errorMessage;
        errorSpan.classList.add("active");
        input.classList.add("invalid");

        // Ajout de l'icône d'erreur
        const errorIcon = document.getElementById(inputId + "-icon");
        errorIcon.innerHTML = '<i class="bi bi-exclamation-circle-fill"></i>';
    }

    // Vérification des paramètres URL et affichage des messages d'erreur
    if (urlParams.has('success')) {
        alert("Étudiant ajouté avec succès!");
        afficherModale();
    } else if (urlParams.has('error')) {
        const error = urlParams.get('error');
        if (error === 'email_existant') {
            afficherErreur('email', 'L\'adresse email existe déjà.');
        } else if (error === 'telephone_existant') {
            afficherErreur('telephone', 'Le numéro de téléphone existe déjà.');
        } else if (error === 'photo_invalide') {
            afficherErreur('photo', 'Photo invalide ou trop volumineuse.');
        } else if (error === 'email_invalide') {
            afficherErreur('email', 'Adresse email invalide.');
        }
    }

    // Suppression des messages d'erreur lorsque l'utilisateur commence à saisir dans le champ
    const inputs = document.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('input', () => {
            const errorSpan = document.getElementById(input.id + "-error");
            errorSpan.textContent = '';
            errorSpan.classList.remove("active");
            input.classList.remove("invalid");

            // Suppression de l'icône d'erreur lorsque l'utilisateur commence à saisir
            const errorIcon = document.getElementById(input.id + "-icon");
            errorIcon.innerHTML = '';
        });
    });
}