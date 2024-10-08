<?php
session_start();

if (!isset($_SESSION['id_admin'])) {
    header("Location: ../login.php");
    exit();
}
// Tu código de registro-admin.php aquí
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Registro lider.</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">
        <link href="../css/owl.carousel.min.css" rel="stylesheet">
        <link href="../css/owl.theme.default.min.css" rel="stylesheet">
        <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
         <!-- Theme included stylesheets -->
         <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

       
        


    </head>
    
    <?php
        include 'header-superadmin.php';
    ?>

<style>
        .hero-section {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en la sección hero-section */
        }

        .custom-form {
            background-color: #5c6a87ff; /* Cambia el color de fondo del formulario a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en el formulario */
            border-radius: 8px; /* Añade un borde redondeado para estilizar el formulario */
            padding: 20px; /* Añade un relleno para que el contenido no toque los bordes del formulario */
        }

        .bi {
            color: #fff; /* Cambia el color de los iconos Bootstrap a blanco o tu preferencia */
        }

        /* Agrega cualquier otro estilo que necesites */

    </style>


    <body>
        <main>

            <section class="hero-section d-flex justify-content-center align-items-center">

                <div class="container">
                    <div class="row d-flex justify-content-center">

                       

                        <div class="col-lg-6 col-12">
                        <form class="custom-form hero-form" action="../funciones/registro-admin.php" method="POST" role="form">
                                <h3 class="text-white mb-3 d-flex justify-content-center">Registra un lider.</h3>
                                  
                                  <?php
                                if (isset($_GET['error'])) {
                                    $errorRegistro = $_GET['error'];
                                    echo '<div class="alert alert-danger">' . $errorRegistro . '</div>';
                                }
                                ?>

                                <div class="row">
                                    
                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>

                                            <input type="email" name="correo" id="correo" class="form-control" placeholder="Email." required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-key"></i></span>

                                            <input type="password" name="txt-clave" id="txt-clave" class="form-control" placeholder="Contraseña." required>
                                            <i class="px-2 input-group-text toggle-password bi bi-eye" onclick="togglePassword()"></i>                                            
                                        </div>
                                        <div class="col-lg-12 col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon2"><i class="bi bi-key"></i></span>

                                            <input type="password" class="form-control" placeholder="Contraseña." required>
                                            <i class="px-2 input-group-text toggle-password bi bi-eye" onclick="togglePassword()"></i>                                            
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-12">
    <button type="submit" class="form-control" style="background-color: #ffffff; color: #142e61ff;">
                                            Registrar.
                                        </button>
                                    </div>

                                    
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

       

           <!-- Header -->
    <?php
    include '../footer1.php';
    ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/scripteye.js"></script>

    </body>
</html>

