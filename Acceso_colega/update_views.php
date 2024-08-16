<?php
include "../funciones/conex.php";

// Obtener el ID del usuario actual desde la sesión
session_start();
$id_usuario_actual = $_SESSION['id_usuario']; // Reemplaza 'ID_DEL_USUARIO' con la clave correcta de tu sesión

// Obtener los datos desde la solicitud AJAX
$data = json_decode(file_get_contents('php://input'), true);
$notificationId = $data['notificationId'];

// Consulta SQL para obtener las vistas actuales
$sql_get_views = "SELECT vistas_usuario 
                  FROM notificaciones 
                  WHERE id = $notificationId";

$result = mysqli_query($conexion, $sql_get_views);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $vistas_usuario = $row['vistas_usuario'];

    // Contar las vistas actuales del usuario actual
    $vistas_usuario_array = explode(',', $vistas_usuario);
    $vistas_usuario_actual = 0;

    foreach ($vistas_usuario_array as $vista) {
        $vista_usuario = explode(':', $vista);
        if ($vista_usuario[0] == $id_usuario_actual) {
            $vistas_usuario_actual = intval($vista_usuario[1]);
            break;
        }
    }

    // Incrementar el contador de vistas del usuario actual
    $vistas_usuario_actual++;

    // Actualizar las vistas en el formato deseado
    $nuevo_formato_vistas = '';
    $vistas_actualizadas = false;

    foreach ($vistas_usuario_array as &$vista) {
        $vista_usuario = explode(':', $vista);
        if ($vista_usuario[0] == $id_usuario_actual) {
            $vista_usuario[1] = $vistas_usuario_actual;
            $vista = implode(':', $vista_usuario);
            $vistas_actualizadas = true;
        }
        $nuevo_formato_vistas .= ($nuevo_formato_vistas ? ',' : '') . $vista;
    }

    if (!$vistas_actualizadas) {
        $nuevo_formato_vistas .= ($nuevo_formato_vistas ? ',' : '') . "$id_usuario_actual:1";
    }

    // Consulta SQL para actualizar las vistas
    $sql_update_views = "UPDATE notificaciones 
                         SET vistas_usuario = '$nuevo_formato_vistas'
                         WHERE id = $notificationId";

    if (mysqli_query($conexion, $sql_update_views)) {
        echo json_encode(['status' => 'success', 'views' => $vistas_usuario_actual]);
    } else {
        echo json_encode(['status' => 'error']);
    }
} else {
    echo json_encode(['status' => 'error']);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
