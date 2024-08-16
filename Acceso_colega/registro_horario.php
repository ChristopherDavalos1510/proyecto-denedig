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
    // Verificar el último registro del usuario
    $sql_last_entry = "SELECT tipo FROM registro_horario WHERE id_usuario = ? ORDER BY fecha_hora DESC LIMIT 1";
    $stmt_last_entry = $conexion->prepare($sql_last_entry);
    $stmt_last_entry->bind_param('i', $id_usuario);
    $stmt_last_entry->execute();
    $result_last_entry = $stmt_last_entry->get_result();

    // Obtener el tipo de la última entrada registrada, si existe
    if ($row_last_entry = $result_last_entry->fetch_assoc()) {
        $last_entry_type = $row_last_entry['tipo'];

        // Validar que no se esté registrando el mismo tipo de entrada/salida consecutivamente
        if (($last_entry_type === 'entrada' && $data['tipo'] === 'entrada') || ($last_entry_type === 'salida' && $data['tipo'] === 'salida')) {
            // Si hay un registro previo del mismo tipo, cambiar automáticamente al tipo opuesto
            $tipo = $last_entry_type === 'entrada' ? 'salida' : 'entrada';
        } else {
            // Utilizar el tipo enviado desde la solicitud
            $tipo = $data['tipo'];
        }
    } else {
        // Si no hay registros previos, permitir registrar cualquier tipo enviado desde la solicitud
        $tipo = $data['tipo'];
    }

    // Cerrar la consulta preparada para el último registro
    $stmt_last_entry->close();

    // Obtener el id_horario del usuario desde la tabla usuarios
    $sql_id_horario = "SELECT id_horario FROM usuarios WHERE id_usuario = ?";
    $stmt_id_horario = $conexion->prepare($sql_id_horario);
    $stmt_id_horario->bind_param('i', $id_usuario);
    $stmt_id_horario->execute();
    $result_id_horario = $stmt_id_horario->get_result();

    // Validar si se encontró el id_horario para el usuario
    if ($row_id_horario = $result_id_horario->fetch_assoc()) {
        $id_horario = $row_id_horario['id_horario'];

        // Obtener los días de la semana del id_horario desde la tabla horario
        $sql_dias_semana = "SELECT GROUP_CONCAT(dias_semana SEPARATOR ', ') AS dias_semanas FROM horario WHERE id_horario = ?";
        $stmt_dias_semana = $conexion->prepare($sql_dias_semana);
        $stmt_dias_semana->bind_param('i', $id_horario);
        $stmt_dias_semana->execute();
        $result_dias_semana = $stmt_dias_semana->get_result();

        // Validar si se encontraron los días de la semana para el id_horario
        if ($row_dias_semana = $result_dias_semana->fetch_assoc()) {
            $dias_semanas = $row_dias_semana['dias_semanas'];

            // Cerrar consulta preparada para obtener días de la semana
            $stmt_dias_semana->close();

            // Cerrar consulta preparada para obtener id_horario
            $stmt_id_horario->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No se encontraron días de la semana para el id_horario']);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No se encontró id_horario para el usuario']);
        exit();
    }

    // Obtener el ID máximo actual de la tabla registro_horario
    $sql_max_id = "SELECT MAX(id) AS max_id FROM registro_horario";
    $result_max_id = $conexion->query($sql_max_id);
    $row_max_id = $result_max_id->fetch_assoc();
    $max_id = $row_max_id['max_id'] ?? 0;
    $nuevo_id = $max_id + 1;  // Incrementar el ID

    // Preparar la consulta SQL para insertar en la tabla registro_horario
    if ($tipo === 'salida' && isset($data['motivo_salida'])) {
        $sql_insert = "INSERT INTO registro_horario (id, id_usuario, tipo, id_horario, dias_semanas, fecha_hora, motivo_salida) VALUES (?, ?, ?, ?, ?, NOW(), ?)";
        $stmt_insert = $conexion->prepare($sql_insert);
        $stmt_insert->bind_param('iisiss', $nuevo_id, $id_usuario, $tipo, $id_horario, $dias_semanas, $data['motivo_salida']);
    } else {
        $sql_insert = "INSERT INTO registro_horario (id, id_usuario, tipo, id_horario, dias_semanas, fecha_hora) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt_insert = $conexion->prepare($sql_insert);
        $stmt_insert->bind_param('iisis', $nuevo_id, $id_usuario, $tipo, $id_horario, $dias_semanas);
    }

    // Ejecutar la consulta preparada para insertar el nuevo registro
    if ($stmt_insert->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Registro exitoso']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al registrar entrada/salida']);
    }

    // Cerrar la consulta preparada para la inserción
    $stmt_insert->close();

} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error en el servidor: ' . $e->getMessage()]);
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
