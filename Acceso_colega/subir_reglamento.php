<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit();
}
// A partir de aquí puedes usar $_SESSION['Correo'] u otras variables de sesión
// para acceder a la información del usuario que inició sesión

//fin

// Incluye el archivo de conexión y funciones

// Verifica si se ha enviado un formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtén el ID del usuario actual
    $user = $_SESSION['Correo'];
    $select_sql = "SELECT id_usuario, reglamento FROM usuarios WHERE correo = ?";
    $stmt_select = $conexion->prepare($select_sql);
    $stmt_select->bind_param("s", $user);
    $stmt_select->execute();
    $stmt_select->bind_result($id_usuario);
    
        if ($stmt_select->fetch()) {
        // Cierra la consulta para obtener los datos del usuario
        $stmt_select->close();

        // Asigna el valor de la carpeta del usuario
        // Define la ruta de la carpeta del usuario
$carpeta_usuario = '../documentos/' . $id_usuario;

// Verifica si la carpeta del usuario existe, si no, créala
if (!file_exists($carpeta_usuario)) {
    mkdir($carpeta_usuario, 0777, true); // Crea la carpeta recursivamente con permisos completos
}
                // Subir archivos a la carpeta del usuario
        $reglamentoNombre = $_FILES['reglamento']['name'];
        $reglamentoTemp = $_FILES['reglamento']['tmp_name'];
        $reglamentoDestino = $carpeta_usuario . '/' . $reglamentoNombre;
        move_uploaded_file($reglamentoTemp, $reglamentoDestino);
        
           // Guardar información en la base de datos
        $sql = "INSERT INTO usuarios (id_usuario, reglamento) VALUES (?, 1)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("is", $id_usuario, $reglamentoNombre);

         $stmt->execute();
    // Cerrar la conexión a la base de datos al final
        mysqli_close($conexion);
    } else {
        echo "No se pudo obtener la información del usuario.";
    }
}
?>
<p>ya se subio</p>    <!-- O incluso en el pie de página -->
        <p>Usuario ID: <?php echo $_SESSION['id_usuario']; ?></p>