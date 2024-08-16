<?php
// Iniciar la sesión
session_start();

// Código HTML o PHP que sigue...
?>

<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Obtener los datos actuales del registro
    $sql = "SELECT id_evaluaciones, nombre, paterno, materno, departamento, N_grupo, equipo, puntualidad, responsabilidad, liderazgo, comunicacion, total, Fecha FROM evaluaciones WHERE id_evaluaciones = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        die("Error en la ejecución de la consulta: " . $stmt->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Actualizar Evaluación</title>
            <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <style>
                .hero-section {
                    background-color: #142e61ff;
                    color: #fff;
                    height: auto;
                    padding: 50px 0;
                }

                .custom-form {
                    background-color: #5c6a87ff;
                    color: #fff;
                    border-radius: 8px;
                    padding: 30px;
                    margin-bottom: 20px;
                }

                .custom-form label {
                    color: #ffffff;
                }

                .bi {
                    color: #ffffff;
                }

                .btn-cancel {
                    background-color: #ff0000;
                    color: #ffffff;
                    margin-top: 20px;
                }

                .container-center {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                }

                .form-group {
                    margin-bottom: 20px;
                }

                .form-header {
                    text-align: center;
                    margin-bottom: 20px;
                }

                .form-header h3, .form-header h3 {
                    color: black;
                    text-align: center;
                }

                .custom-form {
                    text-align: left;
                }

                .alert {
                    display: none;
                    position: fixed;
                    top: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    background-color: #4CAF50;
                    color: white;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    font-family: 'League Spartan', sans-serif;
                    font-size: 1.2em;
                    z-index: 1000;
                    animation: fadeInOut 4s forwards;
                }

                @keyframes fadeInOut {
                    0% { opacity: 0; }
                    10% { opacity: 1; }
                    90% { opacity: 1; }
                    100% { opacity: 0; }
                }

                .range-slider {
                    position: relative;
                    width: 100%;
                }

                .range-slider input[type="range"] {
                    -webkit-appearance: none;
                    width: 100%;
                    height: 10px;
                    border-radius: 5px;
                    background: #ddd;
                    outline: none;
                    opacity: 0.9;
                    transition: opacity .15s ease-in-out;
                }

                .range-slider input[type="range"]::-webkit-slider-thumb {
                    -webkit-appearance: none;
                    appearance: none;
                    width: 20px;
                    height: 20px;
                    border-radius: 50%;
                    background: #4CAF50;
                    cursor: pointer;
                }

                .range-slider input[type="range"]::-moz-range-thumb {
                    width: 20px;
                    height: 20px;
                    border-radius: 50%;
                    background: #4CAF50;
                    cursor: pointer;
                }

                .range-slider .range-value {
                    position: absolute;
                    top: -25px;
                    left: 0;
                    transform: translateX(-50%);
                    font-size: 14px;
                    font-weight: bold;
                }

                .info-horizontal {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                }

                .info-horizontal .form-group {
                    flex: 1 1 45%;
                }

                .total-container {
                    margin-top: 10px;
                    padding: 15px;
                    background-color: #4774EE;
                    border-radius: 20px;
                    text-align: center;
                }

                .total-slider input[type="range"] {
                    height: 20px;
                    width: 100%;
                }

                .total-slider .range-value {
                    font-size: 50px;
                    font-weight: bold;
                }
            </style>
        </head>
        <body>

            <!-- Header -->
            <?php include 'header_admin.php'; ?>

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="container-center">
                    <div class="col-lg-8 col-12">
                        <div class="form-header">
                            <h1 style="color: #ffffff;">Actualizar Evaluación</h1>
                        </div>
                        <form class="custom-form hero-form" action="guardar.php" method="post">
                            <input type="hidden" name="id_evaluaciones" value="<?php echo htmlspecialchars($id); ?>">
                            <div class="info-horizontal">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($row['nombre']); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="paterno">Apellido Paterno:</label>
                                    <input type="text" name="paterno" class="form-control" value="<?php echo htmlspecialchars($row['paterno']); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="materno">Apellido Materno:</label>
                                    <input type="text" name="materno" class="form-control" value="<?php echo htmlspecialchars($row['materno']); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="departamento">Departamento:</label>
                                    <input type="text" name="departamento" class="form-control" value="<?php echo htmlspecialchars($row['departamento']); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="N_grupo">Grupo:</label>
                                    <input type="text" name="N_grupo" class="form-control" value="<?php echo htmlspecialchars($row['N_grupo']); ?>" disabled>
                                </div>
                            </div>
                            <br>
                            <label for="equipo">Trabajo en Equipo:</label>
                            <div class="form-group range-slider">
                                <input type="range" id="equipo" name="equipo" class="form-control" value="<?php echo htmlspecialchars($row['equipo']); ?>" min="0" max="10" oninput="updateOutput('equipo')" required>
                                <div class="range-value" id="equipo-output"><?php echo htmlspecialchars($row['equipo']); ?></div>
                            </div>
                            <br>
                            <label for="puntualidad">Puntualidad:</label>
                            <div class="form-group range-slider">
                                <input type="range" id="puntualidad" name="puntualidad" class="form-control" value="<?php echo htmlspecialchars($row['puntualidad']); ?>" min="0" max="10" oninput="updateOutput('puntualidad')" required>
                                <div class="range-value" id="puntualidad-output"><?php echo htmlspecialchars($row['puntualidad']); ?></div>
                            </div>
                            <br>
                            <label for="responsabilidad">Responsabilidad:</label>
                            <div class="form-group range-slider">
                                <input type="range" id="responsabilidad" name="responsabilidad" class="form-control" value="<?php echo htmlspecialchars($row['responsabilidad']); ?>" min="0" max="10" oninput="updateOutput('responsabilidad')" required>
                                <div class="range-value" id="responsabilidad-output"><?php echo htmlspecialchars($row['responsabilidad']); ?></div>
                            </div>
                            <br>
                            <label for="liderazgo">Liderazgo:</label>
                            <div class="form-group range-slider">
                               <input type="range" id="liderazgo" name="liderazgo" class="form-control" value="<?php echo htmlspecialchars($row['liderazgo']); ?>" min="0" max="10" oninput="updateOutput('liderazgo')" required>
                                <div class="range-value" id="liderazgo-output"><?php echo htmlspecialchars($row['liderazgo']); ?></div>
                            </div>
                            <br>
                            <label for="comunicacion">Comunicación:</label>
                            <div class="form-group range-slider">
                               <input type="range" id="comunicacion" name="comunicacion" class="form-control" value="<?php echo htmlspecialchars($row['comunicacion']); ?>" min="0" max="10" oninput="updateOutput('comunicacion')" required>
                                <div class="range-value" id="comunicacion-output"><?php echo htmlspecialchars($row['comunicacion']); ?></div>
                            </div>
                            <br>
                            <div class="total-container">
                                <div class="form-group total-slider">
                                    <label for="total">Total (%):</label>
                                    <input type="range" id="total" name="total" class="form-control" value="<?php echo htmlspecialchars(($row['total'] / 50) * 10); ?>" min="0" max="10" readonly>
                                    <div class="range-value" id="total-output"><?php echo htmlspecialchars(($row['total'] / 50) * 10); ?></div>
                                </div>
                            </div>
                            <br>
                            <center><button type="submit" class="btn btn-primary">Actualizar</button></center>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <?php include 'footer1.php'; ?>

            <script>
                function updateOutput(id) {
                    var slider = document.getElementById(id);
                    var output = document.getElementById(id + '-output');
                    output.innerHTML = slider.value;
                    output.style.left = `calc(${slider.value * 10}% - ${slider.value * 1.5}px)`;
                    updateSliderColor(slider);
                    calcularTotal();
                }

                function updateSliderColor(slider) {
                    var percentage = slider.value * 10;
                    var r = percentage < 50 ? 255 : Math.floor(510 - 5.1 * percentage);
                    var g = percentage > 50 ? 255 : Math.floor(5.1 * percentage);
                    var color = `rgb(${r}, ${g}, 0)`;
                    slider.style.background = `linear-gradient(90deg, ${color} ${percentage}%, #ddd ${percentage}%)`;
                }

                function calcularTotal() {
                    var equipo = parseFloat(document.getElementById('equipo').value) || 0;
                    var puntualidad = parseFloat(document.getElementById('puntualidad').value) || 0;
                    var responsabilidad = parseFloat(document.getElementById('responsabilidad').value) || 0;
                    var liderazgo = parseFloat(document.getElementById('liderazgo').value) || 0;
                    var comunicacion = parseFloat(document.getElementById('comunicacion').value) || 0;
                    var total = (equipo + puntualidad + responsabilidad + liderazgo + comunicacion) / 5; 
                    var totalSlider = document.getElementById('total');
                    totalSlider.value = total.toFixed(2);
                    var output = document.getElementById('total-output');
                    output.innerHTML = total.toFixed(2);
                    output.style.left = `calc(${total * 10}% - ${total * 1.5}px)`;
                    updateSliderColor(totalSlider);
                }

                document.addEventListener('DOMContentLoaded', function() {
                    updateOutput('equipo');
                    updateOutput('puntualidad');
                    updateOutput('responsabilidad');
                    updateOutput('liderazgo');
                    updateOutput('comunicacion');
                });
            </script>
            <!-- JS FILES -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>

        <?php
    } else {
        echo "Registro no encontrado";
    }

    $stmt->close();
    $conn->close();
}
?>
