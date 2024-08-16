<?php include 'header_admin.php'; ?>
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

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$paterno = isset($_GET['paterno']) ? $_GET['paterno'] : '';
$materno = isset($_GET['materno']) ? $_GET['materno'] : '';

// Verificar que los parámetros estén presentes
if (empty($nombre) || empty($paterno) || empty($materno)) {
    die("Faltan parámetros en la URL.");
}

// Consultar todas las evaluaciones del empleado, incluyendo id_usuario desde la tabla usuarios
$sql = "SELECT u.id_usuario, e.id_evaluaciones, e.equipo, e.puntualidad, e.responsabilidad, e.liderazgo, e.comunicacion, e.total, e.Fecha 
        FROM evaluaciones e
        JOIN usuarios u ON u.nombre COLLATE utf8mb4_general_ci = e.nombre COLLATE utf8mb4_general_ci
                       AND u.paterno COLLATE utf8mb4_general_ci = e.paterno COLLATE utf8mb4_general_ci
                       AND u.materno COLLATE utf8mb4_general_ci = e.materno COLLATE utf8mb4_general_ci
        WHERE e.nombre COLLATE utf8mb4_general_ci = ? 
          AND e.paterno COLLATE utf8mb4_general_ci = ? 
          AND e.materno COLLATE utf8mb4_general_ci = ? 
        ORDER BY e.Fecha DESC";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("sss", $nombre, $paterno, $materno);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

// Almacenar los datos para las gráficas y calcular el total de efectividad
$fechas = [];
$efectividades = [];
$total_efectividad = 0;

while ($row = $result->fetch_assoc()) {
    $fechas[] = $row['Fecha']; // Deja la fecha con la hora para luego formatear en JavaScript
    $efectividad = ($row['total'] / 50) * 100; // Convertir a porcentaje
    $efectividades[] = $efectividad;
    $total_efectividad += $efectividad;
}

