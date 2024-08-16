
<?php
include '../conex.php';

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado y tiene una sesión activa
if(isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
} else {
    // Redirigir a la página de inicio de sesión si el usuario no está autenticado
    header("Location: login.php");
    exit;
}

// Realizar una consulta para obtener la ruta del archivo asociada al usuario
$sql = "SELECT termino,aut_termino FROM usuarios WHERE id_usuario = $id_usuario";
$resultado = mysqli_query($conexion, $sql);

// Verificar si se encontró el usuario y la ruta del archivo
if(mysqli_num_rows($resultado) > 0) {
    // Obtener la ruta del archivo de la fila de resultados
    $fila = mysqli_fetch_assoc($resultado);
    $ruta_archivo = $fila['termino'];
    $autorizacion = $fila['aut_termino'];

    

    // Verificar si el archivo existe en el servidor
    if(($ruta_archivo != null || $ruta_archivo !="") && $autorizacion == 1) {
        // Mostrar el PDF en un iframe que no ocupe toda la pantalla y mostrar solo la primera página
        ?>
        <!doctype html>
        <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <title>Vista previa del PDF</title>

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
    <!-- Agregar enlaces a Bootstrap CSS y jQuery -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>
        <body>
            <!-- Header -->
            <?php include '../../header-lider.php'; ?>

            <style>
                body, html {
                    margin: 0;
                    padding: 0;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                }

                .content-wrapper {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    background-color: #f0f0f0;
                }

                .hero-section {
                    background-color: #142e61ff;
                    color: #fff;
                    padding: 20px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                }

                .iframe-container {
                    width: 600px;  /* Ajusta el ancho según sea necesario */
                    height: 800px; /* Ajusta la altura según sea necesario */
                    border: 1px solid #ccc;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                }

                .card {
                    background-color: #fff;
                    border: 1px solid #ccc;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    width: 300px; /* Ajusta el ancho según sea necesario */
                    padding: 20px;
                    margin-right: 40px; /* Espacio entre la card y el iframe */
                    text-align:center;
                    color: black;
                }

                .title-center {
                    text-align: center;
                }
            </style>

            <main class="content-wrapper">
                <section class="hero-section">
                <div class="card">
                        <h5 class="card-title title-center">¡FELICIDADES!</h5>
                        <p class="card-text">Tu carta de termino ya ha sido subida y puedes descargala mucho exito.</p>
                    </div>
                    <div class="iframe-container">
                        <iframe src="<?php echo $ruta_archivo . '#page=1'; ?>" width="100%" height="100%" frameborder="0"></iframe>
                    </div>
                    
                </section>
            </main>

            <!-- Footer -->
            <?php include '../../footer1.php'; ?>

            <!-- JAVASCRIPT FILES -->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/counter.js"></script>
            <script src="js/custom.js"></script>
            <script src="js/scripteye.js"></script>
        </body>
        </html>
        <?php
    } else {
        ?>

<!doctype html>
        <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <title>Vista previa del PDF</title>

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
    <!-- Agregar enlaces a Bootstrap CSS y jQuery -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>
        <body>
            <!-- Header -->
            <?php include '../../header-lider.php'; ?>

            <style>
                body, html {
                    margin: 0;
                    padding: 0;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                }

                .content-wrapper {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    background-color: #f0f0f0;
                }

                .hero-section {
                    background-color: #142e61ff;
                    color: #fff;
                    padding: 20px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                }

                .iframe-container {
                    width: 600px;  /* Ajusta el ancho según sea necesario */
                    height: 800px; /* Ajusta la altura según sea necesario */
                    border: 1px solid #ccc;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                }

                .card {
                    background-color: #fff;
                    border: 1px solid #ccc;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    width: 300px; /* Ajusta el ancho según sea necesario */
                    padding: 20px;
                    margin-right: 40px; /* Espacio entre la card y el iframe */
                    text-align:center;
                }

                .title-center {
                    text-align: center;
                }
            </style>

            <main class="content-wrapper">
                <section class="hero-section">
                <div class="card">
                        <h5 class="card-title title-center">¡AUN NO!</h5>
                        <p class="card-text">Tu carta no ha sido autorizada intenta de nuevo en un par de dias.</p>
                    </div>
                    <div class="iframe-container">
                        <iframe src="<?php echo "../archivos_subidos/default.pdf" . '#page=1'; ?>" width="100%" height="100%" frameborder="0"></iframe>
                    </div>
                    
                </section>
            </main>

            <!-- Footer -->
            <?php include '../../footer1.php'; ?>

            <!-- JAVASCRIPT FILES -->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/counter.js"></script>
            <script src="js/custom.js"></script>
            <script src="js/scripteye.js"></script>
        </body>
        </html>

        <?php
    }
} else {
    echo "Usuario no encontrado.";
}
?>
