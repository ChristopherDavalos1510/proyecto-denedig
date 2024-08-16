<?php
// Incluye el archivo de conexión y funciones
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();
session_start();

if (!isset($_SESSION['id_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: ../login.php");
    exit();
}

// Establecer la conexión con la base de datos
$conn = mysqli_connect('localhost', 'u880452948_rootdenedig', 'A6-;wO23yN', 'u880452948_denedig');

// Verifica si la conexión fue exitosa
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener el id de la URL de manera segura
$id_buzon = isset($_GET['id']) ? intval($_GET['id']) : 0;

$mensaje = "";
$titulo = "";
$asunto = "";

if ($id_buzon > 0) {
    // Preparar la consulta SQL para obtener los datos de la tabla 'buzon'
    $sql = "SELECT mensaje, titulo, asunto FROM buzon WHERE id_buzon = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        // Vincular parámetros
        mysqli_stmt_bind_param($stmt, 'i', $id_buzon);

        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);

        // Obtener el resultado
        $result = mysqli_stmt_get_result($stmt);

        // Verificar si se obtuvieron resultados
        if (mysqli_num_rows($result) > 0) {
            // Obtener los datos
            $row = mysqli_fetch_assoc($result);
            $mensaje = $row['mensaje'];
            $titulo = $row['titulo'];
            $asunto = $row['asunto'];
        } else {
            $mensaje = "No se encontraron mensajes para el ID buzon: " . $id_buzon;
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        $mensaje = "Error en la preparación de la consulta: " . mysqli_error($conn);
    }
} else {
    $mensaje = "ID de buzon no válido.";
}

// Procesar el formulario si se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lider = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : '';

    if ($lider && $observaciones) {
        // Preparar la consulta SQL para actualizar los datos en la tabla 'buzon'
        $sql = "UPDATE buzon SET lider = ?, observaciones = ?, estatus = 2 WHERE id_buzon = ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {
            // Vincular parámetros
            mysqli_stmt_bind_param($stmt, 'ssi', $lider, $observaciones, $id_buzon);

            // Ejecutar la consulta
            if (mysqli_stmt_execute($stmt)) {
                echo "Datos actualizados correctamente.";
            } else {
                echo "Error en la ejecución de la consulta: " . mysqli_stmt_error($stmt);
            }

            // Cerrar la declaración
            mysqli_stmt_close($stmt);
        } else {
            echo "Error en la preparación de la consulta: " . mysqli_error($conn);
        }
    } else {
        echo "Por favor complete todos los campos.";
    }
}

// Obtener los nombres de los líderes
$sql = "SELECT nombre FROM usuarios WHERE nivel_usuario = 2";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conn));
}

mysqli_close($conn);
?>

<?php include '../Acceso_admin/header-admin.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ver buzones</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/logo simple.svg" />
    <style>
        .contentprimary {
            background-color: #142e61ff;
            color: #fff;
            height: 100%; /* Altura del contenedor para ocupar toda la ventana */
        }
        .contentprimary1 {
            background-color: #142e61ff;
            color: #fff;
            text-align: center;
            display: flex;
            justify-content: center; /* Centramos horizontalmente el contenido */
            align-items: center; /* Centramos verticalmente el contenido */
            height: 40vh; /* Altura del contenedor para ocupar toda la ventana */
        }
        .left, .right {
            width: 45%; /* Ancho de cada columna */
            margin: 0 2.5%; /* Márgenes para centrar */
        }
        .left {
            text-align: left;
        }
        .left1 {
            text-align: center !important;
        }
        .right {
            text-align: right;
        }
        .right1 {
            text-align: center !important;
        }
        .selecto {
            text-align: center;
            margin-top: 100px;
        }
        .seleccion  {
            border-radius: 15px;
            width: 160px;
            height: 40px;
        }
        label  {
            font-size: 40px !important;
        }
        .contendio  {
            background-color: white;
            width: 50%;
            margin-left: 210px;
        }
        .readonly  {
            color: black;
            width: 55%;
            height: 185px;
            border-radius: 10px;

        }
        .botones1  {
           background-color: #7ED957;
    color: #fff;
    text-decoration: none;
    font-weight: 400;
    font-size: 22px;
    padding: 12px;
    font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 10px;
}
        }
    </style>
</head>
<body>
<div class="contentprimary">
    <div class="selecto">
        <br><br><br>
        <label for="usuario">Escribe el mensaje y selecciona el lider</label>
        <br><br><br>
        <form method="post">
            <select class="seleccion" name="usuario" id="usuario" required>
                <option value="" disabled selected>Selecciona a un lider</option>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $nombreUsuario = htmlspecialchars($row['nombre']);
                    echo "<option value='$nombreUsuario'>$nombreUsuario</option>";
                }
                ?>
            </select>
            <div class="contentprimary1">
                <div class="left">
                    <div class="left1">
                        <label for="usuario">Mensaje</label>
                        <br>
                        <input type="text" class="readonly" value="<?php echo htmlspecialchars($mensaje); ?>" readonly>
                    </div>
                </div>
                <div class="right">
                    <div class="right1">
                        <label for="observaciones">Observación</label>
                        <br>
                        <input type="text" id="observaciones" name="observaciones" class="readonly" required><br><br>
                    </div>
                </div>
            </div>
            <div class="selecto">
                <br><br>
                <button class="botones1" type="submit">Enviar</button>
            </div>

        </form>
    
                <br><br>
    </div>

</div>

<!-- JAVASCRIPT FILES -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/counter.js"></script>
<script src="../js/custom.js"></script>
<script>
    function showTable(asunto) {
        // Ocultar todas las tablas
        var contents = document.getElementsByClassName('tab-content');
        for (var i = 0; i < contents.length; i++) {
            contents[i].style.display = 'none';
        }
        // Mostrar las tablas correspondientes a los niveles de estatus del asunto
        for (var i = 1; i <= 3; i++) {
            var table = document.getElementById('table-' + asunto + '-' + i);
            if (table) {
                table.style.display = 'block';
            }
        }
    }
</script>
</body>
                

<?php include 'footer1.php'; ?>
</html>
