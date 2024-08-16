<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom_usuario'], $_POST['correo'], $_POST['telefono'], $_POST['escuela'])) {
        // Obtener datos del formulario
        $nom_usuario = $_POST['nom_usuario'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $escuela = $_POST['escuela'];
        
    }
}
// Obtener la información del usuario desde la base de datos para prellenar el formulario
$user = $_SESSION['Correo'];
$select_sql = "SELECT nom_usuario, correo, telefono, escuela, imagen FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($select_sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($nom_usuario, $correo, $telefono, $escuela, $imagen); 
$stmt->fetch();
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
    <title>CFMX</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<style>
        .site-header {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en el encabezado */
        }

        /* Agrega cualquier otro estilo que necesites */

    </style>

<header class="site-header py-5">

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-white">Mi perfil.</h1>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById('searchForm').addEventListener('submit', function (e) {
        // Evita que el formulario se envíe normalmente
        e.preventDefault();

        // Acciones adicionales si es necesario

        // Envía el formulario programáticamente
        this.submit();
    });

    // Agrega un listener al campo de entrada para realizar la búsqueda al presionar Enter
    document.querySelector('.search-form input').addEventListener('keyup', function (e) {
        if (e.key === 'Enter') {
            // Realiza la búsqueda al presionar Enter
            document.getElementById('searchForm').submit();
        }
    });
</script>
<br>
<br>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-12">
            <img src="../uploads/perfil/<?php echo $imagen; ?>" alt="Imagen de perfil" width="350" height="350">
        </div>
        <div class="col-lg-6 col-12">
            <div class="project-description">
                <h3 style="font-size: 40px;">Datos del usuario.</h3>
                <p style="font-size: 30px;">Nombre de usuario: <?php echo $nom_usuario; ?></p>
                <p style="font-size: 30px;">Correo: <?php echo $correo; ?></p>
                <p style="font-size: 30px;">Telefono: <?php echo $telefono; ?></p>
                <p style="font-size: 30px;">Escuela: <?php echo $escuela; ?></p>

                <div class="col-12">
    <a href="../colegas/editar-perfil-usuario.php" class="btn btn-secondary btn-lg">
        Editar perfil
    </a>
</div>

            </div>
        </div>
    </div>
</div>

        <?php
        include '../footer1.php';
        ?>

    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>