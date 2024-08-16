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

// Establecer la conexión con la base de datos
$conn = mysqli_connect('localhost', 'u880452948_rootdenedig', 'A6-;wO23yN', 'u880452948_denedig');

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Manejar la solicitud de eliminación
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id_buzon = intval($_POST['delete_id']);
    $delete_sql = "DELETE FROM buzon WHERE id_buzon = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $id_buzon);
    $stmt->execute();
    $stmt->close();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Ejecutar la consulta SQL
$sql = "SELECT id_buzon, titulo, mensaje, asunto, correo, estatus FROM buzon";
$result = $conn->query($sql);
?>

<?php include '../Acceso_admin/header-admin.php'; ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ver buzones</title>

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
    background-color: #142e61ff;
    color: #fff;
    height: 100%;
    text-align: center;
}

.tabla {
    width: 60%;
    border-collapse: collapse;
    background-color: #fff;
    color: black;
    margin: 10px auto;
}

.tabla th, .tabla td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

.tabla th {
    background-color: #f2f2f2;
    color: #333;
}

.tabla tr:nth-child(even) {
    background-color: #f2f2f2;
}

.tabla tr:hover {
    background-color: #e1e1e1;
}

.tabla tr td[colspan='5'] {
    text-align: center;
    color: #888;
    font-style: italic;
}

h2 {
    color: #fff;
    margin: 20px 0;
}

.buttons {
    position: absolute;
    right: 1700px;
    top: 115px;
}

.buttons button {
    display: block;
    margin: 10px 0;
    padding: 10px 20px;
    background-color: #f65129;
    color: #fff;
    border: none;
    cursor: pointer;
    text-decoration: none;
    font-weight: 400;
    font-size: 15px;
    font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 130px;
    border-radius: 10px;
}

.buttons button:hover {
    background-color: #F97656;
}

.tab-content {
    display: none;
}

.botondelete:hover {
    background-color: #F97656;
}
        </style>
    </head>
    <body>

    <div class="contentprimary">
        <br><br><br><br><br><br><br><br><br><br>

        <div class="buttons">
            <p style="color: #fff; font-size: 30px;">Escoje motivo</p>
            <button onclick="showTable('Personal')">Personal</button>
            <button onclick="showTable('Escolar')">Escolar</button>
            <button onclick="showTable('colega')">Colega</button>
            <button onclick="showTable('docencia')">Docencia</button>
        </div>

        <?php
            // Arrays para almacenar los datos de cada asunto
            $data = [
                'Personal' => [3 => [], 2 => [], 1 => []],
                'Escolar' => [3 => [], 2 => [], 1=> []],
                'colega' => [3 => [], 2 => [], 1 => []],
                'docencia' => [3 => [], 2 => [], 1 => []],
            ];

            // Agrupar los datos por asunto y estatus
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $asunto = htmlspecialchars($row["asunto"]);
                    $estatus = intval($row["estatus"]);
                    if (array_key_exists($asunto, $data) && in_array($estatus, [1, 2, 3])) {
                        $data[$asunto][$estatus][] = $row;
                    }
                }
            }

            // Función para crear una tabla
            function crearTabla($asunto, $rows, $nivel) {
                $titulo = '';
                if ($nivel == 1) $titulo = 'Resueltos';
                if ($nivel == 2) $titulo = 'Pendientes';
                if ($nivel == 3) $titulo = 'Faltantes';

                echo "<div id='table-$asunto-$nivel' class='tab-content'>";
                echo "<h2>Asunto: $asunto - $titulo</h2>";
                echo "<table border='1' class='tabla'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Título</th>";
                echo "<th>Correo</th>";
                echo "<th>Acción</th>";
                echo "<th>Visualizar</th>";// Nueva columna para la acción de borrar
                echo "</tr>";

                if (count($rows) > 0) {
                    foreach ($rows as $row) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id_buzon"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["titulo"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["correo"]) . "</td>";
                        echo "<td style='text-align: center;'>
                                <form method='POST' style='display:inline;' onsubmit='return confirm(\"¿Estás seguro de que quieres eliminar este registro?\");'>
                                    <input type='hidden' name='delete_id' value='" . htmlspecialchars($row["id_buzon"]) . "'>
                                    <button class='botondelete' type='submit' style='background-color: #f65129; color: #fff; border-radius: 10px; border: none; padding: 5px 10px; cursor: pointer;'>Borrar</button>
                                </form>
                              </td>";
echo "<td><button class='botondelete' type='button' onclick='redirectToEncargo(" . htmlspecialchars($row["id_buzon"]) . ")' style='background-color: #f65129; color: #fff; border-radius: 10px; border: none; padding: 5px 10px; cursor: pointer;'>Ver y Enviar encargo</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No se encontraron resultados</td></tr>";
                }

                echo "</table><br>";
                echo "</div>";
            }

            // Crear tablas para cada asunto y nivel de estatus
            foreach ($data as $asunto => $niveles) {
                foreach ($niveles as $nivel => $rows) {
                    crearTabla($asunto, $rows, $nivel);
                }
            }

            // Cerrar la conexión
            $conn->close();
        ?>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/counter.js"></script>
    <script src="../js/custom.js"></script>
<script>
    function redirectToEncargo(id) {
        // Redirigir al usuario a encargos.php con el ID como parámetro
        window.location.href = 'encargos.php?id=' + id;
    }
</script>

    <script>
        function showTable(asunto) {
            // Ocultar todas las tablas
            var contents = document.getElementsByClassName('tab-content');
            for (var i = 0; i < contents.length; i++) {
                contents[i].style.display = 'none';
            }
            // Mostrar las tablas correspondientes a los niveles de estatus del asunto
            for (var i = 1; i <= 3; i++) {
                var table = document.getElementById('table-' + asunto + '-' + i);
                if (table) {
                    table.style.display = 'block';
                }
            }
        }
    </script>
    </body>
    <?php include 'footer1.php'; ?>
</html>
