<?php include 'header_admin.php'; ?>

<?php
$id = $_GET['id'];

$conn = new mysqli("localhost", "u880452948_rootdenedig", "A6-;wO23yN", "u880452948_denedig");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consultar la evaluación junto con el id_usuario desde la tabla usuarios
$sql = "SELECT e.*, u.id_usuario FROM evaluaciones e
        JOIN usuarios u ON e.nombre COLLATE utf8mb4_unicode_ci = u.nombre COLLATE utf8mb4_unicode_ci
                       AND e.paterno COLLATE utf8mb4_unicode_ci = u.paterno COLLATE utf8mb4_unicode_ci
                       AND e.materno COLLATE utf8mb4_unicode_ci = u.materno COLLATE utf8mb4_unicode_ci
        WHERE e.id_evaluaciones = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    $row = null;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Evaluación</title>
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
        footer {
            max-width: 90%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

<div class="container">
   <center><h1>Detalle de la Última Evaluación</h1></center>
   
   <?php if ($row): ?>
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
   <?php else: ?>
    <div class="alert alert-warning text-center">Registro no encontrado</div>
   <?php endif; ?>
   
   <div class="text-center mt-3">
       <a href="ranking_administrador.php" class="btn btn-secondary">Regresar</a>
       <button onclick="window.print()" class="btn btn-primary">Imprimir</button>
   </div>
</div>

<!-- Footer -->
<?php include 'footer1.php'; ?>

<!-- JS FILES -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
