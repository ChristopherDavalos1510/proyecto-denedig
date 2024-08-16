<?php include 'header_admin.php'; ?>
<br>
<br>
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

$id_evaluacion = isset($_GET['id_evaluacion']) ? $_GET['id_evaluacion'] : '';
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$paterno = isset($_GET['paterno']) ? $_GET['paterno'] : '';
$materno = isset($_GET['materno']) ? $_GET['materno'] : '';

// Verificar que los parámetros estén presentes
if (empty($id_evaluacion) || empty($nombre) || empty($paterno) || empty($materno)) {
    die("Faltan parámetros en la URL.");
}

// Consultar los detalles de la evaluación
$sql = "SELECT * FROM evaluaciones WHERE id_evaluaciones = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("i", $id_evaluacion);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

$evaluacion = $result->fetch_assoc();
$fecha_evaluacion = $evaluacion['Fecha'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfica de Evaluación</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            position: relative;
            margin: 0 auto; /* Centrar horizontalmente */
            height: 40vh;
            width: 80vw;
            text-align: center; /* Centrar el contenido */
        }
        @media print {
            body * {
                visibility: hidden;
            }
            .printable, .printable * {
                visibility: visible;
            }
            .printable {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>
<br>
<body>

<div class="container printable">
    <center>
        <h1>Gráfica de Evaluación de <?php echo htmlspecialchars($nombre . ' ' . $paterno . ' ' . $materno); ?></h1>
        <h3><?php echo htmlspecialchars($fecha_evaluacion); ?></h3>
    </center>
    <div class="chart-container">
        <canvas id="evaluacionChart"></canvas>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Atributo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>Nombre</td><td><?php echo htmlspecialchars($evaluacion["nombre"]); ?></td></tr>
            <tr><td>Apellido Paterno</td><td><?php echo htmlspecialchars($evaluacion["paterno"]); ?></td></tr>
            <tr><td>Apellido Materno</td><td><?php echo htmlspecialchars($evaluacion["materno"]); ?></td></tr>
            <tr><td>Id_Usuario</td><td><?php echo htmlspecialchars($evaluacion["id_usuario"]); ?></td></tr>
            <tr><td>Departamento</td><td><?php echo htmlspecialchars($evaluacion["departamento"]); ?></td></tr>
            <tr><td>Número de Grupo</td><td><?php echo htmlspecialchars($evaluacion["N_grupo"]); ?></td></tr>
            <tr><td>Trabajo en Equipo</td><td><?php echo htmlspecialchars($evaluacion["equipo"] / 10 * 100); ?>%</td></tr>
            <tr><td>Puntualidad</td><td><?php echo htmlspecialchars($evaluacion["puntualidad"] / 10 * 100); ?>%</td></tr>
            <tr><td>Responsabilidad</td><td><?php echo htmlspecialchars($evaluacion["responsabilidad"] / 10 * 100); ?>%</td></tr>
            <tr><td>Liderazgo</td><td><?php echo htmlspecialchars($evaluacion["liderazgo"] / 10 * 100); ?>%</td></tr>
            <tr><td>Comunicación</td><td><?php echo htmlspecialchars($evaluacion["comunicacion"] / 10 * 100); ?>%</td></tr>
            <tr><td>Efectividad del Empleado</td><td><?php echo htmlspecialchars($evaluacion["total"] / 50 * 100); ?>%</td></tr>
            <tr><td>Fecha de Evaluación</td><td><?php echo htmlspecialchars($evaluacion["Fecha"]); ?></td></tr>
        </tbody>
    </table>
    <div class="text-center">
        <a href="historial_administrador.php?nombre=<?php echo urlencode($nombre); ?>&paterno=<?php echo urlencode($paterno); ?>&materno=<?php echo urlencode($materno); ?>" class="btn btn-primary">Regresar</a>
        <button onclick="window.print()" class="btn btn-secondary">Imprimir</button>
    </div>
</div>

<?php $conn->close(); ?>
<br>
<br>
<script>
    // Configuración de la gráfica 
    var ctx = document.getElementById('evaluacionChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Trabajo en Equipo', 'Puntualidad', 'Responsabilidad', 'Liderazgo', 'Comunicación', 'Efectividad del Empleado'],
            datasets: [{
                label: 'Evaluación',
                data: [
                    <?php echo ($evaluacion['equipo'] / 10) * 100; ?>,
                    <?php echo ($evaluacion['puntualidad'] / 10) * 100; ?>,
                    <?php echo ($evaluacion['responsabilidad'] / 10) * 100; ?>,
                    <?php echo ($evaluacion['liderazgo'] / 10) * 100; ?>,
                    <?php echo ($evaluacion['comunicacion'] / 10) * 100; ?>,
                    <?php echo ($evaluacion['total'] / 50) * 100; ?>
                ],
                backgroundColor: [
                    <?php echo (($evaluacion['equipo'] / 10) * 100 < 30) ? 
                        "'rgba(255, 0, 0, 0.64)'" :  // Rojo intenso
                        (($evaluacion['equipo'] / 10) * 100 < 50 ? 
                            "'rgba(255, 165, 0, 0.86)'" :  // Naranja
                            (($evaluacion['equipo'] / 10) * 100 < 70 ? 
                                "'rgba(255, 255, 0, 1)'" :  // Amarillo
                                (($evaluacion['equipo'] / 10) * 100 < 85 ? 
                                    "'rgba(173, 255, 47, 0.2)'" :  // Verde limón
                                    "'rgba(0, 255, 0, 1)'"  // Verde
                                )
                            )
                        ); ?>,
                    <?php echo (($evaluacion['puntualidad'] / 10) * 100 < 30) ? 
                        "'rgba(255, 0, 0, 0.64)'" :  // Rojo intenso
                        (($evaluacion['puntualidad'] / 10) * 100 < 50 ? 
                            "'rgba(255, 165, 0, 0.86)'" :  // Naranja
                            (($evaluacion['puntualidad'] / 10) * 100 < 70 ? 
                                "'rgba(255, 255, 0, 1)'" :  // Amarillo
                                (($evaluacion['puntualidad'] / 10) * 100 < 85 ? 
                                    "'rgba(173, 255, 47, 0.2)'" :  // Verde limón
                                    "'rgba(0, 255, 0, 1)'"  // Verde
                                )
                            )
                        ); ?>,
                    <?php echo (($evaluacion['responsabilidad'] / 10) * 100 < 30) ? 
                        "'rgba(255, 0, 0, 0.64)'" :  // Rojo intenso
                        (($evaluacion['responsabilidad'] / 10) * 100 < 50 ? 
                            "'rgba(255, 165, 0, 0.86)'" :  // Naranja
                            (($evaluacion['responsabilidad'] / 10) * 100 < 70 ? 
                                "'rgba(255, 255, 0, 1)'" :  // Amarillo
                                (($evaluacion['responsabilidad'] / 10) * 100 < 85 ? 
                                    "'rgba(173, 255, 47, 0.2)'" :  // Verde limón
                                    "'rgba(0, 255, 0, 1)'"  // Verde
                                )
                            )
                        ); ?>,
                    <?php echo (($evaluacion['liderazgo'] / 10) * 100 < 30) ? 
                        "'rgba(255, 0, 0, 0.64)'" :  // Rojo intenso
                        (($evaluacion['liderazgo'] / 10) * 100 < 50 ? 
                            "'rgba(255, 165, 0, 0.86)'" :  // Naranja
                            (($evaluacion['liderazgo'] / 10) * 100 < 70 ? 
                                "'rgba(255, 255, 0, 1)'" :  // Amarillo
                                (($evaluacion['liderazgo'] / 10) * 100 < 85 ? 
                                    "'rgba(173, 255, 47, 0.2)'" :  // Verde limón
                                    "'rgba(0, 255, 0, 1)'"  // Verde
                                )
                            )
                        ); ?>,
                    <?php echo (($evaluacion['comunicacion'] / 10) * 100 < 30) ? 
                        "'rgba(255, 0, 0, 0.64)'" :  // Rojo intenso
                        (($evaluacion['comunicacion'] / 10) * 100 < 50 ? 
                            "'rgba(255, 165, 0, 0.86)'" :  // Naranja
                            (($evaluacion['comunicacion'] / 10) * 100 < 70 ? 
                                "'rgba(255, 255, 0, 1)'" :  // Amarillo
                                (($evaluacion['comunicacion'] / 10) * 100 < 85 ? 
                                    "'rgba(173, 255, 47, 0.2)'" :  // Verde limón
                                    "'rgba(0, 255, 0, 1)'"  // Verde
                                )
                            )
                        ); ?>,
                    <?php echo (($evaluacion['total'] / 50) * 100 < 30) ? 
                        "'rgba(255, 0, 0, 0.64)'" :  // Rojo intenso
                        (($evaluacion['total'] / 50) * 100 < 50 ? 
                            "'rgba(255, 165, 0, 0.86)'" :  // Naranja
                            (($evaluacion['total'] / 50) * 100 < 70 ? 
                                "'rgba(255, 255, 0, 1)'" :  // Amarillo
                                (($evaluacion['total'] / 50) * 100 < 85 ? 
                                    "'rgba(173, 255, 47, 0.2)'" :  // Verde limón
                                    "'rgba(0, 255, 0, 1)'"  // Verde
                                )
                            )
                        ); ?>
                ],
                borderColor: [
                    <?php echo (($evaluacion['equipo'] / 10) * 100 < 30) ? 
                        "'rgb(255, 0, 0)'" :  // Rojo
                        (($evaluacion['equipo'] / 10) * 100 < 50 ? 
                            "'rgb(255, 165, 0)'" :  // Naranja
                            (($evaluacion['equipo'] / 10) * 100 < 70 ? 
                                "'rgb(255, 255, 0)'" :  // Amarillo
                                (($evaluacion['equipo'] / 10) * 100 < 85 ? 
                                    "'rgb(173, 255, 47)'" :  // Verde limón
                                    "'rgb(0, 255, 0)'"  // Verde
                                )
                            )
                        ); ?>,
                    <?php echo (($evaluacion['puntualidad'] / 10) * 100 < 30) ? 
                        "'rgb(255, 0, 0)'" :  // Rojo
                        (($evaluacion['puntualidad'] / 10) * 100 < 50 ? 
                            "'rgb(255, 165, 0)'" :  // Naranja
                            (($evaluacion['puntualidad'] / 10) * 100 < 70 ? 
                                "'rgb(255, 255, 0)'" :  // Amarillo
                                (($evaluacion['puntualidad'] / 10) * 100 < 85 ? 
                                    "'rgb(173, 255, 47)'" :  // Verde limón
                                    "'rgb(0, 255, 0)'"  // Verde
                                )
                            )
                        ); ?>,
                    <?php echo (($evaluacion['responsabilidad'] / 10) * 100 < 30) ? 
                        "'rgb(255, 0, 0)'" :  // Rojo
                        (($evaluacion['responsabilidad'] / 10) * 100 < 50 ? 
                            "'rgb(255, 165, 0)'" :  // Naranja
                            (($evaluacion['responsabilidad'] / 10) * 100 < 70 ? 
                                "'rgb(255, 255, 0)'" :  // Amarillo
                                (($evaluacion['responsabilidad'] / 10) * 100 < 85 ? 
                                    "'rgb(173, 255, 47)'" :  // Verde limón
                                    "'rgb(0, 255, 0)'"  // Verde
                                )
                            )
                        ); ?>,
                    <?php echo (($evaluacion['liderazgo'] / 10) * 100 < 30) ? 
                        "'rgb(255, 0, 0)'" :  // Rojo
                        (($evaluacion['liderazgo'] / 10) * 100 < 50 ? 
                            "'rgb(255, 165, 0)'" :  // Naranja
                            (($evaluacion['liderazgo'] / 10) * 100 < 70 ? 
                                "'rgb(255, 255, 0)'" :  // Amarillo
                                (($evaluacion['liderazgo'] / 10) * 100 < 85 ? 
                                    "'rgb(173, 255, 47)'" :  // Verde limón
                                    "'rgb(0, 255, 0)'"  // Verde
                                )
                            )
                        ); ?>,
                    <?php echo (($evaluacion['comunicacion'] / 10) * 100 < 30) ? 
                        "'rgb(255, 0, 0)'" :  // Rojo
                        (($evaluacion['comunicacion'] / 10) * 100 < 50 ? 
                            "'rgb(255, 165, 0)'" :  // Naranja
                            (($evaluacion['comunicacion'] / 10) * 100 < 70 ? 
                                "'rgb(255, 255, 0)'" :  // Amarillo
                                (($evaluacion['comunicacion'] / 10) * 100 < 85 ? 
                                    "'rgb(173, 255, 47)'" :  // Verde limón
                                    "'rgb(0, 255, 0)'"  // Verde
                                )
                            )
                        ); ?>,
                    <?php echo (($evaluacion['total'] / 50) * 100 < 30) ? 
                        "'rgb(255, 0, 0)'" :  // Rojo
                        (($evaluacion['total'] / 50) * 100 < 50 ? 
                            "'rgb(255, 165, 0)'" :  // Naranja
                            (($evaluacion['total'] / 50) * 100 < 70 ? 
                                "'rgb(255, 255, 0)'" :  // Amarillo
                                (($evaluacion['total'] / 50) * 100 < 85 ? 
                                    "'rgb(173, 255, 47)'" :  // Verde limón
                                    "'rgb(0, 255, 0)'"  // Verde
                                )
                            )
                        ); ?>
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100 // Ajusta esta línea para establecer el máximo de la escala en 100
                }
            }
        }
    });
</script>

<?php include 'footer1.php';?>

</body>
</html>
