<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start(); 

include '../header-lider.php';

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

// Función para eliminar un archivo
function eliminarArchivo($id_colega, $nombreArchivo) {
    $rutaArchivo = "../uploads/$id_colega/$nombreArchivo";
    if (file_exists($rutaArchivo)) {
        unlink($rutaArchivo); // Elimina el archivo si existe
        return true;
    } else {
        return false;
    }
}

// Si se ha enviado el formulario de eliminar
if (isset($_POST['eliminar_documento']) && isset($_POST['documento'])) {
    $documento = $_POST['documento'];
    switch ($documento) {
        case 'INE':
            $documento_nombre = $INE;
            break;
        case 'curp':
            $documento_nombre = $curp;
            break;
        case 'acta':
            $documento_nombre = $acta;
            break;
        case 'domicilio':
            $documento_nombre = $domicilio;
            break;
        case 'boleta':
            $documento_nombre = $boleta;
            break;
        case 'salud':
            $documento_nombre = $salud;
            break;
        case 'credencial':
            $documento_nombre = $credencial;
            break;
        default:
            // Si se proporciona un documento no válido, redirigir o mostrar un mensaje de error
            break;
    }

    // Eliminar el archivo de la carpeta de uploads
    if (eliminarArchivo($id_colega, $documento_nombre)) {
        // Si el archivo se eliminó correctamente, eliminar el registro de la base de datos
        $query_delete = "UPDATE documentos SET $documento = NULL WHERE id_colega = ?";
        $stmt_delete = $conexion->prepare($query_delete);
        $stmt_delete->bind_param("i", $id_colega);
        $stmt_delete->execute();
        $stmt_delete->close();
        // Puedes redirigir a la página actual o mostrar un mensaje de éxito
    } else {
        // Manejar el caso en que no se puede eliminar el archivo
    }
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
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 470px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 370px;">
                            <div class="document">
                            <div class="document-img-box" style="width: 350px; height: 370px;">
                                    <img class="document-img" src="../uploads/imagenes/INE.jpg" alt="INE" style="width: 350px; height: 350px;">
                                </div>
                                <form method="post">
                                    <input type="hidden" name="eliminar_documento" value="1">
                                    <input type="hidden" name="documento" value="INE">
                                    <input type="hidden" name="id_colega" value="<?php echo $id_colega; ?>">
                                    <button type="submit">Eliminar INE</button>
                                </form>
                                <p>INE: <a href="../uploads/<?php echo $id_colega . '/' . $INE; ?>" target="_blank">Ver credencial del INE</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Repite para los demás documentos -->
            <?php if (!empty($curp)): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 470px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 370px;">
                            <div class="document">
                            <div class="document-img-box" style="width: 350px; height: 370px;">
                                    <img class="document-img" src="../uploads/imagenes/CURP.jpg" alt="curp" style="width: 350px; height: 350px;">
                                </div>
                                <form method="post">
                                    <input type="hidden" name="eliminar_documento" value="1">
                                    <input type="hidden" name="documento" value="curp">
                                    <input type="hidden" name="id_colega" value="<?php echo $id_colega; ?>">
                                    <button type="submit">Eliminar curp.</button>
                                </form>
                                <p>Curp: <a href="../uploads/<?php echo $id_colega . '/' . $curp; ?>" target="_blank">Ver curp</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Repite para los demás documentos -->
            <?php if (!empty($acta)): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 470px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 370px;">
                            <div class="document">
                            <div class="document-img-box" style="width: 350px; height: 370px;">
                                    <img class="document-img" src="../uploads/imagenes/ACTA.jpg" alt="acta" style="width: 350px; height: 350px;">
                                </div>
                                <form method="post">
                                    <input type="hidden" name="eliminar_documento" value="1">
                                    <input type="hidden" name="documento" value="acta">
                                    <input type="hidden" name="id_colega" value="<?php echo $id_colega; ?>">
                                    <button type="submit">Eliminar acta de nacimiento.</button>
                                </form>
                                <p>Acta: <a href="../uploads/<?php echo $id_colega . '/' . $acta; ?>" target="_blank">Ver acta de nacimiento</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Repite para los demás documentos -->
            <?php if (!empty($domicilio)): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 470px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 370px;">
                            <div class="document">
                            <div class="document-img-box" style="width: 350px; height: 370px;">
                                    <img class="document-img" src="../uploads/imagenes/DOMICILIO.jpg" alt="domicilio" style="width: 350px; height: 350px;">
                                </div>
                                <form method="post">
                                    <input type="hidden" name="eliminar_documento" value="1">
                                    <input type="hidden" name="documento" value="domicilio">
                                    <input type="hidden" name="id_colega" value="<?php echo $id_colega; ?>">
                                    <button type="submit">Eliminar comprobante de domicilio.</button>
                                </form>
                                <p>Domicilio: <a href="../uploads/<?php echo $id_colega . '/' . $domicilio; ?>" target="_blank">Ver domicilio</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Repite para los demás documentos -->
            <?php if (!empty($boleta)): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 470px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 370px;">
                            <div class="document">
                            <div class="document-img-box" style="width: 350px; height: 370px;">
                                    <img class="document-img" src="../uploads/imagenes/BOLETA.jpg" alt="boleta" style="width: 350px; height: 350px;">
                                </div>
                                <form method="post">
                                    <input type="hidden" name="eliminar_documento" value="1">
                                    <input type="hidden" name="documento" value="boleta">
                                    <input type="hidden" name="id_colega" value="<?php echo $id_colega; ?>">
                                    <button type="submit">Eliminar boleta.</button>
                                </form>
                                <p>Boleta: <a href="../uploads/<?php echo $id_colega . '/' . $boleta; ?>" target="_blank">Ver boleta</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Repite para los demás documentos -->
            <?php if (!empty($salud)): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 470px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 370px;">
                            <div class="document">
                            <div class="document-img-box" style="width: 350px; height: 370px;">
                                    <img class="document-img" src="../uploads/imagenes/SALUD.jpg" alt="salud" style="width: 350px; height: 350px;">
                                </div>
                                <form method="post">
                                    <input type="hidden" name="eliminar_documento" value="1">
                                    <input type="hidden" name="documento" value="salud">
                                    <input type="hidden" name="id_colega" value="<?php echo $id_colega; ?>">
                                    <button type="submit">Eliminar cartilla de salud.</button>
                                </form>
                                <p>Salud: <a href="../uploads/<?php echo $id_colega . '/' . $salud; ?>" target="_blank">Ver cartilla de salud</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Repite para los demás documentos -->
            <?php if (!empty($credencial)): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="job-thumb job-thumb-box" style="width: 350px; height: 470px;">
                        <div class="job-image-box-wrap" style="width: 350px; height: 370px;">
                            <div class="document">
                            <div class="document-img-box" style="width: 350px; height: 370px;">
                                    <img class="document-img" src="../uploads/imagenes/ESCOLAR.jpg" alt="credencial" style="width: 350px; height: 350px;">
                                </div>
                                <form method="post">
                                    <input type="hidden" name="eliminar_documento" value="1">
                                    <input type="hidden" name="documento" value="credencial">
                                    <input type="hidden" name="id_colega" value="<?php echo $id_colega; ?>">
                                    <button type="submit">Eliminar credencial escolar.</button>
                                </form>
                                <p>Credencial: <a href="../uploads/<?php echo $id_colega . '/' . $credencial; ?>" target="_blank">Ver credencial de la escuela</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Repite para los demás documentos -->
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