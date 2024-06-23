<?php
require('../connection.php');
session_start();

// Vérification que l'ID est passé en paramètre GET
if (!isset($_GET['id'])) {
    echo "Erreur : id non défini.";
    exit;
}

$id = $_GET['id'];

// Récupération des informations de l'utilisateur à modifier
$query = $pdo->prepare("SELECT * FROM users WHERE id = ?");
if ($query->execute([$id])) {
    $datas = $query->fetch(PDO::FETCH_ASSOC);

    // Vérification que les données de l'utilisateur ont été trouvées
    if (!$datas) {
        echo "Aucun utilisateur trouvé avec cet ID.";
        exit;
    }
} else {
    echo "Erreur lors de la récupération des données.";
    exit;
}

$error_message = '';

// Traitement de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validation des données côté serveur
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($username) && !empty($role)) {
        // Vérification si l'email est déjà utilisé par un autre utilisateur
        if (!isEmailUnique($pdo, $email, $id)) {
            $error_message = "L'email est déjà utilisé par un autre utilisateur.";
        } else {
            // Mise à jour de l'utilisateur
            if (updateUser($pdo, $id, $email, $username, $password, $role)) {
                $_SESSION['success_message'] = "Modification effectuée avec succès.";
                header('Location: admin.php?success=true');
                exit();
            } else {
                $error_message = "Erreur lors de la mise à jour.";
            }
        }
    } else {
        $error_message = "Données d'entrée non valides.";
    }
}

function isEmailUnique($pdo, $email, $id)
{
    $checkEmailQuery = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ? AND id != ?");
    $checkEmailQuery->execute([$email, $id]);
    return $checkEmailQuery->fetchColumn() == 0;
}

function updateUser($pdo, $id, $email, $username, $password, $role)
{
    $updateQuery = "UPDATE users SET email = ?, username = ?, role = ?";
    $params = [$email, $username, $role];

    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $updateQuery .= ", password = ?";
        $params[] = $hashedPassword;
    }

    $updateQuery .= " WHERE id = ?";
    $params[] = $id;

    $stmt = $pdo->prepare($updateQuery);
    return $stmt->execute($params);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/modifierUtilisateur.css">
    <link rel="icon" type="../../images/logos.jpeg" href=https://esiitech-gabon.com/images/favicon.jpeg>
    <title>Modifier Utilisateur</title>
    <style>
        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h2>Modifier un Utilisateur</h2>
        <?php if (!empty($error_message)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>
        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($datas['email']); ?>" required>
        <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" value="<?php echo htmlspecialchars($datas['username']); ?>" required>
        <input type="password" id="password" name="password" placeholder="Mot de passe">
        <br>
        <select id="role" name="role" required>
            <option value="">Sélectionner un rôle</option>
            <option value="admin" <?php echo ($datas['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            <option value="normal" <?php echo ($datas['role'] == 'normal') ? 'selected' : ''; ?>>Normal</option>
        </select>
        <br>
        <button type="submit" name="update_user">Modifier</button>
    </form>

    <!-- Modal pour afficher le message de succès -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <p><?php echo isset($_GET['success']) && $_GET['success'] == 'true' ? 'Modification effectuée avec succès.' : ''; ?></p>
        </div>
    </div>

    <script>
        // Fonction pour ouvrir la modal
        function openModal() {
            document.getElementById('successModal').style.display = 'block';
        }

        // Fonction pour fermer la modal
        function closeModal() {
            document.getElementById('successModal').style.display = 'none';
        }

        // Vérifier si le paramètre success est présent dans l'URL pour ouvrir automatiquement la modal
        window.onload = function() {
            var urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success') && urlParams.get('success') === 'true') {
                openModal();
            }
        }
    </script>
</body>
</html>
