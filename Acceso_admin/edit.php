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

// Obtener el id_departamento de la URL
$id_departamento = $_GET['id'];

// Obtener los datos del departamento específico
$query = "SELECT * FROM Departamentos WHERE id_departamento = '$id_departamento'";
$result = mysqli_query($conexion, $query);
$departamento = mysqli_fetch_assoc($result);

// Si no se encuentra el departamento, redirige a la página de administración de departamentos
if (!$departamento) {
    header("Location: administrar_departamentos.php");
    exit();
}

// Actualizar los datos del departamento si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_departamento = $_POST['Nombre_departamento'];
    $descripcion = $_POST['Descripcion'];
    $id_usuario = $_POST['id_usuario'];

    // Obtener el nombre del usuario seleccionado
    $query_usuario = "SELECT nombre FROM usuarios WHERE id_usuario = '$id_usuario'";
    $result_usuario = mysqli_query($conexion, $query_usuario);
    $row_usuario = mysqli_fetch_assoc($result_usuario);
    $nombre_usuario = $row_usuario['nombre'];

    // Actualizar los datos del departamento en la tabla Departamentos
    $query_update = "UPDATE Departamentos SET Nombre_departamento = '$nombre_departamento', Descripcion = '$descripcion', nombre = '$nombre_usuario', id_usuario = '$id_usuario' WHERE id_departamento = '$id_departamento'";
    if (mysqli_query($conexion, $query_update)) {
        echo "Departamento actualizado exitosamente.";
        header("Location: administrar_departamentos.php");
        exit();
    } else {
        echo "Error: " . $query_update . "<br>" . mysqli_error($conexion);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Editar Departamento</title>
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
        .contenedorgral {
            background-color: #142e61ff;
            color: #fff;
            padding: 20px;
            margin-top: 50px;
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

        select {
            width: 280px;
            padding: 13px;
            margin: 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="contenedorgral">
        <h1>Editar Departamento</h1>

        <form action="" method="post">
            <div class="form-group">
                <label for="Nombre_departamento">Nombre del Departamento:</label>
                <input type="text" id="Nombre_departamento" name="Nombre_departamento" value="<?php echo $departamento['Nombre_departamento']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Descripcion">Descripción:</label>
                <textarea id="Descripcion" name="Descripcion" required><?php echo $departamento['Descripcion']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="id_usuario">Seleccionar Usuario:</label>
                <select id="id_usuario" name="id_usuario" required>
                    <option value="">Seleccione un usuario</option>
                    <?php
                    // Obtener la lista de usuarios para el select
                    $query_usuarios = "SELECT id_usuario, nombre FROM usuarios";
                    $result_usuarios = mysqli_query($conexion, $query_usuarios);
                    while ($row_usuarios = mysqli_fetch_assoc($result_usuarios)) {
                        $selected = $row_usuarios['id_usuario'] == $departamento['id_usuario'] ? 'selected' : '';
                        echo "<option value='" . $row_usuarios['id_usuario'] . "' $selected>" . $row_usuarios['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="id_departamento" value="<?php echo $id_departamento; ?>">
            <input type="submit" name="update" value="Actualizar Departamento">
        </form>
    </div>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
