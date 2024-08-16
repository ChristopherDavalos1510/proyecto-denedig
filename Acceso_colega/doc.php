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
    $carpeta_usuario = '../documentos/' . $id_usuario;
    if (!file_exists($carpeta_usuario)) {
    mkdir($carpeta_usuario, 0777, true); // Crea la carpeta recursivamente
}


    if ($stmt_select->fetch()) {
        // Cierra la consulta para obtener los datos del usuario
        $stmt_select->close();

        // Asigna el valor de la carpeta del usuario
        $carpeta_usuario = '../documentos/' . $id_colega;
        if (!file_exists($carpeta_usuario)) {
            mkdir($carpeta_usuario, 0777, true); // Crea la carpeta recursivamente
        }

        // Subir archivos a la carpeta del usuario
        $curpNombre = $_FILES['curp']['id_usuario']['name'];
        $curpTemp = $_FILES['curp']['tmp_name'];
        $curpDestino = $carpeta_usuario . '/' . $curpNombre;
        move_uploaded_file($curpTemp, $curpDestino);

        // Subir el archivo PDF del acta de nacimiento
        $actaNombre = $_FILES['acta']['id_usuario']['name'];
        $actaTemp = $_FILES['acta']['tmp_name'];
        $actaDestino = $carpeta_usuario . '/' . $actaNombre;
        move_uploaded_file($actaTemp, $actaDestino);

        // Repite este proceso para los demás archivos
        $INE_Nombre = $_FILES['INE']['id_usuario']['name'];
        $INE_Temp = $_FILES['INE']['tmp_name'];
        $INE_Destino = $carpeta_usuario . '/' . $INE_Nombre;
        move_uploaded_file($INE_Temp, $INE_Destino);

        $domicilio_Nombre = $_FILES['domicilio']['id_usuario']['name'];
        $domicilio_Temp = $_FILES['domicilio']['tmp_name'];
        $domicilio_Destino = $carpeta_usuario . '/' . $domicilio_Nombre;
        move_uploaded_file($domicilio_Temp, $domicilio_Destino);

        $boleta_Nombre = $_FILES['boleta']['id_usuario']['name'];
        $boleta_Temp = $_FILES['boleta']['tmp_name'];
        $boleta_Destino = $carpeta_usuario . '/' . $boleta_Nombre;
        move_uploaded_file($boleta_Temp, $boleta_Destino);

        $salud_Nombre = $_FILES['salud']['id_usuario']['name'];
        $salud_Temp = $_FILES['salud']['tmp_name'];
        $salud_Destino = $carpeta_usuario . '/' . $salud_Nombre;
        move_uploaded_file($salud_Temp, $salud_Destino);

        $credencial_Nombre = $_FILES['credencial']['id_usuario']['name'];
        $credencial_Temp = $_FILES['credencial']['tmp_name'];
        $credencial_Destino = $carpeta_usuario . '/' . $credencial_Nombre;
        move_uploaded_file($credencial_Temp, $credencial_Destino);

        // Guardar información en la base de datos
        $sql = "INSERT INTO documentos (id_colega, curp, acta, INE, domicilio, boleta, salud, credencial) VALUES (1, 1, 1, 1, 1, 1, 1, 1)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("isssssss", $id_colega, $curpNombre, $actaNombre, $INE_Nombre, $domicilio_Nombre, $boleta_Nombre, $salud_Nombre, $credencial_Nombre);

        // Ejecutar la consulta
        $stmt->execute();

        // Verificar si existen documentos para el usuario actual en la tabla documentos
$select_doc_sql = "SELECT id_doc FROM documentos WHERE id_colega = ?";
$stmt_select_doc = $conexion->prepare($select_doc_sql);
$stmt_select_doc->bind_param("i", $id_colega);
$stmt_select_doc->execute();
$stmt_select_doc->store_result();
$num_rows = $stmt_select_doc->num_rows;

// Si se encontraron documentos, actualiza existenciadoc a 1
if ($num_rows > 0) {
    $update_sql = "UPDATE usuarios SET existenciadoc = 1 WHERE id_usuario = ?";
    $stmt_update = $conexion->prepare($update_sql);
    $stmt_update->bind_param("s", $user);
    $stmt_update->execute();
    $stmt_update->close();
}

// Cerrar consulta
$stmt_select_doc->close();

?>
       <?php include 'header-colega.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Subir Documentos</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/documentacion.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/tooplate-gotto-job.css" rel="stylesheet">

</head>
<?php
        include 'header-colega.php';
        ?>
<body class="Creador-y-desarrollador-page" id="top">
<header class="site-header py-5">

    <main>
    <section class="job-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12 mb-lg-4">
                <h3 style= "color: white;">Subir Documentos</h3>
            </div>
            <div class="col-lg-6 col-12">
                <form action="agradecimiento.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="curp" class="form-label">Curp (PDF):</label>
                        <input type="file" class="form-control" id="curp" name="curp" accept=".pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="acta" class="form-label">Acta de Nacimiento (PDF):</label>
                        <input type="file" class="form-control" id="acta" name="acta" accept=".pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="acta" class="form-label">INE (Frente y reverso) (PDF):</label>
                        <input type="file" class="form-control" id="INE" name="INE" accept=".pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="acta" class="form-label">Comprobante de domicilio (PDF):</label>
                        <input type="file" class="form-control" id="domicilio" name="domicilio" accept=".pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="acta" class="form-label">Boleta ultimo semestre (PDF):</label>
                        <input type="file" class="form-control" id="boleta" name="boleta" accept=".pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="acta" class="form-label">Cartilla de salud (PDF):</label>
                        <input type="file" class="form-control" id="salud" name="salud" accept=".pdf" required>
                    </div>
                    <div class="mb-3">
                        <label for="acta" class="form-label">Credencial del colegio (PDF):</label>
                        <input type="file" class="form-control" id="credencial" name="credencial" accept=".pdf" required>
                    </div>
                    <br>
                    <h4 style= "color: white;">NOTA: una vez subido tus documentos ya no podras volverlos a modificar</h4>
                    <br><br>
                    
                    <button type="submit" class="btn btn-primary" style="background-color: #f65129; border-color: #f65129; width: 200px; height: 50px; font-size: 22px;">Subir Documentos</button>
                </form>
            </div>
            </form>
        </div>
        </div>

        <div class="container py-5">
            <iframe src="../reglamentos/Reglamento.pdf" margin-left = "1000px !important"; width="60%" height="700px" style="border:none;"></iframe>
            <br>
        </div>
    </section>
    
<?php include '../footer1.php'; ?>
<!-- O incluso en el pie de página -->
        <p>Usuario ID: <?php echo $_SESSION['id_usuario']; ?></p>
</main>

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>