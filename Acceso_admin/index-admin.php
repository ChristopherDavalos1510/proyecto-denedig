<?php
// Incluye el archivo de conexión y funciones
include '../funciones/conex.php';
include '../funciones/funciones.php';
session_start();

if (!isset($_SESSION['id_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: ../login.php");
    exit();
}


?>

<?php include 'header-admin.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Inicio admin</title>
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
        .contenedorgral {
            background-color: #142e61ff;
            color: #fff;
            height: 460px !important;
            margin-top: 125px;
        }

        h1 {
            margin-bottom: 00px;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            max-width: 800px;
            color: black;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #6d809c;
        }

        #detalle-propiedad .descripcion tr:nth-child(odd) {
            background-color: #6d809c;
        }

       
    </style>
</head>
<body>
    <main>
        <div class="contenedorgral">
            <br>
            
            <br><br><br><br><br>
        </div>
    </main>
   <div id="miVentana" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarVentana();">&times;</span>
        <iframe id="iframeUsuario" width="100%" height="400px" style="border:none;"></iframe>
    </div>
</div>


    <!-- Script JavaScript para manejar la ventana emergente -->
    <script>
    function mostrarVentana(url) {
        var iframe = document.getElementById("iframeUsuario");
        iframe.src = url;
        var ventana = document.getElementById("miVentana");
        ventana.style.display = "block";
    }

    function cerrarVentana() {
        var ventana = document.getElementById("miVentana");
        ventana.style.display = "none";
    }
</script>


    <?php include 'footer1.php'; ?>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
