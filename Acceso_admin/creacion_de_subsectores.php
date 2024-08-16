<?php
// Incluye el archivo de conexión
include '../funciones/conex.php';
session_start();

if (!isset($_SESSION['id_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: ../login.php");
    exit();
}

// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'u880452948_rootdenedig', 'A6-;wO23yN', 'u880452948_denedig');
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
mysqli_set_charset($conexion, 'utf8');

// Obtener el último id_departamento para incrementar
$query_last_id = "SELECT MAX(id_departamento) AS max_id FROM Departamentos";
$result_last_id = mysqli_query($conexion, $query_last_id);
$row_last_id = mysqli_fetch_assoc($result_last_id);
$next_id = $row_last_id['max_id'] + 1;

// Agregar o actualizar un departamento si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        // Actualizar un departamento existente
        $id_departamento = $_POST['id_departamento'];
        $nombre_departamento = $_POST['Nombre_departamento'];
        $descripcion = $_POST['Descripcion'];
        $objetivos = $_POST['Objetivos']; // Añadido
        $id_usuario = $_POST['id_usuario'];

        // Obtener el nombre del usuario seleccionado
        $query_usuario = "SELECT nombre FROM usuarios WHERE id_usuario = '$id_usuario'";
        $result_usuario = mysqli_query($conexion, $query_usuario);
        $row_usuario = mysqli_fetch_assoc($result_usuario);
        $nombre_usuario = $row_usuario['nombre'];

        // Actualizar los datos del departamento en la tabla Departamentos
        $query_update = "UPDATE Departamentos SET Nombre_departamento = '$nombre_departamento', Descripcion = '$descripcion', objetivos = '$objetivos', nombre = '$nombre_usuario', id_usuario = '$id_usuario' WHERE id_departamento = '$id_departamento'";
        if (mysqli_query($conexion, $query_update)) {
            echo "Departamento actualizado exitosamente.";
        } else {
            echo "Error: " . $query_update . "<br>" . mysqli_error($conexion);
        }
    } else {
        // Agregar un nuevo departamento
        $nombre_departamento = $_POST['Nombre_departamento'];
        $descripcion = $_POST['Descripcion'];
        $objetivos = $_POST['Objetivos']; // Añadido
        $id_usuario = $_POST['id_usuario'];

        // Obtener el nombre del usuario seleccionado
        $query_usuario = "SELECT nombre FROM usuarios WHERE id_usuario = '$id_usuario'";
        $result_usuario = mysqli_query($conexion, $query_usuario);
        $row_usuario = mysqli_fetch_assoc($result_usuario);
        $nombre_usuario = $row_usuario['nombre'];

        // Insertar un nuevo registro en la tabla Departamentos
        $query = "INSERT INTO Departamentos (id_departamento, N_departamento, Nombre_departamento, Descripcion, objetivos, nombre, id_usuario) VALUES ('$next_id', '$next_id', '$nombre_departamento', '$descripcion', '$objetivos', '$nombre_usuario', '$id_usuario')";
        if (mysqli_query($conexion, $query)) {
            echo "Nuevo departamento agregado exitosamente.";
            // Incrementar el siguiente id_departamento
            $next_id++;
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conexion);
        }
    }
}

// Obtener todos los registros de la tabla Departamentos
$query = "SELECT id_departamento, Nombre_departamento, Descripcion, objetivos, nombre FROM Departamentos";
$result = mysqli_query($conexion, $query);


?>

