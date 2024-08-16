<?php
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
$nombre_archivo_pdf = $_FILES['CONFIDENCIAL']['name'];
$archivo_temporal_pdf = $_FILES['CONFIDENCIAL']['tmp_name'];
$destino_pdf = $carpeta_usuario . '/' . $nombre_archivo_pdf;

// Mueve el archivo PDF al destino especificado
if (move_uploaded_file($archivo_temporal_pdf, $destino_pdf)) {
    echo "El archivo PDF se ha subido correctamente.";
} else {
    echo "";
}
// Actualiza el campo reglamento en la base de datos
$sql = "UPDATE usuarios SET CONFIDENCIAL = 1 WHERE id_usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$stmt->close();

?>



<?php include 'header-colega.php'; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>confidencionalidad</title>

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
        .contenedorprimary {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en la sección hero-section */
            height: 1027px;
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

<div class="contenedorprimary">
    <div style = "width: 100% !important;" class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-12 mb-5 mb-lg-0 text-center">
            <iframe src="../documentos/3/CONFIDENCIAL_3_kevin Isai ortiz sanchez.pdf" style="width: 50%; height: 700px; border: none; margin-top: 200px;"></iframe>
            <br>
        </div>
        <div class="col-lg-6 col-12 mb-5 mb-lg-0 text-center">
            <div class="hero-section-text mt-5">
                <h5 style="margin-top: 20px; color: #fff; font-size: 50px;">
                    Gracias por subir tu contrato de confidencionalidad
                </h5>
                <h4 style="margin-top: 20px; color: #fff;">
                    Si hay una duda, verifícalo con tu líder
                </h4>
            </div>
        </div>
    </div>
</div>

<?php include 'footer1.php'; ?>
</main>

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>