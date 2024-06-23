<?php
require('connection.php');
//include 'log_functions.php';

$errorMessage = ""; // Initialisez la variable $errorMessage à une chaîne vide
$successMessage = ""; // Initialisez la variable $successMessage à une chaîne vide

// Vérification que l'ID est passé en paramètre GET
if (!isset($_GET['idEtudiant'])) {
    echo "Erreur : idEtudiant non défini.";
    exit;
}

$idEtudiant = $_GET['idEtudiant'];

// Préparation et exécution de la requête SQL pour récupérer les données de l'étudiant
$query = $pdo->prepare("SELECT * FROM etudiant WHERE idEtudiant = :idEtudiant");
$query->execute(['idEtudiant' => $idEtudiant]);
$datas = $query->fetch(PDO::FETCH_ASSOC);

// Vérification que les données de l'étudiant ont été trouvées
if (!$datas) {
    echo "Aucun étudiant trouvé avec cet ID.";
    exit;
}

// Traitement du formulaire s'il est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numeroTelephone = $_POST['numeroTelephone'];
    $email = $_POST['email'];
    $id_promotion = $_POST['id_promotion'];
    $id_parcours = $_POST['id_parcours'];
    $id_specialite = $_POST['id_specialite'];

    // Vérification de l'unicité de l'email et du numéro de téléphone
    $checkEmailQuery = $pdo->prepare("SELECT COUNT(*) FROM etudiant WHERE email = :email AND idEtudiant != :idEtudiant");
    $checkEmailQuery->execute(['email' => $email, 'idEtudiant' => $idEtudiant]);
    $emailCount = $checkEmailQuery->fetchColumn();

    $checkPhoneQuery = $pdo->prepare("SELECT COUNT(*) FROM etudiant WHERE numeroTelephone = :numeroTelephone AND idEtudiant != :idEtudiant");
    $checkPhoneQuery->execute(['numeroTelephone' => $numeroTelephone, 'idEtudiant' => $idEtudiant]);
    $phoneCount = $checkPhoneQuery->fetchColumn();

    if ($emailCount > 0) {
        $errorMessage = "Erreur : L'email est déjà utilisé par un autre étudiant.";
    } elseif ($phoneCount > 0) {
        $errorMessage = "Erreur : Le numéro de téléphone est déjà utilisé par un autre étudiant.";
    } else {
        // Gestion de la photo
        if ($_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $photo = $_FILES['photo']['name'];
            $upload = "../images/depot/" . $photo;
            move_uploaded_file($_FILES['photo']['tmp_name'], $upload);

            // Mise à jour avec nouvelle photo
            $query = "UPDATE etudiant SET photo = ?, nom = ?, prenom = ?, numeroTelephone = ?, email = ?, id_promotion = ?, id_parcours = ?, id_specialite = ? WHERE idEtudiant = ?";
            $params = [$photo, $nom, $prenom, $numeroTelephone, $email, $id_promotion, $id_parcours, $id_specialite, $idEtudiant];
        } else {
            // Mise à jour sans changer la photo
            $query = "UPDATE etudiant SET nom = ?, prenom = ?, numeroTelephone = ?, email = ?, id_promotion = ?, id_parcours = ?, id_specialite = ? WHERE idEtudiant = ?";
            $params = [$nom, $prenom, $numeroTelephone, $email, $id_promotion, $id_parcours, $id_specialite, $idEtudiant];
        }

        // Préparation et exécution de la requête d'update
        $stmt = $pdo->prepare($query);
        if ($stmt->execute($params)) {
            $successMessage = "Les informations de l'étudiant ont été mises à jour avec succès.";
            
            // Afficher la modal de succès en JavaScript
            echo '<script>
                document.addEventListener("DOMContentLoaded", function () {
                    var successModal = new bootstrap.Modal(document.getElementById("successModal"));
                    successModal.show();

                    // Redirection vers la page des étudiants après 2 secondes
            setTimeout(function() {
                window.location.href = "etudiant.php";
            }, 2000); // Redirige après 2 secondes
                });
            </script>';
        } else {
            $errorMessage = "Erreur lors de la mise à jour.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modifierInfoEtudiant.css">
    <link rel="icon" type="../images/logos.jpeg" href=https://esiitech-gabon.com/images/favicon.jpeg>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Modifier Étudiant</title>
    <script>
        function validateEmail() {
            const email = document.getElementById("email").value;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const emailError = document.getElementById("email-error");

            if (!emailPattern.test(email)) {
                emailError.textContent = "Veuillez entrer une adresse email valide.";
                return false;
            } else {
                emailError.textContent = "";
                return true;
            }
        }

        function validateForm() {
            return validateEmail();
        }
    </script>
</head>
<body>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Modification réussie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Les informations de l'étudiant ont été mises à jour avec succès.
            </div>
        </div>
    </div>
</div>

    <form method="POST" enctype="multipart/form-data" id="my-form" onsubmit="return validateForm();">
        <h2>Modifier les informations de l'étudiant</h2>
        <input type="hidden" name="idEtudiant" value="<?php echo htmlspecialchars($idEtudiant); ?>">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($datas['nom']); ?>" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($datas['prenom']); ?>" required><br><br>

        <label for="telephone">Numéro de téléphone :</label>
        <input type="tel" id="telephone" name="numeroTelephone" pattern="[0-9]{9}" title="Le numéro de téléphone doit comporter 9 chiffres" value="<?php echo htmlspecialchars($datas['numeroTelephone']); ?>" required><br><br>

        <label for="email">Adresse email :</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($datas['email']); ?>" required oninput="validateEmail();"><br>
        <span id="email-error" class="error"></span><br>

        <label for="id_promotion">Promotion :</label>
        <select id="promotion" name="id_promotion" required>
            <option value="">Sélectionnez une promotion</option>
            <option value="1" <?php echo ($datas['id_promotion'] == 1) ? 'selected' : ''; ?>>2021</option>
            <option value="2" <?php echo ($datas['id_promotion'] == 2) ? 'selected' : ''; ?>>2022</option>
            <option value="3" <?php echo ($datas['id_promotion'] == 3) ? 'selected' : ''; ?>>2023</option>
        </select><br><br>

        <label for="id_parcours">Parcours :</label>
        <select id="parcours" name="id_parcours" required>
            <option value="">Sélectionnez un parcours</option>
            <option value="1" <?php echo ($datas['id_parcours'] == 1) ? 'selected' : ''; ?>>Licence Professionnelle informatique</option>
        </select><br><br>

        <label for="id_specialite">Spécialité :</label>
        <select id="specialite" name="id_specialite" required>
            <option value="">Sélectionnez une spécialité</option>
            <option value="1" <?php echo ($datas['id_specialite'] == 1) ? 'selected' : ''; ?>>CYBER DEFENSE</option>
            <option value="2" <?php echo ($datas['id_specialite'] == 2) ? 'selected' : ''; ?>>MONETIQUE BANCAIRE</option>
            <option value="3" <?php echo ($datas['id_specialite'] == 3) ? 'selected' : ''; ?>>DEVELOPPEMENT WEB & MOBILE</option>
            <option value="4" <?php echo ($datas['id_specialite'] == 4) ? 'selected' : ''; ?>>RESEAUX HAUT DEBIT ET SANS FIL</option>
            <option value="5" <?php echo ($datas['id_specialite'] == 5) ? 'selected' : ''; ?>>BIG DATA</option>
            <option value="6" <?php echo ($datas['id_specialite'] == 6) ? 'selected' : ''; ?>>CLOUD COMPUTING</option>
        </select><br><br>

        <label for="photo">Demi photo numérique de l'étudiant :</label>
        <input type="file" id="photo" name="photo" accept="image/*"><br><br>

        <input type="submit" value="Modifier">
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
