<?php
// Incluye el archivo de conexión y funciones
include '../../funciones/conex.php';
include '../../funciones/funciones.php';
session_start();

if (!isset($_SESSION['id_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: ../login.php");
    exit();
}

// Contar el número total de colegas
$sql_total_colegas = "SELECT COUNT(*) AS total_colegas FROM usuarios WHERE nivel_usuario = '2'";
$result_total_colegas = $conexion->query($sql_total_colegas);
$row_total_colegas = $result_total_colegas->fetch_assoc();
$total_colegas = $row_total_colegas['total_colegas'];

// Contar el número de colegas confirmados
$sql_colegas_confirmados = "SELECT COUNT(*) AS colegas_confirmados FROM usuarios WHERE nivel_usuario = '2' AND CONFIDENCIAL = 1";
$result_colegas_confirmados = $conexion->query($sql_colegas_confirmados);
$row_colegas_confirmados = $result_colegas_confirmados->fetch_assoc();
$colegas_confirmados = $row_colegas_confirmados['colegas_confirmados'];

// Contar el número de colegas no confirmados
$sql_colegas_no_confirmados = "SELECT COUNT(*) AS colegas_no_confirmados FROM usuarios WHERE nivel_usuario = '2' AND CONFIDENCIAL = 0";
$result_colegas_no_confirmados = $conexion->query($sql_colegas_no_confirmados);
$row_colegas_no_confirmados = $result_colegas_no_confirmados->fetch_assoc();
$colegas_no_confirmados = $row_colegas_no_confirmados['colegas_no_confirmados'];
?>

<?php include 'header-admin.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Descender lider</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../../css/tooplate-gotto-job.css" rel="stylesheet">
    <link href="../../css/index.css" rel="stylesheet">
    <link href="../../css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/logo simple.svg" />

    <style>
        .contenedorgral {
            background-color: #142e61ff;
            color: #fff;
            height: 100% !important;
            margin-top: 125px;
        }

        h1 {
            margin-bottom: 00px;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            max-width: 800px;
            color: black;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #6d809c;
        }

        #detalle-propiedad .descripcion tr:nth-child(odd) {
            background-color: #6d809c;
        }

        th, td {
            padding: 1px 10px;
        }

        tr:nth-child(even) {
            background-color: #fff;
            border: 1px solid #ccc;
        }

        .contenedor-tabla {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #aaa;
            border-radius: 5px;
            margin-top: 119px;
            margin-left: auto;
            margin-right: auto;
            width: 60% !important;
            height: 90% !important;
        }

        .my-button {
            width: 100px;
            padding: 10px 20px;
            background-color: #142e61ff !important;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 180px;
        }

        .my-button1 {
            background-color: #142e61ff !important;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 50px;
        }

        .my-button:hover {
            background-color: #fff;
        }

        .my-button:active {
            background-color: #fff;
        }

        .cajita {
            border: 3px solid #ddd;
            border-radius: 5px;
            margin-left: -100px;
        }

        .icono-grande {
            font-size: 1.5em;
            margin-top: 8px;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .tabla {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .tabla th {
            background-color: #f2f2f2;
            color: #333;
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .tabla td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .tabla tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tabla tr:hover {
            background-color: #e1e1e1;
        }

        .tabla tr td[colspan='4'] {
            text-align: center;
            color: #888;
            font-style: italic;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.7);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            height: 89%;
            margin-top: 101px;
            max-width: 600px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        
        iframe {
  width: 100%; /* Hace que el iframe ocupe el ancho completo de su contenedor */
  height: 727px; /* Altura fija del iframe */
  border: none; /* Elimina el borde predeterminado del iframe */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Añade una sombra alrededor del iframe */
  border-radius: 8px; /* Bordes redondeados */
}
    </style>
</head>
<body>
    <main>
        <div class="contenedorgral">
            <br>
            <div class="contenedor-tabla">
                <form id="search-form" action="" method="get">
                    <div class="center">
                        <input class="cajita" type="text" name="id_usuario" placeholder="ID de Usuario...">
                        <button class="my-button1" type="submit"> <ion-icon name="search" class="icono-grande"></ion-icon></button>
                        <a href="Descender.php" style="color: white;" class="my-button">Ver todos los colegas</a>
                    </div>
                </form>
                <br>
                <?php
                // Incluir el archivo de conexión
                include '../funciones/conex.php';

                // Verificar si se envió una consulta de búsqueda
                if (isset($_GET['id_usuario'])) {
                    $id_usuario = $_GET['id_usuario'];
                    $sql = "SELECT id_usuario, nombre, paterno, materno, telefono, correo, nom_usuario, contraseña, escuela, tipo_usuario, nivel_usuario, departamento FROM usuarios WHERE nivel_usuario = '2' AND id_usuario = $id_usuario";
                } else {
                    $sql = "SELECT id_usuario, nombre, paterno, materno, telefono, correo, nom_usuario, contraseña, escuela, tipo_usuario, nivel_usuario, departamento FROM usuarios WHERE nivel_usuario = '2'";
                }

                // Ejecutar la consulta SQL
                $result = $conexion->query($sql);

                // Inicio de la tabla
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Paterno</th>";
                echo "<th>Materno</th>";
                echo "<th>Correo</th>";
                echo "<th>Escuela</th>";
                echo "<th>Departamento</th>";
                echo "<th>Aprobar</th>";
                echo "</tr>";

                // Mostrar los datos de cada fila
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_usuario"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["paterno"] . "</td>";
                        echo "<td>" . $row["materno"] . "</td>";
                        echo "<td>" . $row["correo"] . "</td>";
                        echo "<td>" . $row["escuela"] . "</td>";
                        echo "<td>" . $row["departamento"] . "</td>";
echo "<td><a href='#' onclick='mostrarVentana(\"baja_lider.php?id_usuario=" . $row["id_usuario"] . "\")'>Aprobar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No se encontraron usuarios con el ID de usuario proporcionado.</td></tr>";
                }

                // Cierre de la tabla
                echo "</table>";

                // Cerrar la conexión
                $conexion->close();
                ?>
            </div>
            <br><br><br><br><br>
        </div>
    </main>
   <div id="miVentana" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarVentana();">&times;</span>
        <iframe id="iframeUsuario" width="100%" height="400px" style="border:none;"></iframe>
    </div>
</div>


    <!-- Script JavaScript para manejar la ventana emergente -->
    <script>
    function mostrarVentana(url) {
        var iframe = document.getElementById("iframeUsuario");
        iframe.src = url;
        var ventana = document.getElementById("miVentana");
        ventana.style.display = "block";
    }

    function cerrarVentana() {
        var ventana = document.getElementById("miVentana");
        ventana.style.display = "none";
    }
</script>


    <?php include 'footer1.php'; ?>
    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>
