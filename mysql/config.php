<?php
$servidor = 'localhost';
$basedatos = 'biblioteca';
$tabla = 'libros';
$usuario = 'Calificador';
$contrasena = 'Ciclo2022';

$mysqli = mysqli_connect($servidor, $usuario, $contrasena, $basedatos); 

if ($mysqli->connect_error) {
    die('Error de Conexión (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
 
?>
