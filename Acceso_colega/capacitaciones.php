<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start(); 

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
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">
        <link href="../css/owl.carousel.min.css" rel="stylesheet">
        <link href="../css/owl.theme.default.min.css" rel="stylesheet">
        <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
        <link href="../css/index.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">
        <link rel="shortcut icon" href=" images/logo simple.svg" />
        <link rel="stylesheet" href="../css/capacitacion.css">
        <link href="../css/styles.css" rel="stylesheet">
        <style>
        .hero-section {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #000000; /* Cambia el color del texto en la sección hero-section */
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
        

     .video-wrapper {
        margin-bottom: 30px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        width: 80%;
        overflow: hidden;
        height: 90%;
    }

    .video-wrapper video {
        width: 100%;
        height: auto;
    }
  
    .video-text {
        background-color: white; /* Fondo blanco */
        color: black;
        padding: 10px 10px;
        font-weight: bold;
        font-size: 1.2rem;
        text-align: center;
    }

    .video-text p {
        margin: 0;
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
<?php
        include 'header-colega.php';
        ?>

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="flex-center">
                    <form method="post">
                </div>
                <!--
                <div id="video">
                    <div class="video" onclick="expandirVideo(this)">
                         <video controls width="350">
                            <source src="../videos/Vídeo 1 _Bienvenida_/Vídeo 1 Bienvenida (corregido).webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="descripcion">
                            <p>"Bienvenida"</p>
                        </div>
                    </div>                    
                    <div class="video" onclick="expandirVideo(this)">
                         <video controls width="350">
                            <source src="../videos/Vídeo 2 _Documentos personales para entregar a la empresa con marca de agua_/Vídeo 2 _Documentos personales para entregar a la empresa con marca de agua_.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="descripcion">
                            <p>Documentos personales para entregar a la empresa con marca de agua</p>
                        </div>
                    </div>
                    <div class="video" onclick="expandirVideo(this)">
                         <video controls width="350">
                            <source src="../videos/Vídeo 3 _Formatos que te hará llegar la empresa_/Vídeo 3 _Formatos que te hará llegar la empresa_.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="descripcion">
                            <p>Formatos que te hará llegar la empresa</p>
                        </div>
                    </div> 
                    <div class="video" onclick="expandirVideo(this)">
                         <video controls width="350">
                            <source src="../videos/Vídeo 4 _Llenado de formatos_ (Expediente de canva, reglamento, bitácoras, planificadores diarios & capturas)/Vídeo 4 _Llenado de formatos_ (Expediente de canva, reglamento, bitácoras, planificadores diarios & capturas).webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="descripcion">
                            <p>Llenado de formatos Expediente de Canva</p>
                        </div>
                    </div>
                    <div class="video" onclick="expandirVideo(this)">
                         <video controls width="350">
                            <source src="../videos/Vídeo 5 _Llenado de formatos_ (Conteo de horas)/Vídeo 5 _Llenado de formatos_ (Conteo de horas).webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="descripcion">
                            <p>Llenado de formatos Conteo de horas</p>
                        </div>
                    </div>
                </div> -->
               <!---videos news --->
               <div id="video">
                <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350" poster="../images/fotograma.png">
                            <source src="../videos/UNO.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="video-text">
                            <p>Bienvenida DENEDIG</p>
                        </div>
                    </div>

                <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350" poster="../images/fotograma.png">
                            <source src="../videos/TRES.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="video-text">
                            <p>Formatos que te hará llegar la empresa</p>
                        </div>
                    </div>
    
                
                <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350" poster="../images/fotograma.png">
                            <source src="../videos/SIETE.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="video-text">
                            <p>Contrato de confidencialidad</p>
                        </div>
                    </div>

                
                <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350" poster="../images/fotograma.png">
                            <source src="../videos/SEIS.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="video-text">
                            <p>Llenado de formatos Expediente de Canva</p>
                        </div>
                    </div>
                    
                     <!--      
                    <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350">
                            <source src="../videos/NUEVE.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="video-text">
                            <p>Requisitos para hacer una cuenta de discord</p>
                        </div>
                    </div>
                    -->
                    <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350" poster="../images/fotograma.png">
                            <source src="../videos/DOS.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="video-text">
                            <p>Documentos personales para entregar a la empresa</p>
                        </div>
                    </div>
                    
                     
                    <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350" poster="../images/fotograma.png">
                            <source src="../videos/OCHO.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="video-text">
                            <p>Como poner marca de agua a tus documentos</p>
                        </div>
                    </div> 

                    <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350" poster="../images/fotograma.png">
                            <source src="../videos/DIEZ.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="video-text">
                            <p>Como usar Google Drive</p>
                        </div>
                    </div>
                    
                    <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350" poster="../images/fotograma.png">
                            <source src="../videos/CUATRO.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                            
                        </video>

                        <div class="video-text">
                            <p>Llenado de formatos Expediente de Canva</p>
                        </div>
                    </div>
                        
                    <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350" poster="../images/fotograma.png">
                            <source src="../videos/CINCO.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="video-text">
                            <p>Como crear carpeta de drive evidencias</p>
                        </div>
                    </div> 
                    
                    <div class="video-wrapper" onclick="expandirVideo(this)">
                         <video controls width="350" poster="../images/fotograma.png">
                            <source src="../videos/ONCE.webm" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                        <div class="video-text">
                            <p>Como subir tus documentos</p>
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