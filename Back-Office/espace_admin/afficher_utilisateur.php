<?php require('../connection.php');


$data = $pdo->prepare('select email, username, role from users ORDER BY id desc;');

$data->execute();

?>