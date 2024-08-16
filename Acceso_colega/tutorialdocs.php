<?php
// Incluye el archivo de conexión y funciones
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();
session_start();


if (!isset($_SESSION['id_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: login.php");
    exit();
}

// Obtén el ID del usuario actual
$id_usuario = $_SESSION['id_usuario'];


// Verifica si se ha enviado un formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtén el ID del usuario actual
    $user = $_SESSION['Correo'];
    $select_sql = "SELECT id_usuario, nombre, paterno, materno FROM usuarios WHERE correo = ?";
    $stmt_select = $conexion->prepare($select_sql);
    $stmt_select->bind_param("s", $user);
    $stmt_select->execute();
    $stmt_select->bind_result($id_colega, $nombre, $apellido_paterno, $apellido_materno);

    if ($stmt_select->fetch()) {
        // Cierra la consulta para obtener los datos del usuario
        $stmt_select->close();

        // Asigna el valor de la carpeta del usuario
        $carpeta_usuario = '../uploads/' . $id_colega;
        if (!file_exists($carpeta_usuario)) {
            mkdir($carpeta_usuario, 0777, true); // Crea la carpeta recursivamente
        }

        // Subir archivos a la carpeta del usuario
        $curpNombre = $_FILES['curp']['name'];
        $curpTemp = $_FILES['curp']['tmp_name'];
        $curpDestino = $carpeta_usuario . '/' . $curpNombre;
        move_uploaded_file($curpTemp, $curpDestino);

        // Subir el archivo PDF del acta de nacimiento
        $actaNombre = $_FILES['acta']['name'];
        $actaTemp = $_FILES['acta']['tmp_name'];
        $actaDestino = $carpeta_usuario . '/' . $actaNombre;
        move_uploaded_file($actaTemp, $actaDestino);

        // Repite este proceso para los demás archivos
        $INE_Nombre = $_FILES['INE']['name'];
        $INE_Temp = $_FILES['INE']['tmp_name'];
        $INE_Destino = $carpeta_usuario . '/' . $INE_Nombre;
        move_uploaded_file($INE_Temp, $INE_Destino);

        $domicilio_Nombre = $_FILES['domicilio']['name'];
        $domicilio_Temp = $_FILES['domicilio']['tmp_name'];
        $domicilio_Destino = $carpeta_usuario . '/' . $domicilio_Nombre;
        move_uploaded_file($domicilio_Temp, $domicilio_Destino);

        $boleta_Nombre = $_FILES['boleta']['name'];
        $boleta_Temp = $_FILES['boleta']['tmp_name'];
        $boleta_Destino = $carpeta_usuario . '/' . $boleta_Nombre;
        move_uploaded_file($boleta_Temp, $boleta_Destino);

        $salud_Nombre = $_FILES['salud']['name'];
        $salud_Temp = $_FILES['salud']['tmp_name'];
        $salud_Destino = $carpeta_usuario . '/' . $salud_Nombre;
        move_uploaded_file($salud_Temp, $salud_Destino);

        $credencial_Nombre = $_FILES['credencial']['name'];
        $credencial_Temp = $_FILES['credencial']['tmp_name'];
        $credencial_Destino = $carpeta_usuario . '/' . $credencial_Nombre;
        move_uploaded_file($credencial_Temp, $credencial_Destino);

        // Guardar información en la base de datos
        $sql = "INSERT INTO documentos (id_colega, curp, acta, INE, domicilio, boleta, salud, credencial) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("isssssss", $id_colega, $curpNombre, $actaNombre, $INE_Nombre, $domicilio_Nombre, $boleta_Nombre, $salud_Nombre, $credencial_Nombre);

        // Ejecutar la consulta
        $stmt->execute();

        // Cerrar la conexión a la base de datos al final
        mysqli_close($conexion);
    } else {
        echo "No se pudo obtener la información del usuario.";
    }
}
?>
<?php
        include 'header-colega.php';
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tutorial documentación.</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;700&display=swap" rel="stylesheet">
</head>

<style>
        .site-header {
            background-color: #142e61ff; /* Cambia el color de fondo a azul (#007bff) o tu preferencia */
            color: #fff; /* Cambia el color del texto en el encabezado */
        }

        /* Agrega cualquier otro estilo que necesites */

    </style>
<header class="site-header py-5">
<p></p>
    <div class="container">
        <div class="row">
            
            <div class="text-center col-lg-12 col-1 mb-1 ">
                <h1 class="text-white">Tutorial de documentación.</h1>
            </div>
        </div>
    </div>


<body class="Creador-y-desarrollador-page" id="top">

    <main>
    <section class="job-section section-padding" style="margin-top: -150px;">
    <div class="container">
        <div class="row align-items-center">
            <section class="job-section section-padding">
                    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
   
                <h8 style="font-family: 'Baloo 2', cursive; font-size: 2.5em; font-weight: bold;">¡Hola colega!</h8>
                <br><br><br>
                 <h7 style="font-family: 'Baloo 2', cursive; font-size: 1.5em; margin: 0 auto; max-width: 600px;">
                A continuación te explicaré cómo entregar los documentos personales para unirte a nuestro equipo.
              Antes que nada, en todos los documentos vamos a colocar una marca de agua que diga "Copia sin valor legal".
                    Además, todos tus documentos deben seguir la siguiente estructura: NombreDocumento-NombreCompleto-Escuela.
                    Ejemplo: INE-JoseLuisAlonsoCastillo-TESI.
                </h7>
        
    <br><br>

                <h7 style="font-family: 'Baloo 2', cursive; font-size: 1.5em;">
                    <strong>INE:</strong> Es importante escanearla por el frente y el reverso.
                    <p></p>
                    <strong>CURP:</strong> Puedes escanearlo o, si lo generas en línea, simplemente descárgalo.
                    <p></p>
                    <strong> Acta de nacimiento:</strong> Debe estar escaneada.
                    <p></p>
                    <strong> Comprobante de domicilio:</strong> Debe estar escaneado.
                    <p></p>
                    <strong> Boleta escolar:</strong> Entrega escaneada la boleta escolar del último semestre.
                    <p></p>
                    <strong> Cartilla de salud:</strong> Debe escanearse por completo.
                    <p></p> 
                    <strong> Credencial del colegio:</strong> Debe entregarse escaneada.
                </h7>
                
                <br><br>
          

                <h8 style="font-family: 'Baloo 2', cursive; font-size: 2.5em; font-weight: bold;"> ¡Perfecto! ¿Ya tienes tus documentos escaneados y con la marca de agua?
                    <p></p>
                    Ahora presiona el botón de abajo para subir tus documentos.
                </h8>
                <br><br><br>
                                <a href="tutorialcompresion.php" class="btn btn-primary btn-lg btn-block" style="background-color: #f65129; border-color: #f65129;">Siguiente</a>

          </div>
        </div>
    </div>

        </div>
        </div>
    </div>
</section>

    </main>

    </section>
</header>
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
