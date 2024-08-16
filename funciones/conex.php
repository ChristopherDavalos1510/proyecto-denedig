<?php
$conexion = mysqli_connect('localhost','root','','u880452948_denedig');
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
mysqli_set_charset($conexion, 'utf8');

function conectar()
{
    global $conexion;
    mysqli_set_charset($conexion, 'utf8');
}
?>
