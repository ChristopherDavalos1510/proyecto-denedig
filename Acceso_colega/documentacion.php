<?php
// Incluye el archivo de conexión y funciones
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start();

if (!isset($_SESSION['id_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: ../login.php");
    exit();
}

// Obtén el ID del usuario actual
$id_usuario = $_SESSION['id_usuario'];
$carpeta_usuario = '../documentos/' . $id_usuario;



// Esta función obtiene el nombre completo del colega basado en su ID de usuario
function obtenerNombreCompletoColega($id_usuario, $conexion) {
    $nombre_completo = "";
    // Preparar la consulta SQL para obtener el nombre completo del colega
    $sql = "SELECT CONCAT(nombre, ' ', paterno, ' ', materno) FROM usuarios WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    // Vincular el parámetro
    $stmt->bind_param("i", $id_usuario);
    // Ejecutar la consulta
    $stmt->execute();
    // Vincular el resultado
    $stmt->bind_result($nombre_completo);
    // Obtener el resultado
    $stmt->fetch();
    // Cerrar la consulta
    $stmt->close();
    return $nombre_completo;
}




// Llama a la función para obtener el nombre completo del colega
$nombre_completo = obtenerNombreCompletoColega($id_usuario, $conexion);

// Verifica si la carpeta de documentos del usuario existe, si no, créala
if (!file_exists($carpeta_usuario)) {
    mkdir($carpeta_usuario, 0777, true); // Crea la carpeta recursivamente
}
// Consulta SQL para verificar si todos los campos _LINK tienen un valor igual a '1' para el usuario actual
$sql_verificacion = "SELECT NACIMIENTO_LINK, INE_LINK, CURP_LINK, DOMICILIO_LINK, BOLETA_LINK, SALUD_LINK, CREDENCIAL_LINK, CV_LINK FROM Documentos WHERE id_usuario = ?";
$stmt_verificacion = $conexion->prepare($sql_verificacion);
$stmt_verificacion->bind_param("i", $id_usuario);
$stmt_verificacion->execute();
$stmt_verificacion->bind_result($nacimiento_link, $ine_link, $curp_link, $domicilio_link, $boleta_link, $salud_link, $credencial_link, $cv_link);
$stmt_verificacion->fetch();
$stmt_verificacion->close();

if (
    ($nacimiento_link !== '' && $nacimiento_link !== '0') &&
    ($ine_link !== '' && $ine_link !== '0') &&
    ($curp_link !== '' && $curp_link !== '0') &&
    ($domicilio_link !== '' && $domicilio_link !== '0') &&
    ($boleta_link !== '' && $boleta_link !== '0') &&
    ($salud_link !== '' && $salud_link !== '0') &&
    ($credencial_link !== '' && $credencial_link !== '0') &&
    ($cv_link !== '' && $cv_link !== '0')
) {
    // Si todos los campos _LINK tienen un valor diferente de '0' o no están en blanco, redirige a documentos_subidos.php
    header("Location: documentos_subidos.php");
} 

//Agrega el codigo en inserción por campo
$sql_insert = "INSERT INTO Documentos (id_documentos, id_usuario, NACIMIENTO, NACIMIENTO_LINK, INE, INE_LINK, CURP, CURP_LINK, DOMICILIO, DOMICILIO_LINK, BOLETA, BOLETA_LINK, SALUD, SALUD_LINK, CREDENCIAL, CREDENCIAL_LINK, cv, CV_LINK, APROBACION) VALUES (?, ?, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0)";
$stmt_insert = $conexion->prepare($sql_insert);
$stmt_insert->bind_param("ii", $id_usuario, $id_usuario);
$stmt_insert->execute();
$stmt_insert->close();

// Procesa la subida de archivos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Array con los nombres de los documentos a subir
    $documentos = array("nacimiento", "ine", "domicilio", "boleta", "salud", "credencial");

// Procesa el documento NACIMIENTO
if (isset($_FILES['nacimiento']) && $_FILES['nacimiento']['error'] === UPLOAD_ERR_OK) {
    $nombre_archivo_nacimiento = $_FILES['nacimiento']['name'];
    $archivo_temporal_nacimiento = $_FILES['nacimiento']['tmp_name'];
    
    
    
    // Nueva estructura del nombre del archivo de destino para NACIMIENTO
    $destino_nacimiento = $carpeta_usuario . '/NACIMIENTO_' . $id_usuario . '_' . $nombre_completo . '.pdf';

    if (move_uploaded_file($archivo_temporal_nacimiento, $destino_nacimiento)) {
        echo "El archivo de Acta de Nacimiento se ha subido correctamente.<br>";
        
        // Actualiza el campo NACIMIENTO y NACIMIENTO_LINK en la tabla DOCUMENTOS
        $NACIMIENTOLINK = '../documentos'.'/' . $id_usuario . '/NACIMIENTO'.'_' . $id_usuario . '_' . $nombre_completo . '.pdf';
        $sql_nacimiento = "UPDATE Documentos SET NACIMIENTO = 1, NACIMIENTO_LINK = ? WHERE id_usuario = ?";
        $stmt_nacimiento = $conexion->prepare($sql_nacimiento);
        $stmt_nacimiento->bind_param("si", $NACIMIENTOLINK, $id_usuario);
        $stmt_nacimiento->execute();
        $stmt_nacimiento->close();
    } else {
        echo "Ha ocurrido un error al subir el archivo de Acta de Nacimiento.<br>";
    }
}


// Procesa el documento INE
if (isset($_FILES['ine']) && $_FILES['ine']['error'] === UPLOAD_ERR_OK) {
    $nombre_archivo_ine = $_FILES['ine']['name'];
    $archivo_temporal_ine = $_FILES['ine']['tmp_name'];
    $destino_ine = $carpeta_usuario . '/INE_' . $id_usuario . '_' . $nombre_completo. '.pdf';;

    if (move_uploaded_file($archivo_temporal_ine, $destino_ine)) {
        
        echo "El archivo de INE se ha subido correctamente.<br>";
        
        $INELINK = '../documentos'.'/' . $id_usuario . '/INE'.'_' . $id_usuario . '_' . $nombre_completo . '.pdf';
    $sql_ine = "UPDATE Documentos SET INE = 1, INE_LINK = ? WHERE id_usuario = ?";
    $stmt_ine = $conexion->prepare($sql_ine);
    $stmt_ine->bind_param("si", $INELINK, $id_usuario);
    $stmt_ine->execute();
    $stmt_ine->close();
    } else {
        echo "Ha ocurrido un error al subir el archivo de INE.<br>";
    }
}


// Procesa el documento CURP
if (isset($_FILES['curp']) && $_FILES['curp']['error'] === UPLOAD_ERR_OK) {
    $nombre_archivo_curp = $_FILES['curp']['name'];
    $archivo_temporal_curp = $_FILES['curp']['tmp_name'];
    
    // Nueva estructura del nombre del archivo de destino para CURP
    $destino_curp = $carpeta_usuario . '/CURP_' . $id_usuario . '_' . $nombre_completo . '.pdf';

    if (move_uploaded_file($archivo_temporal_curp, $destino_curp)) {
        echo "El archivo de CURP se ha subido correctamente.<br>";
        
        // Actualiza el campo CURP y CURP_LINK en la tabla DOCUMENTOS
        $CURPLINK = '../documentos' . '/' . $id_usuario . '/CURP' . '_' . $id_usuario . '_' . $nombre_completo . '.pdf';
        $sql_curp = "UPDATE Documentos SET CURP = 1, CURP_LINK = ? WHERE id_usuario = ?";
        $stmt_curp = $conexion->prepare($sql_curp);
        $stmt_curp->bind_param("si", $CURPLINK, $id_usuario);
        $stmt_curp->execute();
        $stmt_curp->close();
    } else {
        echo "Ha ocurrido un error al subir el archivo de CURP.<br>";
    }
}



// Procesa el documento DOMICILIO
if (isset($_FILES['domicilio']) && $_FILES['domicilio']['error'] === UPLOAD_ERR_OK) {
    $nombre_archivo_domicilio = $_FILES['domicilio']['name'];
    $archivo_temporal_domicilio = $_FILES['domicilio']['tmp_name'];
    
    // Nueva estructura del nombre del archivo de destino para DOMICILIO
    $destino_domicilio = $carpeta_usuario . '/DOMICILIO_' . $id_usuario . '_' . $nombre_completo . '.pdf';

    if (move_uploaded_file($archivo_temporal_domicilio, $destino_domicilio)) {
        echo "El archivo de Comprobante de Domicilio se ha subido correctamente.<br>";
        
        // Actualiza el campo DOMICILIO y DOMICILIO_LINK en la tabla DOCUMENTOS
        $DOMICIOLINK = '../documentos' . '/' . $id_usuario . '/DOMICILIO' . '_' . $id_usuario . '_' . $nombre_completo . '.pdf';
        $sql_domicilio = "UPDATE Documentos SET DOMICILIO = 1, DOMICILIO_LINK = ? WHERE id_usuario = ?";
        $stmt_domicilio = $conexion->prepare($sql_domicilio);
        $stmt_domicilio->bind_param("si", $DOMICIOLINK, $id_usuario);
        $stmt_domicilio->execute();
        $stmt_domicilio->close();
    } else {
        echo "Ha ocurrido un error al subir el archivo de Comprobante de Domicilio.<br>";
    }
}



// Procesa el documento BOLETA
if (isset($_FILES['boleta']) && $_FILES['boleta']['error'] === UPLOAD_ERR_OK) {
    $nombre_archivo_boleta = $_FILES['boleta']['name'];
    $archivo_temporal_boleta = $_FILES['boleta']['tmp_name'];
    
    // Nueva estructura del nombre del archivo de destino para BOLETA
    $destino_boleta = $carpeta_usuario . '/BOLETA_' . $id_usuario . '_' . $nombre_completo . '.pdf';

    if (move_uploaded_file($archivo_temporal_boleta, $destino_boleta)) {
        echo "El archivo de Boleta de Calificaciones se ha subido correctamente.<br>";
        
        // Actualiza el campo BOLETA y BOLETA_LINK en la tabla DOCUMENTOS
        $BOLETALINK = '../documentos' . '/' . $id_usuario . '/BOLETA' . '_' . $id_usuario . '_' . $nombre_completo . '.pdf';
        $sql_boleta = "UPDATE Documentos SET BOLETA = 1, BOLETA_LINK = ? WHERE id_usuario = ?";
        $stmt_boleta = $conexion->prepare($sql_boleta);
        $stmt_boleta->bind_param("si", $BOLETALINK, $id_usuario);
        $stmt_boleta->execute();
        $stmt_boleta->close();
    } else {
        echo "Ha ocurrido un error al subir el archivo de Boleta de Calificaciones.<br>";
    }
}


// Procesa el documento SALUD
if (isset($_FILES['salud']) && $_FILES['salud']['error'] === UPLOAD_ERR_OK) {
    $nombre_archivo_salud = $_FILES['salud']['name'];
    $archivo_temporal_salud = $_FILES['salud']['tmp_name'];
    
    // Nueva estructura del nombre del archivo de destino para SALUD
    $destino_salud = $carpeta_usuario . '/SALUD_' . $id_usuario . '_' . $nombre_completo . '.pdf';

    if (move_uploaded_file($archivo_temporal_salud, $destino_salud)) {
        echo "El archivo de Certificado Médico se ha subido correctamente.<br>";
        
        // Actualiza el campo SALUD y SALUD_LINK en la tabla DOCUMENTOS
        $SALUDLINK = '../documentos' . '/' . $id_usuario . '/SALUD' . '_' . $id_usuario . '_' . $nombre_completo . '.pdf';
        $sql_salud = "UPDATE Documentos SET SALUD = 1, SALUD_LINK = ? WHERE id_usuario = ?";
        $stmt_salud = $conexion->prepare($sql_salud);
        $stmt_salud->bind_param("si", $SALUDLINK, $id_usuario);
        $stmt_salud->execute();
        $stmt_salud->close();
    } else {
        echo "Ha ocurrido un error al subir el archivo de Certificado Médico.<br>";
    }
}


// Procesa el documento CREDENCIAL
if (isset($_FILES['credencial']) && $_FILES['credencial']['error'] === UPLOAD_ERR_OK) {
    $nombre_archivo_credencial = $_FILES['credencial']['name'];
    $archivo_temporal_credencial = $_FILES['credencial']['tmp_name'];
    
    // Nueva estructura del nombre del archivo de destino para CREDENCIAL
    $destino_credencial = $carpeta_usuario . '/CREDENCIAL_' . $id_usuario . '_' . $nombre_completo . '.pdf';

    if (move_uploaded_file($archivo_temporal_credencial, $destino_credencial)) {
        echo "El archivo de Credencial se ha subido correctamente.<br>";
        
        // Actualiza el campo CREDENCIAL y CREDENCIAL_LINK en la tabla DOCUMENTOS
        $CREDENCIALLINK = '../documentos' . '/' . $id_usuario . '/CREDENCIAL' . '_' . $id_usuario . '_' . $nombre_completo . '.pdf';
        $sql_credencial = "UPDATE Documentos SET CREDENCIAL = 1, CREDENCIAL_LINK = ? WHERE id_usuario = ?";
        $stmt_credencial = $conexion->prepare($sql_credencial);
        $stmt_credencial->bind_param("si", $CREDENCIALLINK, $id_usuario);
        $stmt_credencial->execute();
        $stmt_credencial->close();
    } else {
        echo "Ha ocurrido un error al subir el archivo de Credencial.<br>";
    }
}

// Procesa el documento CV
if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
    $nombre_archivo_cv = $_FILES['cv']['name'];
    $archivo_temporal_cv = $_FILES['cv']['tmp_name'];
    
    // Nueva estructura del nombre del archivo de destino para CV
    $destino_cv = $carpeta_usuario . '/CV_' . $id_usuario . '_' . $nombre_completo . '.pdf';

    if (move_uploaded_file($archivo_temporal_cv, $destino_cv)) {
        echo "El archivo de CV se ha subido correctamente.<br>";
        
        // Actualiza el campo CV y CV_LINK en la tabla DOCUMENTOS
        $CVLINK = '../documentos' . '/' . $id_usuario . '/CV' . '_' . $id_usuario . '_' . $nombre_completo . '.pdf';
        $sql_cv = "UPDATE Documentos SET CV = 1, CV_LINK = ? WHERE id_usuario = ?";
        $stmt_cv = $conexion->prepare($sql_cv);
        $stmt_cv->bind_param("si", $CVLINK, $id_usuario);
        $stmt_cv->execute();
        $stmt_cv->close();
        
         // Actualiza el campo reglamento en la base de datos
    $sql = "UPDATE usuarios SET Documentos = 1 WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $stmt->close();
        
    } else {
        echo "Ha ocurrido un error al subir el archivo de CV.<br>";
    }
}

// Redirecciona a documentos_subidos.php después de subir los documentos
echo '<script>window.location.href = "documentos_subidos.php";</script>';

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
    <title>Subir Documentos</title>
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
    
<style>
    #preloader {
        display: none; /* Oculta el preloader por defecto */
        position: fixed;
        left: 0;
        top: 0;
        z-index: 999;
        width: 100%;
        height: 100%;
        overflow: visible;
        background: #142e61ff url('../images/doc.png') no-repeat center center;
    }

    #status {
        width: 200px;
        height: 200px;
        position: absolute;
        left: 50%;
        top: 50%;
        background-image: url('../images/preloader.gif');
        background-repeat: no-repeat;
        background-position: center;
        margin: -100px 0 0 -100px;
    }
