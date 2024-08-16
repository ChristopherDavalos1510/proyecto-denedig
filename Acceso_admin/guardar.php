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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id_evaluaciones']);
    $equipo = intval($_POST['equipo']);
    $puntualidad = intval($_POST['puntualidad']);
    $responsabilidad = intval($_POST['responsabilidad']);
    $liderazgo = intval($_POST['liderazgo']);
    $comunicacion = intval($_POST['comunicacion']);
    $total = ($equipo + $puntualidad + $responsabilidad + $liderazgo + $comunicacion) *5/ 5;

    // Actualizar los datos en la base de datos
    $sql = "UPDATE evaluaciones SET equipo=?, puntualidad=?, responsabilidad=?, liderazgo=?, comunicacion=?, total=? WHERE id_evaluaciones=?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("iiiiiii", $equipo, $puntualidad, $responsabilidad, $liderazgo, $comunicacion, $total, $id);

    if ($stmt->execute() === false) {
        die("Error en la ejecución de la consulta: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    header("Location: ranking_administrador.php");
    exit();
}
?>
