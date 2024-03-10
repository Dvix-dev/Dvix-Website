<?php
$servidor = 'localhost';
$basedatos = 'servidor';
$tabla = 'calificaciones';
$usuario = 'calificador';
$contrasena = 'Ciclo2022';

$mysqli = mysqli_connect($servidor, $usuario, $contrasena, $basedatos); 

if ($mysqli->connect_error) {
    die('Error de Conexión (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
 
?>
