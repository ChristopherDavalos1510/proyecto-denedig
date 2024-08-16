<?php
// Iniciar sesión si no está iniciada

    session_start();
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Usuario</title>
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
    <style>
        .title-center {
    text-align: center;
}
.center-button {
    display: block;
    margin: 0 auto;
}

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
</head>
<body>
    <?php include 'header-colega.php';
    ?>

    <?php
     include '../funciones/conex.php';


     if(isset($_SESSION["id_usuario"])) {
        $idu = $_SESSION["id_usuario"];
        
        $sql = "SELECT nombre, paterno, materno FROM usuarios WHERE id_usuario=$idu";
        // Ejecutar la consulta
        $result = $conexion->query($sql);
        
        // Verificar si la consulta se ejecutó correctamente
        if ($result) {
            // Verificar si se encontraron resultados
            if ($result->num_rows > 0) {
                // Obtener el resultado
                $row = $result->fetch_assoc();
                // Guardar el nombre en la variable
                $nombre = $row["nombre"]." ".$row["paterno"]." ".$row["materno"];
            } else {
                echo "No se encontraron resultados para la ID $idu";
            }
        } else {
            echo "Error al ejecutar la consulta: " . $conexion->error;
        }
    } else {
        echo "La sesión no está iniciada o la variable de sesión no está definida.";
    }


    ?>
    
            <main>
    
                <section class="hero-section d-flex justify-content-center align-items-center">
    
                    <div class="container">
                    <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-12 mb-5">
                    <h1 class="font-weight-bold text-center text-white font-italic">Bienvenido, <?php echo $nombre ?>!</h1>
                </div>

       

<div class="card" style="width: 18rem; margin: 0 10px;">
  <img src="correo.png" class="card-img-top mx-auto" alt="..." style="width: 100px; height: 100px; align: center;">
  <div class="card-body">
    <h5 class="card-title title-center">CARTA DE ACEPTACIÓN</h5>
    <p class="card-text text-center">Ingresa a este apartado para descargar tu carta de aceptacion firmada.</p>
    <a href="../funciones/f_cartas_empresariales/descargar_carta.php" class="btn btn-primary center-button">Ir</a>
  </div>
</div>
<div class="card" style="width: 18rem; margin: 0 10px;">
  <img src="meta.png" class="card-img-top mx-auto" alt="..." style="width: 100px; height: 100px; align: center;">
  <div class="card-body">
    <h5 class="card-title title-center">CARTA DE TERMINO</h5>
    <p class="card-text text-center">Ingresa a este apartado para descargar tu carta de termino firmada.</p>
    <a href="../funciones/f_cartas_empresariales/descargar_cartaT.php" class="btn btn-primary center-button">Ir</a>
  </div>
</div>

            </div>
        </div>
    
                        </div>
                    </div>
                </section>
    
            <?php
            include 'footer1.php';
            ?>
    
            <!-- JAVASCRIPT FILES -->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/counter.js"></script>
            <script src="js/custom.js"></script>
            
    
        </body>
</html>