</style>


    <!-- Agrega el bloque de script aquí -->
    <script>
        // Agrega un listener al campo de búsqueda para llamar a la función searchProjects cuando se escriba
        document.getElementById('job-title').addEventListener('input', searchProjects);
    </script>
    <!-- Fin del bloque de script -->
    
    
    
    
    
    
    
    
    
    
</head>


   <section class="hero-section align-items-center d-flex justify-content-center" style="background-color: #142e61ff; color: #fff; margin-top: -1350px;">
    <div class="container text-center"> <br>
        <h1 style="color: #fff;" class="mb-3">Documentos</h1>
        <div class="container py-5">
            <h2 style="color: #fff;">Sube tus documentos</h2>
            
            
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nacimiento">Selecciona el archivo de Acta de Nacimiento (PDF) (máx. 500KB):</label>
        <input style="width: 500px; margin-left: 380px;" type="file" class="form-control" id="nacimiento" name="nacimiento" accept=".pdf" onchange="validarArchivo(this, 'errorNacimiento')" required><br>
        <span id="errorNacimiento" style="color: red;"></span>
<br>
        <!-- Repite este bloque para cada campo de archivo -->
        <!-- Por ejemplo: -->
        <label for="ine" class="form-label">Selecciona el archivo de INE (PDF) (máx. 500KB):</label>
        <input style="width: 500px; margin-left: 380px;" type="file" class="form-control" id="ine" name="ine" accept=".pdf" onchange="validarArchivo(this, 'errorIne')" required><br>
        <span id="errorIne" style="color: red;"></span>
        <!-- Fin del bloque repetido -->
