<?php

$dbHost='localhost';
$dbUser='root';
$dbPassword='sepsa';
$dbBase='test';

/*$dbHost='localhost';
$dbUser='u882853344_root';
$dbPassword='Gheal910427.*';
$dbBase='u882853344_test';
*/

try{
  $pdo = new PDO("mysql:host=$dbHost;dbname=$dbBase", "$dbUser", "$dbPassword");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){

  echo $e->getMessage();

}
?>
