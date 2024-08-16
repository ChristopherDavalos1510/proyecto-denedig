<?php
include '../funciones/conex.php';
include '../funciones/funciones.php';
conectar();       
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit();
}

// Verifica si se ha enviado un formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtén el ID del usuario actual
    $id_usuario = $_SESSION['id_usuario'];
    
    // Asigna el valor de la carpeta del usuario
    $carpeta_usuario = '../documentos/' . $id_usuario;
    if (!file_exists($carpeta_usuario)) {
        mkdir($carpeta_usuario, 0777, true); // Crea la carpeta recursivamente
    }
    
    // Subir archivos a la carpeta del usuario
    $reglamentoNombre = $_FILES['reglamento']['name'];
    $reglamentoTemp = $_FILES['reglamento']['tmp_name'];
    $reglamentoDestino = $carpeta_usuario . '/' . $reglamentoNombre;
    move_uploaded_file($reglamentoTemp, $reglamentoDestino);
    
    // Guardar información en la base de datos
    $sql = "UPDATE usuarios SET reglamento = 1 WHERE id_usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_usuario);

    $stmt->execute();

    // Cerrar la conexión a la base de datos al final
    mysqli_close($conexion);
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
.py-5 {
    padding-top: 0.01rem !important;
    padding-bottom: 3rem !important;
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
<body>

<header id="top">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index1.php">
                <img src="images/logo.png" class="img-fluid logo-image" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav align-items-center ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index1.php">Página Principal</a>
                    </li>
                </ul>        
            </div>
        </div>
    </nav>
</header>

<main>
    <section class="hero-section d-flex justify-content-center align-items-center" style="background-color: #142e61ff; color: #fff;">
        <div class="container text-center"> <br>
            <h1 style="color: #fff;" class="mb-3">Reglamento</h1>
            <p></p>
             <div class="container py-5">
            <h style="color: #fff;"2>Sube tu reglamento firmado</h2>
            <form action="subir_reglamento.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                        <label for="reglamento" class="form-label">Reglamento (PDF):</label>
                        <input type="file" class="form-control" id="reglamento" name="reglamento" accept=".pdf" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #f65129; border-color: #f65129; width: 200px; height: 50px; font-size: 22px;">Subir Documentos</button>

        </div>
            </form>
        </div>
        </div>

        <div class="container py-5">
            <iframe src="../reglamentos/Reglamento.pdf" margin-left = "800px !important"; width="51%" height="700px" style="border:none;"></iframe>
            <br>
            <a href="../reglamentos/Reglamento.pdf" download="Reglamento.pdf" class="btn btn-primary mt-3" style="margin-left: 140px !important;">Descargar Reglamento</a>
        </div>
    </section>

<?php include '../footer1.php'; ?>

</main>

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>