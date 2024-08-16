<?php
require 'conex.php';
require 'funciones.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['txt-email'];
    $clave = $_POST['txt-clave'];

    conectar();
    global $conexion;

    // Consulta para buscar al usuario en la tabla de usuarios
    $sqlUsuario = "SELECT id_usuario, correo, contraseña, nivel_usuario FROM usuarios WHERE correo = ?";
    $stmtUsuario = $conexion->prepare($sqlUsuario);
    $stmtUsuario->bind_param("s", $usuario);
    $stmtUsuario->execute();
    $resultUsuario = $stmtUsuario->get_result();

    if ($resultUsuario->num_rows === 1) {
        $row = $resultUsuario->fetch_assoc();
        $hashGuardado = $row['contraseña'];
        $nivelUsuario = $row['nivel_usuario'];

        if ($clave === $hashGuardado) {
            // Agrega el id_usuario a la variable de sesión
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['Correo'] = $usuario;

            // Verifica el tipo de usuario y redirige
            switch ($nivelUsuario) {
                case 0:
                    header('Location: ../Acceso_superadmin/index-superadmin.php');
                    exit();
                case 1:
                    header('Location: ../Acceso_admin/index-admin.php'); // Puedes cambiar esta redirección si es necesario
                    exit();
                case 2:
                    header('Location: ../Acceso_lider/index-lider.php');
                    exit();
                case 3:
                    header('Location: ../Acceso_colega/index-colega.php');
                    exit();
                case 4:
                    header('Location: ../Acceso_asesor/index-asesor.php');
                    exit();
                case 5:
                    header('Location: ../Acceso_aspirante/index-aspirante.php');
                    exit();    
                default:
                    $errorMensaje = "Nivel de usuario no válido.";
                    header('Location: ../login.php?error=' . urlencode($errorMensaje));
                    exit();
            }
        } else {
            // Contraseña incorrecta
            $errorMensaje = "La contraseña es incorrecta. Por favor, intenta nuevamente.";
            header('Location: ../login.php?error=' . urlencode($errorMensaje));
            exit();
        }
    } else {
        $errorMensaje = "Usuario no encontrado.";
        header('Location: ../login.php?error=' . urlencode($errorMensaje));
        exit();
    }
} else {
    // Si se intenta acceder directamente a este archivo sin enviar el formulario
    $errorMensaje = "Acceso no autorizado.";
    header('Location: ../login.php?error=' . urlencode($errorMensaje));
    exit();
}
?>
