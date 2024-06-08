var studentModal = document.getElementById('studentModal');
        studentModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var name = button.getAttribute('data-name');
            var prenom = button.getAttribute('data-prenom');
            var promotion = button.getAttribute('data-promotion');
            var parcours = button.getAttribute('data-parcours');
            var email = button.getAttribute('data-email');
            var telephone = button.getAttribute('data-telephone');
            var specialite = button.getAttribute('data-specialite');
            var photo = button.getAttribute('data-photo');

            var modalTitle = studentModal.querySelector('.modal-title');
            var modalName = studentModal.querySelector('#modalStudentName');
            var modalprenom = studentModal.querySelector('#modalStudentprenom');
            var modalTelephone = studentModal.querySelector('#modalStudentTelephone');
            var modalEmail = studentModal.querySelector('#modalStudentEmail');
            var modalPromotion = studentModal.querySelector('#modalStudentPromotion');
            var modalParcours = studentModal.querySelector('#modalStudentParcours');
            var modalSpecialite = studentModal.querySelector('#modalStudentSpacialite');
            var modalPhoto = studentModal.querySelector('#modalStudentPhoto');

            modalTitle.textContent = 'Informations de ' + name +' ' + prenom;
            modalName.textContent = name;
            modalprenom.textContent = prenom;
            modalPromotion.textContent = promotion;
            modalParcours.textContent = parcours;
            modalEmail.textContent = email;
            modalTelephone.textContent = telephone;
            modalSpecialite.textContent = specialite;
            modalPhoto.src = photo;
        });