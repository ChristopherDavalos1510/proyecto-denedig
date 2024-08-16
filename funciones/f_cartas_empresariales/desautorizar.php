<?php
include '../conex.php';

$id_usuario = $_GET['id'];

$sql_update = "UPDATE usuarios SET aut_termino = 0 WHERE id_usuario = $id_usuario";
if (mysqli_query($conexion, $sql_update)) {
    echo "Se confirma";
} else {
    echo "Error al eliminar la carta de: " . mysqli_error($conexion);
}

mysqli_close($conexion);
header("Location: ../../Acceso_admin/cartas_admin.php"); // Redirige de vuelta a la página de lista de usuarios
exit();

?>