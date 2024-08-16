
<!doctype html>
<html lang="en">
<head>
        <style>
.contenedorgral {
    background-color: #142e61ff;
    color: #fff;
    height: 417px !important;
    margin-top: 20px;
    display: block; /* Habilita Flexbox */
    justify-content: center; /* Centra horizontalmente */
    align-items: center; /* Centra verticalmente */
    text-align: center; /* Centra el texto dentro del contenedor */
}

                 .textlayout1 {
font-size: 40px; 
}

         .textlayout {
font-size: 22px; 
}



        .buttons {
    display: block;
    margin: 10px auto; /* Centra el botón horizontalmente */
    padding: 10px 20px;
    background-color: #f65129;
    color: #fff;
    border: none;
    cursor: pointer;
    text-decoration: none;
    font-weight: 400;
    font-size: 15px;
    font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 215px;
    border-radius: 10px;

}
            </style>

    </head>

    <div class ="contenedorgral">
    
    <?php
// Incluir el archivo de conexión
include '../../funciones/conex.php';

// Función para actualizar el nivel de usuario
function aprobarAscension($id_usuario) {
    global $conexion;
    // Consulta SQL para actualizar el nivel de usuario a 2
    $sql = "UPDATE usuarios SET nivel_usuario = 2 WHERE id_usuario = $id_usuario";

    if ($conexion->query($sql) === TRUE) {
        return true; // Éxito en la actualización
    } else {
        return false; // Error en la actualización
    }
}

// Verificar si se ha recibido el ID de usuario por GET
if(isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];

    // Mostrar el mensaje de confirmación y el botón de aceptar
    echo "<h2 class='textlayout1'>¿Estás seguro de ascender a este usuario?</h2>";
    echo "<p class='textlayout'> Al aceptar, el usuario será ascendido, lo que le permitirá realizar acciones como eliminar documentos, reglamentos y contratos. También podrá ver a todos los colegas, acceder a la información personal de estos, entre otras funcionalidades..</p>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='id_usuario' value='$id_usuario'><br><br>";
    echo "<button type='submit' name='aprobar' class='buttons'>Aceptar</button>";
    echo "</form>";

    // Verificar si se ha enviado el formulario de aprobación
    if (isset($_POST['aprobar'])) {
        // Ejecutar la función para aprobar la ascensión
        if (aprobarAscension($id_usuario)) {
            echo "<p>Ascensión aprobada correctamente.</p>";
        } else {
            echo "<p>Error al aprobar la ascensión: " . $conexion->error . "</p>";
        }
    }
} else {
    echo "ID de usuario no especificado.";
}

// Cerrar la conexión
$conexion->close();
?>

</div>
    <?php include 'footergestores.php'; ?>

</body>
</html>