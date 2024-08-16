<?php include 'header_admin.php'; ?>
<br>
<?php
$servername = "localhost";
$username = "u880452948_rootdenedig";
$password = "A6-;wO23yN";
$dbname = "u880452948_denedig";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Manejar búsqueda
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Consultar las evaluaciones más recientes para cada empleado
$sql = "SELECT e1.*, u.id_usuario
        FROM evaluaciones e1
        JOIN (SELECT nombre, paterno, materno, MAX(Fecha) as MaxFecha
              FROM evaluaciones
              WHERE deleted = 0
              GROUP BY nombre, paterno, materno) e2
        ON e1.nombre = e2.nombre AND e1.paterno = e2.paterno AND e1.materno = e2.materno AND e1.Fecha = e2.MaxFecha
        JOIN usuarios u ON e1.nombre COLLATE utf8mb4_unicode_ci = u.nombre COLLATE utf8mb4_unicode_ci 
        AND e1.paterno COLLATE utf8mb4_unicode_ci = u.paterno COLLATE utf8mb4_unicode_ci 
        AND e1.materno COLLATE utf8mb4_unicode_ci = u.materno COLLATE utf8mb4_unicode_ci
        WHERE u.colega_activo = 0 AND e1.deleted = 0
        AND (u.id_usuario LIKE '%$search%'
        OR u.nombre LIKE '%$search%'
        OR u.paterno LIKE '%$search%'
        OR u.materno LIKE '%$search%'
        OR u.departamento LIKE '%$search%')
        ORDER BY e1.total DESC, e1.Fecha DESC";

$result = $conn->query($sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ranking de Evaluaciones de Colegas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 30px;
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
        }
        .btn-group .btn {
            flex: 1;
            margin: 5px;
        }
        table thead th,
        table tbody td {
            text-align: center;
            vertical-align: middle;
        }
        .actions {
            display: flex;
            justify-content: center;
        }
        .actions a {
            margin: 0 5px;
        }
        footer {
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }
        .confirm-delete {
            background-color: red;
            color: white;
            font-weight: bold;
        }
    </style>
    <script>
        function confirmarEliminacion() {
            return confirm('¿Deseas eliminar todo?');
        }
        
    </script>
</head>
<body>

<div class="container">
   <center><h1>Ranking de Evaluaciones de Colegas</h1></center>

    <form method="GET" action="ranking_administrador.php" class="form-inline justify-content-center">
        <div class="form-group">
            <input type="text" name="search" placeholder="Buscar..." value="<?php echo $search; ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary ml-2">Buscar</button>
        <a href="formulario_evaluacion.php" class="btn btn-success ml-2">Nuevo Registro</a>
    </form>
    <br>
     <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Evaluación</th>
                <th>ID Usuario</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Departamento</th>
                <th>Número de Grupo</th>
                <th>Trabajo en Equipo (%)</th>
                <th>Puntualidad (%)</th>
                <th>Responsabilidad (%)</th>
                <th>Liderazgo (%)</th>
                <th>Comunicación (%)</th>
                <th>Efectividad del Empleado (%)</th>
                <th>Fecha y Hora de Evaluación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            $posicion = 1;
            while($row = $result->fetch_assoc()) {
                // Calcular los porcentajes
                $equipo_porcentaje = ($row["equipo"] / 10) * 100;
                $puntualidad_porcentaje = ($row["puntualidad"] / 10) * 100;
                $responsabilidad_porcentaje = ($row["responsabilidad"] / 10) * 100;
                $liderazgo_porcentaje = ($row["liderazgo"] / 10) * 100;
                $comunicacion_porcentaje = ($row["comunicacion"] / 10) * 100;
                $total_porcentaje = ($row["total"] / 50) * 100; // Cálculo para 100%

                echo "<tr>
                        <td>" . $posicion . "</td>
                        <td>" . $row["id_evaluaciones"] . "</td>
                        <td>" . $row["id_usuario"] . "</td>
                        <td>" . $row["nombre"] . "</td>
                        <td>" . $row["paterno"] . "</td>
                        <td>" . $row["materno"] . "</td>
                        <td>" . $row["departamento"] . "</td>
                        <td>" . $row["N_grupo"] . "</td>
                        <td>" . $equipo_porcentaje . "%</td>
                        <td>" . $puntualidad_porcentaje . "%</td>
                        <td>" . $responsabilidad_porcentaje . "%</td>
                        <td>" . $liderazgo_porcentaje . "%</td>
                        <td>" . $comunicacion_porcentaje . "%</td>
                        <td>" . $total_porcentaje . "%</td>
                        <td>" . $row["Fecha"] . "</td>
                        <td class='actions'>
                            <a href='historial_administrador.php?nombre=" . urlencode($row["nombre"]) . "&paterno=" . urlencode($row["paterno"]) . "&materno=" . urlencode($row["materno"]) . "&id_usuario=" . $row["id_usuario"] . "' class='btn btn-info btn-sm'>Ver Historial</a>
                            <a href='actualizar.php?id=" . $row["id_evaluaciones"] . "' class='btn btn-warning btn-sm'>Editar</a>
                            <a href='print_administrador.php?id=" . $row["id_evaluaciones"] . "' class='btn btn-secondary btn-sm'>Imprimir</a>
                        </td>
                      </tr>";
                $posicion++;
            }
        } else {
            echo "<tr><td colspan='16'>No se encontraron resultados</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <div class="text-center">
        <a href="print_all_administrador.php" class="btn btn-secondary">Imprimir Todo</a>
   </div>
</div>

<?php $conn->close(); ?>

<?php include 'footer1.php'; ?>

<!-- JS FILES -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
