<?php
require('connection.php');

// Vérification que l'ID est passé en paramètre GET
if (!isset($_GET['idEtudiant'])) {
    echo "Erreur : idEtudiant non défini.";
    exit;
}

$idEtudiant = $_GET['idEtudiant'];

// Préparation et exécution de la requête SQL
$query = $pdo->prepare("SELECT * FROM etudiant WHERE idEtudiant = :idEtudiant");
$query->execute(['idEtudiant' => $idEtudiant]);
$datas = $query->fetch(PDO::FETCH_ASSOC);

// Vérification que les données de l'étudiant ont été trouvées
if (!$datas) {
    echo "Aucun étudiant trouvé avec cet ID.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ajouterEtudiant.css">
    <title>Modifier Étudiant</title>
</head>
<body>
    <h2>Modifier les informations de l'étudiant</h2>
    <form action="modifier.php" method="POST" enctype="multipart/form-data" id="my-form">
        <input type="hidden" name="idEtudiant" value="<?php echo htmlspecialchars($idEtudiant); ?>">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($datas['nom']); ?>" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($datas['prenom']); ?>" required><br><br>

        <label for="telephone">Numéro de téléphone :</label>
        <input type="tel" id="telephone" name="numeroTelephone" pattern="[0-9]{9}" value="<?php echo htmlspecialchars($datas['numeroTelephone']); ?>" required><br><br>

        <label for="email">Adresse émail :</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($datas['email']); ?>" required><br><br>

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
</body>
</html>
