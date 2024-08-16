<?php
include '../conex.php';

$id_usuario = intval($_GET['id']);

// Verifica si se ha enviado un archivo
if(isset($_FILES['pdf_file'])) {
    // Ruta donde se almacenarán los archivos subidos
    $directorio_destino = "../../archivos_subidos/";

    // Obtiene el nombre y la ruta temporal del archivo subido
    $nombre_archivo = $_FILES['pdf_file']['name'];
    $ruta_archivo_temporal = $_FILES['pdf_file']['tmp_name'];

    // Mueve el archivo desde la ruta temporal al directorio de destino
    $ruta_archivo_destino = $directorio_destino . $nombre_archivo;
    move_uploaded_file($ruta_archivo_temporal, $ruta_archivo_destino);

    // Actualiza el registro en la base de datos con la ruta del archivo PDF
    $sql = "UPDATE usuarios SET aceptacion = '$ruta_archivo_destino' WHERE id_usuario = $id_usuario";
    if(mysqli_query($conexion, $sql)) {
        // Muestra un mensaje de éxito si la consulta se ejecuta correctamente
        echo "El archivo PDF se ha subido y el registro se ha actualizado correctamente.";
        header("Location: ../../Acceso_admin/cartas_admin.php");

    } else {
        // Muestra un mensaje de error si la consulta falla
        echo "Error al actualizar el registro en la base de datos: " . mysqli_error($conexion);
    }
}
?>
