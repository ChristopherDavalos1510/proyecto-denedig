<?php
include '../../funciones/conex.php';
include '../../funciones/funciones.php';
conectar();       
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../login.php");
    exit();
}
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    $filepath = "../../kits/" . $file;

    if (file_exists($filepath)) {
        // Define headers
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        exit;
    } else {
        echo "El archivo no existe.";
    }
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

        <title>Bienvenida</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/bootstrap-icons.css" rel="stylesheet">
        <link href="../../css/owl.carousel.min.css" rel="stylesheet">
        <link href="../../css/owl.theme.default.min.css" rel="stylesheet">
        <link href="../../css/tooplate-gotto-job.css" rel="stylesheet">
        <link href="../../css/index.css" rel="stylesheet">
        <link href="../../css/styles.css" rel="stylesheet">
        <link rel="shortcut icon" href="../../images/logo simple.svg" />

        <style>
        .contenedorprimary {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en la sección hero-section */
            height: 1500px;
        }
        .contenedorsecondary {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en la sección hero-section */
            height: 975px;
        }
        .contenedorthird {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en la sección hero-section */
            height: 975px;
        }

            .hero-section {
                background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
                color: #fff; /* Cambia el color del texto en la sección hero-section */
                padding-top: 0px !important;
            }
            .container {
                position: relative;
                z-index: 2;
            }
            .hero-title {
                font-size: 2.5rem;
                font-weight: 700;
                height: 285px !important;
            }


           /*estilo para busqueda*/
           .container-bienvenido{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-top: 25px;
                margin-bottom: 25px;
            }
            .bienvenido{
                background: #b9cdca40;
                width: 700px;
                height: 60px;
                font-size: 2.5rem;
                font-weight: 700;
                color: #fff;
                border-radius: 15px;
                margin-top: -42px;
                margin-left: 20px;
            }

.recursos {
    background: #b9cdca40;
    width: 300px; /* Ajustado el ancho para mejor distribución */
    height: 100%;
    font-size: 2.5rem;
    font-weight: 700;
    color: #fff;
    border-radius: 15px;
    margin: 10px;
    display: block;
    justify-content: center;
    align-items: center;
}

.container-div {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 25px;
    margin-bottom: 25px;
}

.recuadro {
    width: 150px;
    height: 150px;
    background: #fff; /* Color de fondo blanco para el recuadro */
    margin-top: 10px; /* Espacio entre el título y el recuadro */
    margin-left: 80px;
    color: black;
    font-size: 12px;
}

 .download-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
        }
        .download-button:hover {
            background-color: #0056b3;
        }
</style>
        

       

    </head>
    <body >
<section class="hero-section">        
        <div style= "width: 100%;" class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-12 mb-5 mb-lg-0 text-center">
            <div class="hero-section-text mt-5">
                
<div class="container-bienvenido">
    <div class="bienvenido">
       Recursos ingenieria
    </div>
</div>
<br><br>
<div class="container-div">
    <div class="recursos">
        
        <a> titulo</a>
    <br>
    <div class="recuadro">
        
            <a class="download-button" href="?file=ingenieria1.docx">Descargar Ingeniería PDF</a>

    </div>
    
    <br>
    </div>
    <div class="recursos">
        
        <a> titulo</a>
    <br>
    <div class="recuadro">DESCARGAR + BOTON</div>
    
    <br>
    </div>
</div>
<br><br>
<div class="container-div">
     <div class="recursos">
        
        <a> titulo</a>
    <br>
    <div class="recuadro">DESCARGAR + BOTON</div>
    
    <br>
    </div>
 <div class="recursos">
        
        <a> titulo</a>
    <br>
    <div class="recuadro">DESCARGAR + BOTON</div>
    
    <br>
    </div></div>
       
        </div>
        
  <br><br><br><br><br><br><br><br><br>
</section>
        <?php
        include 'footer1.php';
        
        ?>

        <!-- JAVASCRIPT FILES -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
        

    </body>
</html>