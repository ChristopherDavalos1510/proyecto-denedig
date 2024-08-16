<?php
// Incluir el archivo de conexión
include '../funciones/conex.php';

// Verificar si se recibieron los datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $escuela = $_POST['escuela'];

    // Preparar la consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuarios SET nombre = ?, paterno = ?, materno = ?, telefono = ?, correo = ?, contraseña = ?, escuela = ? WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssssi", $nombre, $paterno, $materno, $telefono, $correo, $contraseña, $escuela, $id_usuario);

    // Ejecutar la consulta preparada
    if ($stmt->execute()) {
        // Si la actualización fue exitosa, enviar una respuesta JSON con éxito
        $response = array(
            'status' => 'success',
            'message' => 'Datos actualizados correctamente.',
            'redirect' => 'gestor_maestro.php' // Aquí especificamos la página a la que queremos redireccionar
        );
        echo json_encode($response);
    } else {
        // Si hubo un error en la actualización, enviar una respuesta JSON con el error
        $response = array(
            'status' => 'error',
            'message' => 'Error al actualizar los datos: ' . $conexion->error
        );
        echo json_encode($response);
    }

    // Cerrar la conexión y la consulta preparada
    $stmt->close();
    $conexion->close();
} else {
    // Si no se recibieron datos por POST, enviar una respuesta JSON indicando el error
    $response = array(
        'status' => 'error',
        'message' => 'No se recibieron datos por POST.'
    );
    echo json_encode($response);
}
?>
