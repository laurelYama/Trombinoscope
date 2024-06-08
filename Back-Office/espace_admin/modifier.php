<?php
require('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];


        $query = "UPDATE users SET  email = ?, username = ?, password = ? WHERE id = ?";
        $params = [$email, $username, $password];
   

    $stmt = $pdo->prepare($query);
    if ($stmt->execute($params)) {
        header('Location: admin.php');
    } else {
        echo "Erreur lors de la mise à jour.";
    }
}
?>
