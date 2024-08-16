<?php include 'header_admin.php'; ?>
<br>
<br>
<?php
$conn = new mysqli("localhost", "u880452948_rootdenedig", "A6-;wO23yN", "u880452948_denedig");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT e.id_evaluaciones, u.id_usuario, e.nombre, e.paterno, e.materno, e.departamento, e.N_grupo, e.equipo, e.puntualidad, e.responsabilidad, e.liderazgo, e.total, e.comunicacion, e.Fecha 
        FROM evaluaciones e
        JOIN usuarios u ON e.nombre COLLATE utf8mb4_unicode_ci = u.nombre COLLATE utf8mb4_unicode_ci 
        AND e.paterno COLLATE utf8mb4_unicode_ci = u.paterno COLLATE utf8mb4_unicode_ci 
        AND e.materno COLLATE utf8mb4_unicode_ci = u.materno COLLATE utf8mb4_unicode_ci
        WHERE u.colega_activo = 0 
        ORDER BY e.nombre ASC, e.total DESC";

$result = $conn->query($sql);

if ($result === false) {
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
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-danger {
            background-color: #ff0000;
            color: white;
            font-weight: bold;
        }
        .btn-primary-custom {
            background-color: #2071D8;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }
        .separator-row {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<br></br>
<br>
<br>

<div class="container">
    <center><h1 class='text-center mt-4'>Imprimir Todo el Ranking de Evaluaciones de Colegas</h1></center>
<br>
<br>
    <?php if ($result->num_rows > 0): ?>
        <div class='table-responsive'>
            <table class='table table-bordered table-striped'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Posición</th>
                        <th>ID Evaluaciones</th>
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
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                $posicion = 1;
                $current_name = "";
                while ($row = $result->fetch_assoc()) {
                    // Calcular los porcentajes
                    $equipo_porcentaje = ($row["equipo"] / 10) * 100;
                    $puntualidad_porcentaje = ($row["puntualidad"] / 10) * 100;
                    $responsabilidad_porcentaje = ($row["responsabilidad"] / 10) * 100;
                    $liderazgo_porcentaje = ($row["liderazgo"] / 10) * 100;
                    $comunicacion_porcentaje = ($row["comunicacion"] / 10) * 100;
                    $total_porcentaje = ($row["total"] / 50) * 100; // Cálculo para 100%

                    // Verificar si es un nuevo nombre para agregar una línea separadora
                    if ($current_name != $row["nombre"]) {
                        if ($current_name != "") {
                            echo "<tr class='separator-row'><td colspan='16'></td></tr>";
                        }
                        $current_name = $row["nombre"];
                    }

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
                           </td>
                          </tr>";
                    $posicion++;
                }
                ?>
                </tbody>
            </table>
        </div>
        <script>window.print();</script>
    <?php else: ?>
        <p class='text-center'>0 resultados</p>
    <?php endif; ?>
</div>

<center>
    <div class="col-lg-12 col-12 text-center mt-3">
        <a href="ranking_administrador.php" class="btn btn-primary-custom">Regresar</a>
    </div>
</center>

<!-- Footer -->
<?php include 'footer1.php'; ?>

<!-- JS FILES -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
