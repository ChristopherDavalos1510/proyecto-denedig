<?php
// Incluye el archivo de conexión
include '../funciones/conex.php';
session_start();

if (!isset($_SESSION['id_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: ../login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_departamento = $_POST['id_departamento'];
    $N_subsector = $_POST['N_subsector'];
    $nombre_subsector = $_POST['nombre_subsector'];
    $Descripcion = $_POST['Descripcion'];
    $objetivos = $_POST['objetivos'];
    $id_usuario = $_POST['id_usuario'];

    // Obtener el nombre del usuario basado en el id_usuario
    $query_usuario = "SELECT nombre FROM usuarios WHERE id_usuario = '$id_usuario'";
    $result_usuario = mysqli_query($conexion, $query_usuario);
    $row_usuario = mysqli_fetch_assoc($result_usuario);
    $nombre = $row_usuario['nombre'];

    $sql = "INSERT INTO sub_sectores (id_departamento, N_subsector, nombre_subsector, Descripcion, objetivos, nombre, id_usuario)
            VALUES ('$id_departamento', '$N_subsector', '$nombre_subsector', '$Descripcion', '$objetivos', '$nombre', '$id_usuario')";

    if (mysqli_query($conexion, $sql)) {
        // Redirige a la página de creación de subsectores después de la inserción exitosa
        header("Location: creacion_de_subsectores.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>
