<?php
include "../funciones/conex.php";

header('Content-Type: application/json');

// Obtener los datos enviados
$data = json_decode(file_get_contents('php://input'), true);
$id_usuario = $data['id_usuario'];

// Validar que el id_usuario esté presente y sea válido
if (!isset($id_usuario) || empty($id_usuario)) {
    echo json_encode(['status' => 'error', 'message' => 'ID de usuario no válido']);
    exit();
}

// Verificar el último registro del usuario
$sql_last_entry = "SELECT tipo FROM registro_horario WHERE id_usuario = ? ORDER BY fecha_hora DESC LIMIT 1";
$stmt_last_entry = $conexion->prepare($sql_last_entry);
$stmt_last_entry->bind_param('i', $id_usuario);
$stmt_last_entry->execute();
$result_last_entry = $stmt_last_entry->get_result();

if ($row_last_entry = $result_last_entry->fetch_assoc()) {
    $last_entry_type = $row_last_entry['tipo'];
    $next_entry_type = $last_entry_type === 'entrada' ? 'salida' : 'entrada';
} else {
    // Si no hay registros previos, el siguiente debe ser 'entrada'
    $next_entry_type = 'entrada';
}

$stmt_last_entry->close();
$conexion->close();

echo json_encode(['status' => 'success', 'entryType' => $next_entry_type]);
?>
