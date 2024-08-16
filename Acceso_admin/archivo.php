<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start(); 
// A partir de aquí puedes usar $_SESSION['Correo'] u otras variables de sesión
// para acceder a la información del usuario que inició sesión

 // Ruta absoluta para el header dinamico
$currentDir = __DIR__;
$_SESSION['currentDir'] = $currentDir;


?>
<?php include 'header-superadmin.php'; ?>

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
        <link rel="shortcut icon" href="../images/logo simple.svg" />

        <style>
        .contentprimary {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en la sección hero-section */
            height: 724px;
        }
        .hero-section {
                background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
                color: #fff; /* Cambia el color del texto en la sección hero-section */
                padding-top: 150px !important;
            }
            .container{
                position: relative;
                z-index: 2;
            }
            .hero-title {
                font-size: 2.5rem;
                font-weight: 700;
                height: 285px !important;
            }
            /* Agrega cualquier otro estilo que necesites */
            .estilo-texto{
                text-align: center;
                color: #ffffff
            }
            /*estilo cuadro de busqueda*/
            .container-archivo{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-top: 25px;
                margin-bottom: 25px;
            }
            .archivo{
                background: #b9cdca40;
                width: 700px;
                height: 250px;
                font-size: 2.5rem;
                font-weight: 700;
                color: #000000;
                border-radius: 15px;
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
            .cuadro-regresa{
                font-size: 1.8rem;
                margin-top: 25px;
                justify-content: center;
                border-radius: 5px;
                display: flex;
                align-items: center;
            }
            .estilo-text{
                font-size: 2.8rem;
                text-align: center;
                color: #000000;
            }
            .btn img {
                    width: 30px;
                    height: 30px;/*modula el tamaño de la imagen del cuadro de busqueda*/
            }
            /*estilo busqueda*/
            .container-tarjetaBusqueda{
                width: 90%;/*muestra un tamaño del 90% en dispositivos pequeños*/
                max-width: 1200px;/*muestra un tamaño mas grande en otros dispositivos, hace responsiva las tarjetas*/
                margin: 20px auto;
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
                height:300px !important;
                width: 100%; /* Asegura que la imagen no se desborde de la tarjeta */
                display:block;
                height: auto; /* Ajusta la altura de la imagen automáticamente */
                border-radius: 15px; /* Añade bordes redondeados */
                margin-bottom:15px;
            }
            @media(min-width: 480px){
                .container-tarjetaBusqueda{
                    display:grid;
                    grid-template-columns:repeat(3,1fr);
                    gap: 15px;
                }
                .card-bodyBusqueda{
                    margin:0;
                    display:flex;
                    flex-direction:column;
                    font-weight: 700 !important;
                }
            }
            /* estilo tarjetas*/
            .container-tarjeta{
                width: 90%;/*muestra un tamaño del 90% en dispositivos pequeños*/
                max-width: 1200px;/*muestra un tamaño mas grande en otros dispositivos, hace responsiva las tarjetas*/
                margin: 20px auto;
            }

            .estilo-tarjeta {
                height:100%;
                background-color: #EFE9E8; /* Cambia el color de fondo a #EFE9E8 */
                border: 6px solid #000000; /* Agrega un borde de 6px sólido de color negro */
                padding: 20px; /* Ajusta el margen general de la tarjeta */
                border-radius: 15px; /* Añade bordes redondeados */
                margin-bottom: 20px; /* Añade margen inferior */
            }

            .card-body{
                /*ajusta el margen de la descripción*/
                text-align:justify; /*justifica la descripción*/
                height: 310px; /* Altura máxima del div antes de que aparezca el scroll */
                overflow: auto; /* Hacer que aparezca el scroll cuando el contenido sea demasiado grande */
                padding: 10px; /* Espacio interno dentro del div */
            }
            
            .estilo-imagen {
                height:300px !important;
                width: 100%; /* Asegura que la imagen no se desborde de la tarjeta */
                display:block;
                height: auto; /* Ajusta la altura de la imagen automáticamente */
                border-radius: 15px; /* Añade bordes redondeados */
                margin-bottom:15px;
            }

            @media(min-width: 480px){
                .container-tarjeta{
                    display:grid;
                    grid-template-columns:repeat(3,1fr);
                    gap: 15px;
                }
                .card-body{
                    margin:0;
                    display:flex;
                    flex-direction:column;
                    font-weight: 700 !important;
                }
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
    <div class="container-archivo">
                <div class="archivo">
                        <h3 class="estilo-text">
                            Bienvenido a la papelera
                        </h3>    
                        <form class="cuadro-regresa" action="catalogoAdmin.php"  method="POST">
                            ¿Deseas regresar?
                            <button class="btn btn-outline-success" type="submit">Regresar</button>
                        </form>
                        <form class="cuadro-busqueda" id="cuadro" method="POST">
                            <input class="form-control me-2" type="search" name="busqueda" id="busqueda" autocomplete="off" autofocus placeholder="Ingresa un tema." aria-label="Search">
                            <button class="btn btn-outline-success" type="submit"><img src="../img/busqueda.png"></button>
                        </form>
                </div>
            </div><!--Fin cuadro busqueda--> 
            <!--Busqueda dinamica-->
            <div class="container-tarjetaBusqueda">
                <?php
                if(isset($_POST['busqueda'])){
                    include '../funciones/conecPublicaciones.php';
                    $busqueda=$_POST['busqueda']; //variable
                    $sql="SELECT id, titulo, descripcion, imagen FROM publicaciones WHERE titulo LIKE '%$busqueda%' AND estado=9";
                    $result=mysqli_query($conexion,$sql);
                        while($fila=mysqli_fetch_array($result)){    
                ?>
                    <div class="estilo-tarjetaBusqueda">
                        <img src="<?php echo $fila['imagen']?>" class="img-fluid rounded-start estilo-imagen">
                        <h5 class="card-title"><?php  echo $fila['titulo'];?></h5>
                        <div class="card-bodyBusqueda overflow-auto">
                            <p class="card-text" style="color: black;"><?php echo $fila['descripcion']?></p>
                        </div>
                        <?php echo "<a role='button' style='margin-top: 20px;' href='desarchivar.php?id=".$fila['id']."' class='btn btn-outline-success'>Desarchivar</a>"; ?>
                    </div>
                <?php
                    }//cierra el while que recorre la consulta
                }//cierra isset
                ?>
            </div><!-- Cierra container -->
            <!--Fin busqueda dinamica-->
            <!--Div de carta de la publicación-->
            <div class="container-tarjeta">
                <?php
                    include '../funciones/conecPublicaciones.php';
                    $sql="SELECT id, titulo, descripcion, imagen FROM publicaciones WHERE estado = 9";
                    $result=mysqli_query($conexion,$sql);
                        while($fila=mysqli_fetch_array($result)){    
                ?>
                    <div class="estilo-tarjeta">
                        <img src="<?php echo $fila['imagen']?>" class="img-fluid rounded-start estilo-imagen">
                        <h5 class="card-title"><?php  echo $fila['titulo']?></h5>
                        <div class="card-body overflow-auto">
                            <p class="card-text" style="color: black;"><?php echo $fila['descripcion']?></p>
                        </div>
                        <?php echo "<a role='button' style='margin-top: 20px;' href='desarchivar.php?id=".$fila['id']."' class='btn btn-outline-success'>Desarchivar</a>"; ?>
                    </div>
                <?php
                    }//cierra el while que recorre la consulta
                ?>
            </div><!-- Cierra container -->
    </section><!--Cierra sección del diseño de la pagina-->
    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>
        

    </body>
       <?php
        include 'footer.php';
        ?>
</html>