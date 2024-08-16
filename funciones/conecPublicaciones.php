<?php
    $servidor = "localhost";
    $usuariodb = "root";
    $contrasenadb = "";
    $nombredb = "u880452948_denedig";
    date_default_timezone_set('America/Mexico_City');
    $conexion = mysqli_connect($servidor, $usuariodb, $contrasenadb, $nombredb) or die("Error al intentar conectar la base de datos");
    mysqli_set_charset($conexion, "utf8");
?>