<br>
        <!-- Repite este bloque para cada campo de archivo -->
        <!-- Por ejemplo: -->
        <label for="curp" class="form-label">Selecciona el archivo de CURP (PDF) (máx. 500KB):</label>
        <input style="width: 500px; margin-left: 380px;" type="file" class="form-control" id="curp" name="curp" accept=".pdf" onchange="validarArchivo(this, 'errorCurp')" required><br>
        <span id="errorCurp" style="color: red;"></span>
        <!-- Fin del bloque repetido -->
<br>
        <!-- Repite este bloque para cada campo de archivo -->
        <!-- Por ejemplo: -->
        <label for="domicilio" class="form-label">Selecciona el archivo de Comprobante de Domicilio (PDF) (máx. 500KB):</label>
        <input style="width: 500px; margin-left: 380px;" type="file" class="form-control" id="domicilio" name="domicilio" accept=".pdf" onchange="validarArchivo(this, 'errorDomicilio')" required><br>
        <span id="errorDomicilio" style="color: red;"></span>
        <!-- Fin del bloque repetido -->
<br>
        <!-- Repite este bloque para cada campo de archivo -->
        <!-- Por ejemplo: -->
        <label for="boleta" class="form-label">Selecciona el archivo de Boleta de Calificaciones (PDF) (máx. 500KB):</label>
        <input style="width: 500px; margin-left: 380px;" type="file" class="form-control" id="boleta" name="boleta" accept=".pdf" onchange="validarArchivo(this, 'errorBoleta')" required><br>
        <span id="errorBoleta" style="color: red;"></span>
        <!-- Fin del bloque repetido -->