<?php include 'header-admin.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Administrar Departamentos</title>
    <!-- CSS FILES --><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        .contenedorgral {
            background-color: #142e61ff;
            color: #fff;
            padding: 20px;
            margin-top: 50px;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 1000px !important;
            color: white;
            background-color: #f8f9fa; /* Color de fondo más claro */
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #6d809c;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            background: #f65129; /* Color original para las celdas */
        }

        tr:nth-child(even) td {
            background-color: #f88b6c; /* Color más claro para las filas pares */
        }

        tr:nth-child(odd) td {
            background-color: #f65129; /* Color original para las filas impares */
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .form-group {
            display: block;
            text-align: center; /* Centrar el contenido horizontalmente */
            margin: 0 auto; /* Asegurarse de que el contenedor esté centrado */
            margin-bottom: 10px;
            color: black;
        }
        .form-group > * {
            display: inline-block; /* Asegurarse de que los elementos hijos se alineen en línea */
            margin: 0 5px; /* Espacio entre elementos */
        }

        select, input[type="text"], textarea {
            width: 350px;
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        select {
            width: 200px;
        }

        textarea {
            width: 280px;
            height: 46px;
        }

        input[type="submit"] {
            display: block;
            margin: 10px 0;
            padding: 11px 15px;
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
            width: 280px;
            border-radius: 10px;
        }

        input[type="submit"]:hover {
            background-color: #d94a1f;
        }

        .textos {
            color: #fff;
            display: flex; /* Utilizamos flexbox para centrar vertical y horizontalmente */
            justify-content: center; /* Centra horizontalmente */
            align-items: center; /* Centra verticalmente */
        }

        .textos:hover {
            color: #fff; /* Color del texto al hacer hover */
        }

        .acomodo {
            flex-direction: row;
        }

        :root {
            --custom-btn-bg-color: #fff;
        }

        .buttons  {
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

        .buttons1  {
            display: inline;
            margin: 0px 0;
            padding: 10px 20px;
            background-color: #142e61ff;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-weight: 400;
            font-size: 12px;
            font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: 154px;
            border-radius: 10px;
        }

        .buttons:hover {
            background-color: #d94a1f;
        }
        
        .abrir {
            background-color: forestgreen;
            margin-left: 0px;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: none;
        }
        
        .expansion {
            margin-left: -6px;
            margin-top: -1px;
            width: 40px;
            height: 40px;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="contenedorgral">
<br><br><br>
        <center><h1 style="color: #fff;">Gestionar Departamentos</h1></center>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre del Departamento</th>
            <th>Usuario Encargado</th>
            <th>Objetivos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id_departamento']; ?></td>
                <td><?php echo $row['Nombre_departamento']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['objetivos']; ?></td>
                <td>
                    <button class="abrir" id="openForm"><ion-icon name="add-circle-outline" class="expansion"></ion-icon></button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>




    </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $('.abrir').on('click', function() {
        var id_departamento = $(this).closest('tr').find('td:first').text();
        Swal.fire({
            title: 'Nuevo Subsector',
            html: `
                <form id="subsectorForm" method="post" action="insert_subsector.php">
                    <input type="hidden" name="id_departamento" id="id_departamento" value="` + id_departamento + `">
                    <div class="form-group">
                        <label for="N_subsector">Número del Subsector:</label>
                        <input type="text" name="N_subsector" id="N_subsector" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_subsector">Nombre del Subsector:</label>
                        <input type="text" name="nombre_subsector" id="nombre_subsector" required>
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Descripción:</label>
                        <textarea name="Descripcion" id="Descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="objetivos">Objetivos:</label>
                        <textarea name="objetivos" id="objetivos" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_usuario">Usuario Encargado:</label>
                        <select name="id_usuario" id="id_usuario">
                            <?php
                            // Obtener los usuarios disponibles
                            $query_usuarios = "SELECT id_usuario, nombre FROM usuarios WHERE nivel_usuario = 2";
                            $result_usuarios = mysqli_query($conexion, $query_usuarios);
                            while ($row_usuario = mysqli_fetch_assoc($result_usuarios)) {
                                echo '<option value="' . $row_usuario['id_usuario'] . '">' . $row_usuario['nombre'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </form>
            `,
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            preConfirm: () => {
                const form = Swal.getPopup().querySelector('#subsectorForm');
                if (!form.reportValidity()) {
                    Swal.showValidationMessage('Por favor completa todos los campos.');
                    return false;
                }
                return true;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $('#subsectorForm').submit();
            }
        });
    });
});
</script>


</body>
</html>
<?php include 'footer1.php'; ?>
