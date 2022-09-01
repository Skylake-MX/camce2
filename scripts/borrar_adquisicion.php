<?php

require_once 'connect.php';
require_once 'user_session.php';
require_once 'user.php';

 	/* error_reporting(E_ALL ^ E_NOTICE); */ 
    session_start();
    $currentUser = new User();
    $currentUser->setUser($_SESSION['user']);
    $localidad = $currentUser->getLocalidad();
    $privilegio = $currentUser->getPrivilegio();

$id = $_GET['id'];
var_dump($_GET);

if($privilegio!=="tecnico"){

    $sql='DELETE FROM adquisiciones WHERE id=:id';
    $query = $pdo -> prepare($sql);
    $query ->execute([
        'id' => $id
    ]);
}

header("Location:../views/listar_adquisiciones.php");

?>