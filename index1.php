<?php
include 'funciones/conex.php';
include 'funciones/funciones.php';
conectar();       
session_start(); 
 // Ruta absoluta para el header dinamico
$currentDir = __DIR__;
$_SESSION['currentDir'] = $currentDir;

headerDinamico($conexion);

?>
<?php
        include 'header1.php';
        ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Proyectos brillantes</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/owl.carousel.min.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css" rel="stylesheet">
        <link href="css/tooplate-gotto-job.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <link rel="shortcut icon" href=" images/logo simple.svg" />

        <style>
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

        

        <main>

   <div style= "height: 724px; width: 100.5%; color: #fff; background-color: #142e61ff;" class="row justify-content-center align-items-center">
    <div class="col-lg-6 col-12 mb-5 mb-lg-0 text-center">
        <div class="hero-section-text mt-5">
            <h1 class="hero-title text-white mt-4 mb-4" style="margin-top: 80px !important; font-size: 3rem;">
                <br> Plataforma interna<br> DENEDIG SAS de CV
            </h1>
        </div>
    </div>
    <div class="col-lg-6 col-12 mb-5 mb-lg-0 text-center">
        <img src="../images/Ordenador.webp" alt="Imagen" class="img-fluid rounded-circle mt-5" style="margin-top: 80px !important; width: 300px; height: 300px; object-fit: cover; border-radius: 50%;">
    </div>
</div>


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