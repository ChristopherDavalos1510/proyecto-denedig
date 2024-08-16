<?php
include '../conex.php';

$id_usuario = intval($_GET['id']);

$sql = "SELECT prestacion FROM usuarios
    where id_usuario=$id_usuario";
   
   $resultado = $conexion->query($sql);

   if ($resultado->num_rows > 0) {
    // Recorrer los resultados y almacenarlos en variables
    $fila = $resultado->fetch_assoc();

    $prestacion = $fila["prestacion"];

} else {
    echo "No se encontraron resultados";
}

$sql1 = "SELECT tipo_prestacion FROM prestaciones
where id=$prestacion";

$resultado1 = $conexion->query($sql1);

// Verificar si hay resultados
if ($resultado1->num_rows > 0) {
   // Recorrer los resultados y almacenarlos en variables
   $fila1 = $resultado1->fetch_assoc();
   $tipo = $fila1["tipo_prestacion"];

} else {
   echo "No se encontraron resultados";
}

if ($tipo == "SERVICIO SOCIAL") {
    header("Location: ../../cartas_empresariales/cartas_termino/termino_ss.php?id=".$id_usuario."");
    exit();
}else if ($tipo == "RESIDENCIA PROFESIONAL") {
    header("Location: ../../cartas_empresariales/cartas_termino/termino_residencia.php?id=".$id_usuario."");
    exit();
}else if ($tipo == "SISTEMA DUAL") {
    header("Location: ../../cartas_empresariales/cartas_termino/termino_dual.php?id=".$id_usuario."");
    exit();
}else if ($tipo == "ESTADIAS PROFESIONALES") {
    header("Location: ../../cartas_empresariales/cartas_termino/termino_estadias.php?id=".$id_usuario."");
    exit();
}else if ($tipo == "PRACTICAS PROFESIONALES") {
    header("Location: ../../cartas_empresariales/cartas_termino/termino_practicas.php?id=".$id_usuario."");
    exit();
}

?>
