<?php
include '../../funciones/conex.php';
include '../../funciones/funciones.php';
conectar();       
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../../login.php");
    exit();
}
// A partir de aquí puedes usar $_SESSION['Correo'] u otras variables de sesión
// para acceder a la información del usuario que inició sesión
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
        /* Agrega cualquier otro estilo que necesites */
        /*estilo busqueda*/
        .container-tarjetaBusqueda{
                width: 90%;/*muestra un tamaño del 90% en dispositivos pequeños*/
                max-width: 1200px;/*muestra un tamaño mas grande en otros dispositivos, hace responsiva las tarjetas*/
                margin: 20px auto;
            }

.container-tarjeta{
             margin-left: 160px !important;
             margin-top: -60px !important;

            }
            
            .estilo-tarjetaBusqueda{
                height:100%;
                background-color: #EFE9E8; /* Cambia el color de fondo a #EFE9E8 */
                border: 6px solid #38934e; /* Agrega un borde de 6px sólido de color negro */
                padding: 20px; /* Ajusta el margen general de la tarjeta */
                border-radius: 15px; /* Añade bordes redondeados */
                margin-bottom: 20px; /* Añade margen inferior */
            }

            .card-bodyBusqueda{
                /*ajusta el margen de la descripción*/
                text-align:justify; /*justifica la descripción*/
                height: 310px; /* Altura máxima del div antes de que aparezca el scroll */
                overflow: auto; /* Hacer que aparezca el scroll cuando el contenido sea demasiado grande */
                padding: 10px; /* Espacio interno dentro del div */
            }
            
            .estilo-imagen{
                height:200px !important;
                width: 100%; /* Asegura que la imagen no se desborde de la tarjeta */
                display:block;
                height: auto; /* Ajusta la altura de la imagen automáticamente */
                border-radius: 15px; /* Añade bordes redondeados */
                margin-bottom:15px;
            }
            @media(min-width: 480px){
                .container-tarjetaBusqueda{
                    display:grid;
                    grid-template-columns:repeat(2,1fr);
                }
                .card-bodyBusqueda{
                    margin:0;
                    display:flex;
                    flex-direction:column;
                    font-weight: 700 !important;
                }
            }
            /* Estilos para las tarjetas */
            .container-tarjeta{
                width: 90%;/*muestra un tamaño del 90% en dispositivos pequeños*/
                max-width: 1200px;/*muestra un tamaño mas grande en otros dispositivos, hace responsiva las tarjetas*/
                margin: 20px auto;
            }

            .estilo-tarjeta {
                margin-top:40px;
                margin-bottom:30px;
                background-color: #EFE9E8; /* Cambia el color de fondo a #EFE9E8 */
                border: 4px solid #000000; /* Agrega un borde de 6px sólido de color negro */
                padding: 10px; /* Ajusta el margen general de la tarjeta */
                border-radius: 15px; /* Añade bordes redondeados */
                margin-bottom: 20px; /* Añade margen inferior */
                height: 65%;
                width: 75%;
            }

            .card-body{
                /*ajusta el margen de la descripción*/
                text-align:justify; /*justifica la descripción*/
                height: 200px; /* Altura máxima del div antes de que aparezca el scroll */
                overflow: auto; /* Hacer que aparezca el scroll cuando el contenido sea demasiado grande */
                padding: 10px; /* Espacio interno dentro del div */
            }
            
            .estilo-imagen {
                height: 250px !important;
                width: 100%; /* Asegura que la imagen no se desborde de la tarjeta */
                display:block;
                height: auto; /* Ajusta la altura de la imagen automáticamente */
                border-radius: 15px; /* Añade bordes redondeados */
                margin-bottom:15px;
            }

            @media(min-width: 480px){
                .container-tarjeta{
                    display:grid;
                    grid-template-columns:repeat(2,1fr);
                }
                .card-body{
                    margin:0;
                    display:flex;
                    flex-direction:column;
                    font-weight: 700 !important;
                }
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
            .cuadro-busqueda{
                margin-top: 25px;
                margin-left:125px;
                width: 500px;
                height: 45px;
                border-radius: 5px;
                display: flex;
                align-items: center;/*diseño del curadro de busqueda*/
            }
            .cuadro-busqueda:hover{
                color: #000000;
                text-decoration: none;
                border-bottom: 4px solid #b9cdca40;
            }
            .btn img {
                    width: 30px;
                    height: 30px;/*modula el tamaño de la imagen del cuadro de busqueda*/
            }
            /*contenedor reacciones*/
            .container-reacciones{
                display: flex;
                margin-top: 40px;
                
            }
            .reacciones{
                height: 47px;
            }
            .raccion{
                color: #fff;
            }
            .texto-reaccion{
                color: #fff;
                font-size: 0.9rem;
            }
            .table{
                color: #efe9e8;
            }
            .tbody{
                color: #efe9e8;
            }
.carousel-item {
 
 margin-top: 20px;   
}

.carousel-control-next-icon {
 
 margin-left: 100px !important;
 margin-top: -200px;
}

.carousel-control-prev-icon {
 
 margin-left: 120px !important;   
 margin-top: -200px;

}
.carousel-item {
    position: relative;
    display: none;
    float: left;
    width: 100%;
    margin-right: -100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    transition: -webkit-transform .3s ease-in-out;
    transition: transform .3s ease-in-out ;
    transition: transform .2s ease-in-out, -webkit-transform .2s ease-in-out;
}
</style>
        

        <!-- Agrega el bloque de script aquí -->
        <script>
    // Función para realizar la búsqueda en tiempo real
    function searchProjects() {
        const searchInput = document.getElementById('job-title');
        const searchResults = document.getElementById('search-results');
        const searchValue = searchInput.value;

        if (searchValue.length >= 3) { // Realiza la búsqueda después de escribir al menos 3 caracteres
            // Realiza una solicitud AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `search.php?q=${searchValue}`, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Actualiza el contenido de los resultados
                    searchResults.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else {
            // Borra los resultados si el campo de búsqueda está vacío
            searchResults.innerHTML = '';
        }
    }

    // Agrega un listener al campo de búsqueda para llamar a la función searchProjects cuando se escriba
    document.getElementById('job-title').addEventListener('input', searchProjects);
</script>
        <!-- Fin del bloque de script -->

    </head>
    <body >
<section class="hero-section">        
        <div style= "width: 100%;" class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-12 mb-5 mb-lg-0 text-center">
            <div class="hero-section-text mt-5">
                
<div class="container-bienvenido">
    <div class="bienvenido">
       Recursos publicidad
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