<br>
        <!-- Repite este bloque para cada campo de archivo -->
        <!-- Por ejemplo: -->
        <label for="salud" class="form-label">Selecciona el archivo de Certificado Médico (PDF) (máx. 500KB):</label>
        <input style="width: 500px; margin-left: 380px;" type="file" class="form-control" id="salud" name="salud" accept=".pdf" onchange="validarArchivo(this, 'errorSalud')" required><br>
        <span id="errorSalud" style="color: red;"></span>
        <!-- Fin del bloque repetido -->
<br>
        <!-- Repite este bloque para cada campo de archivo -->
        <!-- Por ejemplo: -->
        <label for="credencial" class="form-label">Selecciona el archivo de Credencial Escolar (PDF) (máx. 500KB):</label>
        <input style="width: 500px; margin-left: 380px;" type="file" class="form-control" id="credencial" name="credencial" accept=".pdf" onchange="validarArchivo(this, 'errorCredencial')" required><br>
        <span id="errorCredencial" style="color: red;"></span>
        <!-- Fin del bloque repetido -->
<br>
        <!-- Repite este bloque para cada campo de archivo -->
        <!-- Por ejemplo: -->
        <label for="cv" class="form-label">Selecciona el archivo de Currículum Vitae (PDF) (máx. 500KB):</label>
        <input style="width: 500px; margin-left: 380px;" type="file" class="form-control" id="cv" name="cv" accept=".pdf" onchange="validarArchivo(this, 'errorCv')" required><br>
        <span id="errorCv" style="color: red;"></span>
                </div>
