<?php
// Incluye el archivo de conexión y funciones
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start();

if (!isset($_SESSION['id_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Obtén el ID del usuario actual
$id_usuario = $_SESSION['id_usuario'];
$carpeta_usuario = '../documentos/' . $id_usuario;
if (!file_exists($carpeta_usuario)) {
    mkdir($carpeta_usuario, 0777, true); // Crea la carpeta recursivamente
}

// Esta función obtiene el nombre completo del colega basado en su ID de usuario
function obtenerNombreCompletoColega($id_usuario, $conexion) {
    $nombre_completo = "";
    // Preparar la consulta SQL para obtener el nombre completo del colega
    $sql = "SELECT CONCAT(nombre, ' ', paterno, ' ', materno) FROM usuarios WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    // Vincular el parámetro
    $stmt->bind_param("i", $id_usuario);
    // Ejecutar la consulta
    $stmt->execute();
    // Vincular el resultado
    $stmt->bind_result($nombre_completo);
    // Obtener el resultado
    $stmt->fetch();
    // Cerrar la consulta
    $stmt->close();
    return $nombre_completo;
}

// Llama a la función para obtener el nombre completo del colega
$nombre_completo = obtenerNombreCompletoColega($id_usuario, $conexion);

// Obtiene la información del archivo
$nombre_archivo_original = $_FILES['CONFIDENCIAL']['name'];
$extension_archivo = pathinfo($nombre_archivo_original, PATHINFO_EXTENSION);
$nombre_archivo_nuevo = "CONFIDENCIAL_" . $id_usuario . '_' . str_replace(" ", " ", $nombre_completo) . '.' . $extension_archivo;
$archivo_temporal_pdf = $_FILES['CONFIDENCIAL']['tmp_name'];
$destino_pdf = $carpeta_usuario . '/' . $nombre_archivo_nuevo;

// Mueve el archivo PDF al destino especificado
if (move_uploaded_file($archivo_temporal_pdf, $destino_pdf)) {
    echo "El archivo PDF se ha subido correctamente.";
    // Actualiza el campo reglamento en la base de datos
    $sql = "UPDATE usuarios SET CONFIDENCIAL = 1, CONFIDENCIAL_LINK = ? WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $CONFIDENCIAL_LINK = '../documentos/' .$id_usuario . "/CONFIDENCIAL_" . $id_usuario . '_' . str_replace(" ", " ", $nombre_completo) . '.' . $extension_archivo;
    $stmt->bind_param("si", $CONFIDENCIAL_LINK , $id_usuario);
    $stmt->execute();
    $stmt->close();
    // Redirige a la página de confirmación después de subir el reglamento
    header("Location: confidencial_subido.php");
    exit();
} else {
    echo "";
}

// Consulta la base de datos para verificar si el reglamento ya ha sido subido por el usuario
$select_sql = "SELECT confidencial FROM usuarios WHERE id_usuario = ?";
$stmt_select = $conexion->prepare($select_sql);
$stmt_select->bind_param("i", $id_usuario);
$stmt_select->execute();
$stmt_select->bind_result($confidencial_subido);
$stmt_select->fetch();
$stmt_select->close();

if ($confidencial_subido == 1) {
    // Si ya ha subido el reglamento, redirige a la página de confirmación
    header("Location: confidencial_subido.php");
    exit();
}
?>






<?php include 'header-colega.php'; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Confidencionalidad</title>

        <!-- CSS FILES -->
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
        .hero-section {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en la sección hero-section */
        }

        .container {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
        }

        /* Agrega cualquier otro estilo que necesites */

    </style>
        

        <!-- Agrega el bloque de script aquí -->
        <script>
    

    // Agrega un listener al campo de búsqueda para llamar a la función searchProjects cuando se escriba
    document.getElementById('job-title').addEventListener('input', searchProjects);
</script>
        <!-- Fin del bloque de script -->

    </head>

<main>
    <section class="hero-section align-items-center d-flex justify-content-center " style="background-color: #142e61ff; color: #fff; margin-top: -1450px;">
        <div class="container text-center" style= "margin-left: 180px;"> <br>
            <h1 style="color: #fff; margin-left: -160px;" class="mb-3">Contrato de confidencialidad</h1>
             <div style="margin-top: -30px; "class="container py-5">
            <h style="color: #fff; margin-left: -200px;""2>Sube tu contrato de confidencialidad firmado</h2>
            <form action="confidencial.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                        <label style="color: #fff; margin-left: -200px;" for="CONFIDENCIAL" class="form-label">Selecciona el archivo de confidencialidad (PDF) (máx. 500KB):</label>
                        <input style="margin-left: 50px; width: 500px;" type="file" class="form-control" id="CONFIDENCIAL" name="CONFIDENCIAL" accept=".pdf" onchange="validarArchivo(this, 'errorSalud')" required>
                     <span id="errorSalud" style="color: red; margin-left: -200px;"></span>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #f65129; border-color: #f65129; width: 200px; height: 50px; font-size: 22px; margin-left: -200px;" >Subir Documentos</button>

        </div>
            </form>
        </div>
        </div>

        <div class="container py-5" style= "margin-top: 60px;">
            <iframe src="../documentos/Convenio de CONFIDENCIALIDAD Denedig.pdf" margin-left = "1000px !important"; width="60%" height="700px" style="border:none;"></iframe>
            <br>
        </div>
    </section>
    
<?php include 'footer1.php'; ?>
<!-- O incluso en el pie de página -->
</main>
<script>
    function validarArchivo(input, errorId) {
        // Verifica si se seleccionó un archivo
        if (input.files.length > 0) {
            // Obtiene el tamaño del archivo seleccionado en bytes
            var fileSize = input.files[0].size;

            // Convierte el tamaño a kilobytes (KB)
            var fileSizeKB = fileSize / 1024;

            // Define el tamaño máximo permitido en KB
            var maxSizeKB = 500;

            // Verifica si el tamaño del archivo excede el tamaño máximo permitido
            if (fileSizeKB > maxSizeKB) {
                // Muestra un mensaje de error
                document.getElementById(errorId).innerText = "El archivo excede el tamaño máximo permitido (500KB).";
                // Borra el archivo seleccionado
                input.value = "";
            } else {
                // Borra cualquier mensaje de error previo si el archivo es válido
                document.getElementById(errorId).innerText = "";
            }
        }
    }
</script>
<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>