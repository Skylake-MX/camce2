<?php

require_once 'connect.php';
$id = $_GET['id'];

$sql='DELETE FROM base WHERE id=:id';
$query = $pdo -> prepare($sql);
$query ->execute([
    'id' => $id
]);

header("Location:../views/list_registro.php");

?>