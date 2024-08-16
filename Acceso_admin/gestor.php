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


<?php include '../Acceso_admin/header-admin.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Colegas</title>
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
 background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en la sección hero-section */
            height: 100% !important;   
            margin-top: 100px;
            display: block; /* Habilita Flexbox */
    justify-content: center; /* Centra horizontalmente */
    align-items: center; /* Centra verticalmente */
    text-align: center; /* Centra el texto dentro del contenedor */
    }
        
        h1 {
            margin-bottom: 00px;
        }
.buttons {
    display: block;
    margin: 10px auto; /* Centra el botón horizontalmente */
    padding: 10px 20px;
    background-image: url('../images/Ascender Colega.png');
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
    
    /* Manejo del tamaño y posición de la imagen de fondo */
    background-size: 220px 60px; /* Tamaño específico */
    background-position: center; /* Centrado */
    background-repeat: no-repeat; /* No repetir */
}

.buttons button:hover {
    background-color: #fff;
}

.buttons1 {
    display: block;
    margin: 10px auto; /* Centra el botón horizontalmente */
    padding: 10px 20px;
    background-image: url('../images/Descender Lider.png');
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
    
        /* Manejo del tamaño y posición de la imagen de fondo */
    background-size: 220px 60px; /* Tamaño específico */
    background-position: center; /* Centrado */
    background-repeat: no-repeat; /* No repetir */
}

.buttons2 {
    display: block;
    margin: 10px auto; /* Centra el botón horizontalmente */
    padding: 10px 20px;
     /*background-image: url('../images/Descender Lider.png');*/
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
    
        /* Manejo del tamaño y posición de la imagen de fondo */
    background-size: 220px 60px; /* Tamaño específico */
    background-position: center; /* Centrado */
    background-repeat: no-repeat; /* No repetir */
}
.buttons1 button:hover {
    background-color: #fff;
}

:root {
    --custom-btn-bg-color: #fff;
}

 
.contenedorasenso {
    background-color: #fff;
    color: #00000;
    width: 50%;
    height: 220px !important;
    margin-top: 20px;
    display: flex; /* Habilita Flexbox */
    justify-content: center; /* Centra horizontalmente */
    align-items: center; /* Centra verticalmente */
    text-align: center; /* Centra el texto dentro del contenedor */
    margin-left: 500px;
}


   .contenedor-principal {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            padding: 20px;
            width: 90%;
            margin-left: 100px;
            border-radius: 5px;

        }
        .contenedor-asenso {
            flex: 1;
            margin: 0 10px;
            background-color: #6a839e;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            
        }
        .contenedor-asenso h2 {
            color: #fff;
        }


    </style>
</head>
<body>
    <main>
    
      <div class="contenedorgral">
          <br><br><br><br><br>
     <br>     
    <div class="contenedor-principal">
        <div class="contenedor-asenso">
            <h2>Subida de líder o descenso</h2>
            <a class="buttons" href="gestor_colegas/Ascender.php">‎ </a>
            <br>
            <a class="buttons1" href="gestor_colegas/Descender.php">‎ </a>
        </div>
        <div class="contenedor-asenso">
            <h2>Agregar un asesor nuevo</h2>
             <br>
            <a class="buttons2" href="gestor_colegas/registro1.php">Registro de asesor</a>
            <br>
        </div>
    </div>
            <br><br><br><br><br><br><br><br>
      </div>
    </main>
    <?php
    include 'footer1.php';
    ?>
    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>
