<?php
$servername = "localhost";
$username = "u880452948_rootdenedig";
$password = "A6-;wO23yN";
$dbname = "u880452948_denedig";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];

    $sql = "SELECT nombre, paterno, materno, tipo_usuario, nivel_usuario, departamento, N_departamento, N_grupo FROM usuarios WHERE id_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode(null);
    }

    $stmt->close();
}

$conn->close();
?>
