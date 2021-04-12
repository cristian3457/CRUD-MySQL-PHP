<?php

//simple conexion a la base da datos

$servidor = 'localhost:3306';
$username = 'restful_user';
$password = '123456';
$database = 'crud_usuarios';

try {
  $conexion = new PDO("mysql:host=$servidor;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>

