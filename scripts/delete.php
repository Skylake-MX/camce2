<?php

require_once 'connect.php';
$id = $_GET['id'];

$sql='DELETE FROM usuarios WHERE id=:id';
$query = $pdo -> prepare($sql);
$query ->execute([
    'id' => $id
]);

header("Location:../views/edit_users.php");

?>