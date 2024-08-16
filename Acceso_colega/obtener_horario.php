<?php
// Incluir archivo de conexión a la base de datos u otro archivo necesario
include "../funciones/conex.php";

// Encabezado para indicar que se espera una respuesta JSON
header('Content-Type: application/json');

// Obtener los datos enviados desde la solicitud (en formato JSON)
$data = json_decode(file_get_contents('php://input'), true);

// Validar y obtener el ID de usuario enviado desde la solicitud
$id_usuario = $data['id_usuario'];

// Validar que el ID de usuario sea válido
if (!isset($id_usuario) || empty($id_usuario)) {
    echo json_encode(['status' => 'error', 'message' => 'ID de usuario no válido']);
    exit();
}

try {
    // Consultar el horario del usuario
    $sql_horario = "SELECT hora_inicio, hora_termino, nombre_dias FROM horario WHERE id_horario = (
                    SELECT id_horario FROM usuarios WHERE id_usuario = ?)";
    $stmt_horario = $conexion->prepare($sql_horario);
    $stmt_horario->bind_param('i', $id_usuario);
    $stmt_horario->execute();
    $result_horario = $stmt_horario->get_result();

    // Validar si se encontró el horario del usuario
    if ($row_horario = $result_horario->fetch_assoc()) {
        $horaInicio = $row_horario['hora_inicio'];
        $horaTermino = $row_horario['hora_termino'];
        $nombreDias = $row_horario['nombre_dias'];

        echo json_encode(['status' => 'success', 'horaInicio' => $horaInicio, 'horaTermino' => $horaTermino, 'nombreDias' => $nombreDias]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No se encontró el horario para el usuario']);
    }

    // Cerrar la consulta preparada para el horario
    $stmt_horario->close();

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error en el servidor: ' . $e->getMessage()]);
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
