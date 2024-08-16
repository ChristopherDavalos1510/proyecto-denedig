<?php
require 'conex.php';
require 'funciones.php';

conectar();

// Recuperar datos del formulario
$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$A_paterno = $_POST['paterno'];
$A_materno = $_POST['materno'];
$Nom_usuario = $_POST['nom_usuario'];
$Correo = $_POST['correo'];
$Tel = $_POST['telefono'];
$Contraseña = $_POST['txt-clave']; // Contraseña en texto plano
$Escuela = $_POST['escuela'];
$Departamento = $_POST['departamento'];
$tipo = $_POST['tipo_usuario'];
$nivel = $_POST['nivel_usuario'];

// Verificar si el usuario o el correo ya existen
$consulta = "SELECT * FROM usuarios WHERE nom_usuario = ? OR correo = ?";
$stmt_verificacion = $conexion->prepare($consulta);
$stmt_verificacion->bind_param("ss", $Nom_usuario, $Correo);
$stmt_verificacion->execute();
$resultado_verificacion = $stmt_verificacion->get_result();

if ($resultado_verificacion->num_rows > 0) {
    $errorRegistro = "El nombre de usuario o el correo ya están registrados. Intenta con otro.";
    header('Location: ../registro1.php?error=' . urlencode($errorRegistro));
    exit();
}

// Insertar datos en la base de datos
$sql = "INSERT INTO usuarios (id_usuario, nombre, paterno, materno, nom_usuario, contraseña, correo, telefono, escuela, departamento, tipo_usuario, nivel_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Preparar la sentencia
$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

// Vincular parámetros y ejecutar la consulta
$stmt->bind_param("issssssssssi", $id_usuario, $nombre, $A_paterno, $A_materno, $Nom_usuario, $Contraseña, $Correo, $Tel, $Escuela, $Departamento, $tipo, $nivel);

if ($stmt->execute()) {
    header('Location: ../Acceso_lider/registro1.php');
    exit(); 
} else {
    $errorRegistro = "Error en el registro, intenta de nuevo.";
    header('Location: ../Acceso_lider/registro1.php?error=' . urlencode($errorRegistro));
    exit(); 
}

// Cerrar la conexión
$stmt->close();
$stmt_verificacion->close();
$conexion->close();

?>
