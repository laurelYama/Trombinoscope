<?php require('../Back-office/connection.php');


$data = $pdo->prepare('select idEtudiant, nom, prenom, numeroTelephone, email, photo, niveau, nom_specialite, annee from etudiant
                        INNER JOIN parcours on parcours.idParcours = etudiant.id_parcours
                        INNER JOIN specialite on specialite.idSpecialite = etudiant.id_specialite
                        INNER JOIN promotion on promotion.idPromotion = etudiant.id_promotion
                        ORDER BY idEtudiant desc;');

$data->execute();

?>