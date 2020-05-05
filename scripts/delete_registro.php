<?php

require_once 'connect.php';
$id = $_GET['id'];
var_dump($_GET);

$sql='DELETE FROM base WHERE id=:id';
$query = $pdo -> prepare($sql);
$query ->execute([
    'id' => $id
]);

header("Location:../views/listar_cofres.php");

?>