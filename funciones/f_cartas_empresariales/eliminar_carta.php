<?php
include '../conex.php';

$id_usuario = $_GET['id'];
$tipo = $_GET['tipo'];

if ($tipo === 'aceptacion' || $tipo === 'termino') {
    $columna = $tipo;
    $sql = "SELECT $columna FROM usuarios WHERE id_usuario = $id_usuario";
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $fila = mysqli_fetch_assoc($result);
        $ruta_archivo = $fila[$columna];

        // Eliminar el archivo del servidor
        if (!empty($ruta_archivo) && file_exists($ruta_archivo)) {
            unlink($ruta_archivo);
        }

        // Actualizar la base de datos para eliminar la referencia al archivo
        $sql_update = "UPDATE usuarios SET $columna = NULL, aut_termino = 0 WHERE id_usuario = $id_usuario";
        if (mysqli_query($conexion, $sql_update)) {
            echo "Carta de $tipo eliminada con éxito.";
        } else {
            echo "Error al eliminar la carta de $tipo: " . mysqli_error($conexion);
        }
    } else {
        echo "No se encontró la carta de $tipo para el usuario especificado.";
    }
} else {
    echo "Tipo de carta no válido.";
}

mysqli_close($conexion);
header("Location: ../../Acceso_admin/cartas_admin.php"); // Redirige de vuelta a la página de lista de usuarios
exit();
?>