// Calcular el promedio de efectividad si hay evaluaciones
if (count($efectividades) > 0) {
    $total_efectividad /= count($efectividades);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Evaluaciones</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        .chart-container {
            position: relative;
            margin: auto;
            height: 40vh;
            width: 80vw;
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
        .total-efectividad-text {
            font-size: 30px; /* Ajustar tamaño de letra */
            font-family: Arial, sans-serif;
            color: black;
            font-weight: bold; /* Poner en negritas */
            text-align: right; /* Alinear a la derecha */
            position: absolute;
            top: 10px; /* Ajustar posición vertical */
            right: 50px; /* Ajustar posición horizontal */
        }
        .total-efectividad-number {
            font-size: 140px; /* Ajustar tamaño de letra */
            font-family: Arial, sans-serif;
            color: black;
            font-weight: bold; /* Poner en negritas */
            text-align: right; /* Alinear a la derecha */
            position: absolute;
            top: 60px; /* Ajustar posición vertical */
            right: 50px; /* Ajustar posición horizontal */
        }
    </style>
</head>
<body>

<div class="container printable">
    <center><h1>Historial de Evaluaciones de <?php echo htmlspecialchars($nombre . ' ' . $paterno . ' ' . $materno); ?></h1></center>
    <br>
    <div class="chart-container" style="position:relative;">
        <canvas id="efectividadChart"></canvas>
        <!-- Mover total de efectividad al lado de la gráfica -->
        <div class="total-efectividad-text">
            Total de efectividad del empleado:
        </div>
        <div class="total-efectividad-number">
            <?php echo number_format($total_efectividad, 2); ?>%
        </div>
    </div>

    <table class="table table-striped printable">
        <thead>
            <tr>
                <th>ID Usuario</th>
                <th>ID Evaluación</th>
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
        // Reiniciar el puntero del resultado
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Calcular los porcentajes
                $equipo_porcentaje = ($row["equipo"] / 10) * 100;
                $puntualidad_porcentaje = ($row["puntualidad"] / 10) * 100;
                $responsabilidad_porcentaje = ($row["responsabilidad"] / 10) * 100;
                $liderazgo_porcentaje = ($row["liderazgo"] / 10) * 100;
                $comunicacion_porcentaje = ($row["comunicacion"] / 10) * 100;
                $total_porcentaje = ($row["total"] / 50) * 100; // Cálculo para 100%

                // Determinar color según la efectividad del empleado
                $color = '';
                if ($total_porcentaje < 25) {
                    $color = 'rgba(255, 0, 0, 0.64)'; // Rojo intenso
                } elseif ($total_porcentaje < 49) {
                    $color = 'rgba(255, 165, 0, 0.86)'; // Naranja
                } elseif ($total_porcentaje < 70) {
                    $color = 'rgba(255, 255, 0, 1)'; // Amarillo
                } elseif ($total_porcentaje < 85) {
                    $color = 'rgba(173, 255, 47, 0.2)'; // Verde limón
                } else {
                    $color = 'rgba(0, 255, 0, 1)'; // Verde
                }

                echo "<tr id='evaluacion-" . $row["id_evaluaciones"] . "' style='background-color: $color;'>
                        <td>" . $row["id_usuario"] . "</td>
                        <td>" . $row["id_evaluaciones"] . "</td>
                        <td>" . $equipo_porcentaje . "%</td>
                        <td>" . $puntualidad_porcentaje . "%</td>
                        <td>" . $responsabilidad_porcentaje . "%</td>
                        <td>" . $liderazgo_porcentaje . "%</td>
                        <td>" . $comunicacion_porcentaje . "%</td>
                        <td>" . $total_porcentaje . "%</td>
                        <td>" . $row["Fecha"] . "</td>
                        <td>
                            
                            <!-- Botón de graficar para cada evaluación -->
                            <a href='graficar_evaluacion_administrador.php?id_evaluacion=" . $row["id_evaluaciones"] . "&nombre=" . urlencode($nombre) . "&paterno=" . urlencode($paterno) . "&materno=" . urlencode($materno) . "' class='btn btn-secondary'>Graficar</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No se encontraron resultados</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <div class="text-center">
        <a href="ranking_administrador.php?nombre=<?php echo htmlspecialchars($nombre); ?>&paterno=<?php echo htmlspecialchars($paterno); ?>&materno=<?php echo htmlspecialchars($materno); ?>" class="btn btn-secondary">Regresar</a>
        <a href="imprimir_historial_administrador.php?nombre=<?php echo urlencode($nombre); ?>&paterno=<?php echo urlencode($paterno); ?>&materno=<?php echo urlencode($materno); ?>" class="btn btn-primary">Imprimir Historial</a>
    </div>
</div>

<?php $conn->close(); ?>

<?php include 'footer1.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
function imprimirEvaluacion(id) {
    var divContents = document.getElementById("evaluacion-" + id).outerHTML;
    var a = window.open('', '', 'height=500, width=500');
    a.document.write('<html><head><title>Evaluación</title>');
    a.document.write('<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">');
    a.document.write('<style>.table th, .table td { text-align: center; vertical-align: middle; }</style></head><body>');
    a.document.write('<div class="container mt-5">' + divContents + '</div>');
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}

function imprimirTodo() {
    var printContents = document.querySelector('.container').outerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

// Imprimir las variables fechas y efectividades en la consola
console.log(<?php echo json_encode($fechas); ?>);
console.log(<?php echo json_encode($efectividades); ?>);

var fechas = <?php echo json_encode($fechas); ?>.map(function(fecha) {
    return fecha.split(' ')[0]; // Obtener solo la fecha y quitar la hora
});

var ctx = document.getElementById('efectividadChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: fechas,
        datasets: [{
            label: 'Efectividad del Empleado (%)',
            data: <?php echo json_encode($efectividades); ?>,
            backgroundColor: function(context) {
                var value = context.dataset.data[context.dataIndex];
                if (value < 30) {
                    return 'rgba(255, 0, 0, 0.64)'; // Rojo intenso
                } else if (value < 49) {
                    return 'rgba(255, 165, 0, 0.86)'; // Naranja
                } else if (value < 70) {
                    return 'rgba(255, 255, 0, 1)'; // Amarillo
                } else if (value < 85) {
                    return 'rgba(173, 255, 47, 0.2)'; // Verde limón
                } else {
                    return 'rgba(0, 255, 0, 1)'; // Verde
                }
            },
            borderColor: function(context) {
                var value = context.dataset.data[context.dataIndex];
                if (value < 30) {
                    return 'rgba(255, 0, 0, 1)'; // Rojo intenso
                } else if (value < 49) {
                    return 'rgba(255, 165, 0, 0.86)'; // Naranja
                } else if (value < 70) {
                    return 'rgba(255, 255, 0, 1)'; // Amarillo
                } else if (value < 85) {
                    return 'rgba(173, 255, 47, 0.2)'; // Verde limón
                } else {
                    return 'rgba(0, 255, 0, 1)'; // Verde
                }
            },
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            x: {
                ticks: {
                    font: {
                        size: 20 // Tamaño de la letra en el eje x
                    }
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    font: {
                        size: 20 // Tamaño de la letra en el eje y
                    }
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    font: {
                        size: 20 // Tamaño de la letra en la leyenda
                    }
                }
            }
        }
    }
});
</script>
</body>
</html>
