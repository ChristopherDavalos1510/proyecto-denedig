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

$id_evaluaciones = isset($_GET['id_evaluaciones']) ? intval($_GET['id_evaluaciones']) : 0;

if ($id_evaluaciones === 0) {
    die("Faltan parámetros en la URL.");
}

// Consultar la evaluación específica
$sql = "SELECT u.id_usuario, e.nombre, e.paterno, e.materno, e.departamento, e.N_grupo, e.equipo, e.puntualidad, e.responsabilidad, e.liderazgo, e.comunicacion, e.total, e.Fecha 
        FROM evaluaciones e
        JOIN usuarios u ON u.nombre COLLATE utf8mb4_general_ci = e.nombre COLLATE utf8mb4_general_ci
                       AND u.paterno COLLATE utf8mb4_general_ci = e.paterno COLLATE utf8mb4_general_ci
                       AND u.materno COLLATE utf8mb4_general_ci = e.materno COLLATE utf8mb4_general_ci
        WHERE e.id_evaluaciones = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("i", $id_evaluaciones);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Verificar si se encontró la evaluación
if (!$row) {
    die("No se encontró la evaluación.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Imprimir Evaluación</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 30px;
        }
        table thead th,
        table tbody td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-group {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .btn-group .btn {
            margin: 5px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

<?php include 'header_admin.php'; ?>

<div class="container">
    <h1 class="text-center">Detalle de la Evaluación</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Atributo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>Nombre</td><td><?php echo htmlspecialchars($row["nombre"]); ?></td></tr>
            <tr><td>Apellido Paterno</td><td><?php echo htmlspecialchars($row["paterno"]); ?></td></tr>
            <tr><td>Apellido Materno</td><td><?php echo htmlspecialchars($row["materno"]); ?></td></tr>
            <tr><td>Id_Usuario</td><td><?php echo htmlspecialchars($row["id_usuario"]); ?></td></tr>
            <tr><td>Departamento</td><td><?php echo htmlspecialchars($row["departamento"]); ?></td></tr>
            <tr><td>Número de Grupo</td><td><?php echo htmlspecialchars($row["N_grupo"]); ?></td></tr>
            <tr><td>Trabajo en Equipo</td><td><?php echo htmlspecialchars($row["equipo"] / 10 * 100); ?>%</td></tr>
            <tr><td>Puntualidad</td><td><?php echo htmlspecialchars($row["puntualidad"] / 10 * 100); ?>%</td></tr>
            <tr><td>Responsabilidad</td><td><?php echo htmlspecialchars($row["responsabilidad"] / 10 * 100); ?>%</td></tr>
            <tr><td>Liderazgo</td><td><?php echo htmlspecialchars($row["liderazgo"] / 10 * 100); ?>%</td></tr>
            <tr><td>Comunicación</td><td><?php echo htmlspecialchars($row["comunicacion"] / 10 * 100); ?>%</td></tr>
            <tr><td>Efectividad del Empleado</td><td><?php echo htmlspecialchars($row["total"] / 50 * 100); ?>%</td></tr>
            <tr><td>Fecha de Evaluación</td><td><?php echo htmlspecialchars($row["Fecha"]); ?></td></tr>
        </tbody>
    </table>
    <div class="btn-group no-print">
        <a href="historial_administrador.php?nombre=<?php echo htmlspecialchars($row["nombre"]); ?>&paterno=<?php echo htmlspecialchars($row["paterno"]); ?>&materno=<?php echo htmlspecialchars($row["materno"]); ?>" class="btn btn-secondary">Regresar</a>
        <button onclick="window.print()" class="btn btn-primary">Imprimir</button>
    </div>
</div>

<?php include 'footer1.php'; ?>

<script>
    window.onafterprint = function() {
        window.close();
    };
</script>

</body>
</html>
