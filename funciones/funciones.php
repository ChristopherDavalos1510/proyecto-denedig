<?php 

// Agrega esta función en funciones.php
function usuarioTieneDocumentos($correo, $conexion) {
    $query = "SELECT id_doc FROM documentos INNER JOIN usuarios ON documentos.id_colega = usuarios.id_usuario WHERE usuarios.correo = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();
    $tieneDocumentos = $stmt->num_rows > 0;
    $stmt->close();
    return $tieneDocumentos;
}

function determinarTipoUsuario($correo, $conexion) {
    $query = "SELECT tipo_usuario FROM usuarios WHERE correo = '$correo'";
    $resultado = $conexion->query($query);

    if ($resultado) {
        // Verificar si se obtuvo al menos una fila
        if ($resultado->num_rows > 0) {
            // Obtener el tipo de usuario de la primera fila
            $fila = $resultado->fetch_assoc();
            return $fila['tipo_usuario'];
        }
    }

    // Si no se encontró el usuario o hubo un error, puedes manejarlo como desees
    return "Usuario no encontrado";
}

//Funcion para header según el tipo de usuario
function headerDinamico($conexion) {
    if (isset($_SESSION['Correo'])) {
        $tipoUsuario = determinarTipoUsuario($_SESSION['Correo'], $conexion);

        switch ($tipoUsuario) {
            case 'colega':
                $rutaCompleta = $_SESSION['currentDir'] . '/header-usuario.php';    
                include $rutaCompleta;
                break;

            case 'lider':
                $rutaCompleta = $_SESSION['currentDir'] . '/header-lider.php';    
                include $rutaCompleta;
                break;
        }
    } else {
        $rutaCompleta = $_SESSION['currentDir'] . '/header1.php';    
        include $rutaCompleta;
    }
}

?>
