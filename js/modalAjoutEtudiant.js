// Fonction pour afficher la modale
function afficherModale() {
    var modal = document.getElementById('modal');
    modal.style.display = 'block';

    // Bouton pour fermer la modale
    var span = document.getElementsByClassName('close')[0];
    span.onclick = function() {
        modal.style.display = 'none';
    }

    // Bouton "Oui" pour ajouter un autre étudiant
    var btnOui = document.getElementById('btn-oui');
    btnOui.onclick = function() {
        modal.style.display = 'none';
        // Rediriger vers la page du formulaire pour ajouter un autre étudiant
        window.location.href = 'formulaire_etudiant.php';
    }

    // Bouton "Non" pour fermer la modale sans ajouter un autre étudiant
    var btnNon = document.getElementById('btn-non');
    btnNon.onclick = function() {
        modal.style.display = 'none';
    }
}

// Appeler la fonction pour afficher la modale après avoir soumis le formulaire
document.getElementById('my-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêcher le comportement par défaut du formulaire
    afficherModale();
});