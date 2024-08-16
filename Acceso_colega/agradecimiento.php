<?php
// Incluye el archivo de conexión y funciones
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();
session_start();

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agradecimiento.</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
        <link href="../css/documentacion.css" rel="stylesheet">

    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
</head>
<?php
        include 'header-colega.php';
        ?>
        <header class="site-header py-5">

<body class="Creador-y-desarrollador-page" id="top">

    <main>
    <section class="job-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12 mb-lg-4">
                <h3 style="color: white; font-size: 30px;">¡¡Felicidades!!</h3>
            </div>
            <h4 style="color: white; font-size: 25px;">Ahora notificale a tu lider de departamento para seguir con los siguientes tramites.</h4>
        </div>
    </div>
</section>
    </main>
</header>
    
    <?php
        include '../footer1.php';
    ?>

    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>