<button type="submit" id="submitBtn" class="btn btn-primary" style="background-color: #f65129; border-color: #f65129; width: 200px; height: 50px; font-size: 22px;">Subir Documentos</button>
                
                <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Selecciona el formulario
        const form = document.querySelector("form");

        // Selecciona el botón de "Subir Documentos"
        const submitBtn = document.querySelector("#submitBtn");

        // Selecciona el preloader
        const preloader = document.querySelector("#preloader");

        // Agrega un listener para el evento de clic en el botón
        submitBtn.addEventListener("click", function() {
            // Muestra el preloader
            preloader.style.display = "block";
        });

        // Agrega un listener para el evento de envío del formulario
        form.addEventListener("submit", function(event) {
            // Previene el comportamiento por defecto de enviar el formulario
            event.preventDefault();

            // Ahora, puedes enviar el formulario mediante AJAX o realizar otras acciones si es necesario
            // Aquí puedes agregar el código para enviar el formulario mediante AJAX si lo deseas
            // Por ahora, solo lo dejaré como está
            form.submit();
        });
    });
</script>

            </form>
        </div>
    </div>
</section>

    <?php include 'footer1.php'; ?>

    <div id="preloader">
    <div id="status">
        <?php include '../preloads/prelds.php'; ?>
    </div>
</div>
</main>
<!-- JAVASCRIPT FILES -->



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

<script>
    function validarArchivo(input, errorId) {
        // Verifica si se seleccionó un archivo
        if (input.files.length > 0) {
            // Obtiene el tamaño del archivo seleccionado en bytes
            var fileSize = input.files[0].size;

            // Convierte el tamaño a kilobytes (KB)
            var fileSizeKB = fileSize / 1024;

            // Define el tamaño máximo permitido en KB
            var maxSizeKB = 500;

            // Verifica si el tamaño del archivo excede el tamaño máximo permitido
            if (fileSizeKB > maxSizeKB) {
                // Muestra un mensaje de error
                document.getElementById(errorId).innerText = "El archivo excede el tamaño máximo permitido (500KB).";
                // Borra el archivo seleccionado
                input.value = "";
            } else {
                // Borra cualquier mensaje de error previo si el archivo es válido
                document.getElementById(errorId).innerText = "";
            }
        }
    }
</script>



</body>
</html>