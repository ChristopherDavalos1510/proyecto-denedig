<?php
// Verificar si se reciben los datos esperados
if (isset($_POST['id_doc']) && isset($_POST['aprobacion'])) {
    // Conexión a la base de datos (debes completar esta parte con tus propios detalles de conexión)
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "denedig";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Escapar las variables de POST para evitar inyección de SQL
    $id_doc = mysqli_real_escape_string($conn, $_POST['id_doc']);
    $aprobacion = mysqli_real_escape_string($conn, $_POST['aprobacion']);

    // Consulta para actualizar el estado en la base de datos
    $sql = "UPDATE documentos SET aprobacion='$aprobacion' WHERE id_doc='$id_doc'";

    if ($conn->query($sql) === TRUE) {
        echo "El estado se ha actualizado correctamente.";
    } else {
        echo "Error al actualizar el estado: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    echo "No se recibieron los datos esperados.";
}
?>
