<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start();
headerDinamico($conexion);

if (isset($_POST['nom_usuario'], $_POST['correo'], $_POST['telefono'], $_POST['escuela'])) {
    // Obtener datos del formulario
    $nom_usuario = $_POST['nom_usuario'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $escuela = $_POST['escuela'];

        // Validación de teléfono
        if (!is_numeric($telefono)) {
            echo "El campo de teléfono debe contener solo números.";
        } else {
            // Verificar si se ha cargado una imagen
            if (isset($_FILES['user_photo']) && $_FILES['user_photo']['error'] === UPLOAD_ERR_OK) {
                // Directorio de destino para la imagen
                $upload_directory = '../uploads/perfil/';
                // Nombre del archivo
                $file_name = basename($_FILES['user_photo']['name']);
                // Ruta completa del archivo en el servidor
                $target_path = $upload_directory . $file_name;

                // Mover la imagen al directorio de carga
                if (move_uploaded_file($_FILES['user_photo']['tmp_name'], $target_path)) {
                    // La imagen se cargó con éxito

                    // Insertar los datos en la base de datos (usando una conexión MySQL)
                    $user = $_SESSION['Correo'];
                    $update_sql = "UPDATE usuarios SET nom_usuario = ?, correo = ?, telefono = ?, escuela = ?, imagen = ? WHERE correo = ?";
$stmt = $conexion->prepare($update_sql);
$stmt->bind_param("ssssss", $nom_usuario, $correo, $telefono, $escuela, $file_name, $user);


                    if ($stmt->execute()) {
                        header('Location: ../colegas/perfil.php');
                        exit;
                    } else {
                        echo "Error al actualizar los datos: " . $conexion->error;
                    }
                } else {
                    echo "Error al cargar la imagen.";
                }
            } else {
                echo "No se ha seleccionado una imagen.";
            }
        }
    }

// Obtener la información del usuario desde la base de datos para prellenar el formulario
$user = $_SESSION['Correo'];
$select_sql = "SELECT nom_usuario, correo, telefono, escuela FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($select_sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($nom_usuario, $correo, $telefono, $escuela);
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
    <title>Edita tu perfil</title>

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
</head>

<style>
        .site-header {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en el encabezado */
        }

        /* Agrega cualquier otro estilo que necesites */

    </style>

<style>
        .custom-form {
            background-color: #5c6a87ff; /* Cambia el color de fondo del formulario a #5c6a87ff o tu preferencia */
            color: #fff; /* Cambia el color del texto en el formulario */
            border-radius: 8px; /* Añade un borde redondeado para estilizar el formulario */
            padding: 20px; /* Añade un relleno para que el contenido no toque los bordes del formulario */
        }

        /* ... Otros estilos ... */

    </style>

<header class="site-header py-5">
<p>.</p>
    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="col-12 text-center">
                                
                            </div>
                        </div>
        <p>.</p>         
    <p>.</p>
    <p>.</p>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form class="custom-form hero-form" action="editar-perfil-usuario.php" method="post" role="form" enctype="multipart/form-data">
                <h2 class="text-center text-white mb-4">Datos del colega.</h2>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label for="nom_usuario" style="font-size: 24px;"><strong>Nombre usuario.</strong></label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-person custom-icon"></i></span>
                                <input type="text" class="form-control" id="nom_usuario" placeholder="Tu nombre." name="nom_usuario" required value="<?php echo $nom_usuario; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div a class="form-group">
                            <label for="email" style="font-size: 24px;"><strong>Correo electrónico.</strong></label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-envelope custom-icon"></i></span>
                                <input type="email" class="form-control" id="email" placeholder="tucorreo@example.com" name="correo" required value="<?php echo $correo; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label for="numero" style="font-size: 24px;"><strong>Número de teléfono.</strong></label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi-telephone custom-icon"></i></span>
                                <input type="text" class="form-control" id="numero" placeholder="Tu número." name="telefono" required value="<?php echo $telefono; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label for="escuela" style="font-size: 24px;"><strong>Escuela.</strong></label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-briefcase custom-icon"></i></span>
                                <input type="text" class="form-control" id="escuela" placeholder="Tu empresa." name="escuela" required value="<?php echo $escuela; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" style="font-size: 24px;"><strong>Subir una foto.</strong></label>
                    <input type="file" class="form-control" id="photo" name="user_photo">
                </div>
                <br>
                <div>
    <button type="submit" class="btn" style="background-color: #ffffff; color: #142e61ff;">Guardar cambios</button>
</div>    
    
    
    
    
    
    
    
    </div>
    
</header>
<p>.</p>
<p>.</p>

<body>
<main>


                </form>
            </div>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var nombreInput = document.getElementById('nom_usuario');
        var escuelaInput = document.getElementById('escuela');

        // Función para autocorregir acentos
        function autocorrectAccents(str) {
            var map = {
                'á': 'á', 'é': 'é', 'í': 'í', 'ó': 'ó', 'ú': 'ú',
                'Á': 'Á', 'É': 'É', 'Í': 'Í', 'Ó': 'Ó', 'Ú': 'Ú'
            };
            return str.replace(/[áéíóúÁÉÍÓÚ]/g, function(match) {
                return map[match];
            });
        }

        // Función para capitalizar la primera letra de la primera palabra
        function capitalizeFirstLetter(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }

        // Agrega eventos oninput a los campos
        nombreInput.addEventListener('input', function() {
            this.value = autocorrectAccents(this.value);
            this.value = capitalizeFirstLetter(this.value);
        });

        escuelaInput.addEventListener('input', function() {
            this.value = autocorrectAccents(this.value);
            this.value = capitalizeFirstLetter(this.value);
        });
    });
</script>



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