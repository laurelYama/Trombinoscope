<?php require('../connection.php');


$data = $pdo->prepare('select id, email, username, role from users ORDER BY id desc;');

$data->execute();

?>