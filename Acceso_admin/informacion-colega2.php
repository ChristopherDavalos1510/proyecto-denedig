<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start(); 

include '../header-superadmin.php';

$acta = $domicilio = $boleta = $salud = $credencial = ""; // Inicializar variables

if (isset($_GET['id_colega'])) {
    $id_colega = $_GET['id_colega'];

    // Consulta SQL para obtener los nombres de los archivos asociados al id_colega
    $query = "SELECT INE, curp, acta, domicilio, boleta, salud, credencial FROM documentos WHERE id_colega = ?";
    
    // Preparar la consulta
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id_colega);

    // Ejecutar la consulta
    $stmt->execute();

    // Vincular las variables de resultado
    $stmt->bind_result($INE, $curp, $acta, $domicilio, $boleta, $salud, $credencial);

    // Obtener los resultados
    $stmt->fetch();

    // Cerrar la consulta
    $stmt->close();
}

// Cierra la conexión a la base de datos al final
mysqli_close($conexion);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Detalles del colega.</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
    
    <style>
        .project-details {
            display: flex;
            align-items: center;
        }

        .project-description {
            flex: 1;
            padding: 20px;
        }

        .project-image {
            flex: 1;
            padding: 20px;
        }
    </style>
    <style>
        .document-img-box {
    border: 1px solid #ccc; /* Establece el borde del cuadro */
    padding: 5px; /* Agrega un poco de espacio alrededor de la imagen */
    border-radius: 5px; /* Añade bordes redondeados al cuadro */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Añade una sombra suave al cuadro */
    background-color: #f9f9f9; /* Establece un color de fondo para el cuadro */
}

.document-img {
    max-width: 100%; /* Ajusta la imagen al ancho del contenedor */
    height: auto; /* Permite que la altura de la imagen se ajuste automáticamente */
    display: block; /* Asegura que la imagen se muestre como un bloque */
}
    </style>
</head>

<style>
        .site-header {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en el encabezado */
        }

        /* Agrega cualquier otro estilo que necesites */

</style>

<body class="Creador-y-desarrollador-page" id="top">
<main>
    <header class="site-header py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="text-white">Documentos del colega.</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="job-section section-padding">
    <div class="container">
        <div class="row">
            <?php if (!empty($INE)): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 400px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 350px;">
                            <div class="document">
                            <div class="document-img-box" style="width: 350px; height: 350px;">
                                    <img class="document-img" src="../uploads/imagenes/INE.jpg" alt="INE" style="width: 350px; height: 350px;">
                                </div>
                                <p>INE: <a href="../uploads/<?php echo $id_colega . '/' . $INE; ?>" target="_blank">Ver credencial del INE</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
                            <?php if (!empty($curp)): ?>
                                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 400px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 350px;">
                        <div class="document-img-box" style="width: 350px; height: 350px;">
                        <a href="../uploads/<?php echo $id_colega . '/' . $curp; ?>" target="_blank">
                <img class="document-img" src="../uploads/imagenes/CURP.jpg" alt="curp" style="width: 350px; height: 350px;">
                <p>Curp: <a href="../uploads/<?php echo $id_colega . '/' . $curp; ?>" target="_blank">Ver curp</a></p>
            </a>
                            </div>
                            </div>
                    </div>
                </div>
                                <?php endif; ?>
                            <?php if (!empty($acta)): ?>
                                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 400px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 350px;">
                        <div class="document-img-box" style="width: 350px; height: 350px;">
                        <a href="../uploads/<?php echo $id_colega . '/' . $acta; ?>" target="_blank">
                <img class="document-img" src="../uploads/imagenes/ACTA.jpg" alt="salud" style="width: 350px; height: 350px;">
                <p>Acta: <a href="../uploads/<?php echo $id_colega . '/' . $acta; ?>" target="_blank">Ver acta de nacimiento</a></p>
            </a>
                                </div>
                                </div>
                    </div>
                </div>
                            <?php endif; ?>
                            <?php if (!empty($domicilio)): ?>
                                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 400px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 350px;">
                        <div class="document-img-box" style="width: 350px; height: 350px;">
                        <a href="../uploads/<?php echo $id_colega . '/' . $domicilio; ?>" target="_blank">
                <img class="document-img" src="../uploads/imagenes/DOMICILIO.jpg" alt="salud" style="width: 350px; height: 350px;">
                <p>Domicilio: <a href="../uploads/<?php echo $id_colega . '/' . $domicilio; ?>" target="_blank">Ver domicilio</a></p>
            </a>
                                </div>
                                </div>
                    </div>
                </div>
                                <?php endif; ?>
                            <?php if (!empty($boleta)): ?>
                                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 400px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 350px;">
                        <div class="document-img-box" style="width: 350px; height: 350px;">
                        <a href="../uploads/<?php echo $id_colega . '/' . $boleta; ?>" target="_blank">
                <img class="document-img" src="../uploads/imagenes/BOLETA.jpg" alt="boleta" style="width: 350px; height: 350px;">
                <p>Boleta: <a href="../uploads/<?php echo $id_colega . '/' . $boleta; ?>" target="_blank">Ver boleta</a></p>
            </a>
                                </div>
                                </div>
                    </div>
                </div>
                                <?php endif; ?>
                            <?php if (!empty($salud)): ?>
                                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 400px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 350px;">
                        <div class="document-img-box" style="width: 350px; height: 350px;">
                        <a href="../uploads/<?php echo $id_colega . '/' . $salud; ?>" target="_blank">
                <img class="document-img" src="../uploads/imagenes/SALUD.jpg" alt="salud" style="width: 350px; height: 350px;">
                <p>Salud: <a href="../uploads/<?php echo $id_colega . '/' . $salud; ?>" target="_blank">Ver cartilla de salud</a></p>
            </a>
                                </div>
                                </div>
                    </div>
                </div>
                                <?php endif; ?>
                            <?php if (!empty($credencial)): ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                <div class="job-thumb job-thumb-box" style="width: 350px; height: 400px;">
    <div class="job-image-box-wrap" style="width: 350px; height: 350px;">
        <div class="document-img-box" style="width: 350px; height: 350px;">
            <a href="../uploads/<?php echo $id_colega . '/' . $credencial; ?>" target="_blank">
                <img class="document-img" src="../uploads/imagenes/ESCOLAR.jpg" alt="credencial" style="width: 350px; height: 350px;">
                <p>Credencial: <a href="../uploads/<?php echo $id_colega . '/' . $credencial; ?>" target="_blank">Ver credencial de la escuela</a></p>
            </a>
        </div>
    </div>
</div>
                                <?php endif; ?>
                            <!-- Repite para los demás documentos -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include '../footer1.php'; ?>

<!-- JAVASCRIPT FILES -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/counter.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>