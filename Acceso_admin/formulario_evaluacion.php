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

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_actual_id = $_SESSION['id_usuario'];
    $id_usuario = $_POST["id_usuario"];
    
    // Verificar si el id_usuario existe en la base de datos
    $sql_check_user = "SELECT id_usuario FROM usuarios WHERE id_usuario = '$id_usuario'";
    $result_check_user = $conn->query($sql_check_user);
    
    if ($result_check_user->num_rows == 0) {
        $message = "No existe el colega";
    } elseif ($usuario_actual_id == $id_usuario) {
        $message = "No puedes evaluarte a ti mismo.";
    } else {
        $nombre = $_POST["nombre"];
        $paterno = $_POST["paterno"];
        $materno = $_POST["materno"];
        $departamento = $_POST["departamento"];
        $N_grupo = $_POST["N_grupo"];
        $N_departamento = $_POST["N_departamento"];
        $equipo = $_POST["equipo"];
        $puntualidad = $_POST["puntualidad"];
        $responsabilidad = $_POST["responsabilidad"];
        $liderazgo = $_POST["liderazgo"];
        $comunicacion = $_POST["comunicacion"];
        $total = $equipo + $puntualidad + $responsabilidad + $liderazgo + $comunicacion;

        $sql = "INSERT INTO evaluaciones (nombre, paterno, materno, departamento, N_departamento, N_grupo, equipo, puntualidad, responsabilidad, liderazgo, comunicacion, total)
                VALUES ('$nombre', '$paterno', '$materno', '$departamento', '$N_departamento', '$N_grupo', '$equipo', '$puntualidad', '$responsabilidad', '$liderazgo', '$comunicacion', '$total')";

        if ($conn->query($sql) === TRUE) {
            $message = "Evaluación exitosa";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Obtener los datos del usuario actual
$usuario_actual_id = $_SESSION['id_usuario'];
$sql_actual_user = "SELECT N_grupo, N_departamento FROM usuarios WHERE id_usuario = '$usuario_actual_id'";
$result_actual_user = $conn->query($sql_actual_user);
$row_actual_user = $result_actual_user->fetch_assoc();
$N_grupo = $row_actual_user['N_grupo'];
$N_departamento = $row_actual_user['N_departamento'];

// Obtener los usuarios para la lista desplegable excluyendo al líder, los colegas inactivos, los usuarios con nivel_usuario=4, y solo del mismo grupo y departamento
$sql_users = "SELECT id_usuario, nombre, paterno, materno FROM usuarios WHERE id_usuario != '$usuario_actual_id' AND N_grupo = '$N_grupo' AND N_departamento = '$N_departamento' AND colega_activo != 1 AND nivel_usuario != 4";
$result_users = $conn->query($sql_users);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Evaluar</title>
    
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

        .alert-purple {
            background-color: purple;
            color: white;
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
            border-radius: 50px;
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
            transform: translateX(50%);
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
<?php include 'header-admin.php'; ?>

<div class="alert <?php echo $message == 'No existe el colega' ? 'alert-purple' : ''; ?>" id="alert"><?php echo $message; ?></div>

<section class="hero-section d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="form-header">
                    <h3 style="color: white;">Evaluá del 1 al 10 al colega</h3>
                </div>
                <form class="custom-form hero-form" id="evaluationForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="form_submitted" value="1">
                    <div class="info-horizontal">
                        <div class="form-group">
                            <label for="id_usuario">ID del Usuario:</label>
                            <select name="id_usuario" id="id_usuario" class="form-control" required onchange="fetchUserData()">

                                <option value="">Selecciona un usuario</option>
                                <?php
                                if ($result_users->num_rows > 0) {
                                    while($row = $result_users->fetch_assoc()) {
                                        echo "<option value='" . $row["id_usuario"] . "'>" . $row["id_usuario"] . " - " . $row["nombre"] . " " . $row["paterno"] . " " . $row["materno"] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="paterno">Apellido Paterno:</label>
                            <input type="text" name="paterno" id="paterno" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="materno">Apellido Materno:</label>
                            <input type="text" name="materno" id="materno" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tipo_usuario">Tipo de Usuario:</label>
                            <input type="text" name="tipo_usuario" id="tipo_usuario" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nivel_usuario">Nivel de Usuario:</label>
                            <input type="text" name="nivel_usuario" id="nivel_usuario" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="departamento">Departamento:</label>
                            <input type="text" name="departamento" id="departamento" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="N_grupo">Grupo:</label>
                            <input type="text" name="N_grupo" id="N_grupo" class="form-control" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="form-group range-slider">
                        <label for="equipo">Trabajo en Equipo:</label>
                        <input type="range" name="equipo" id="equipo" class="form-control" min="0" max="10" value="0" oninput="updateOutput('equipo')" required>
                        <div class="range-value" id="equipo-output">0</div>
                    </div>
                    <br>
                    <div class="form-group range-slider">
                        <label for="puntualidad">Puntualidad:</label>
                        <input type="range" name="puntualidad" id="puntualidad" class="form-control" min="0" max="10" value="0" oninput="updateOutput('puntualidad')" required>
                        <div class="range-value" id="puntualidad-output">0</div>
                    </div>
                    <br>
                    <div class="form-group range-slider">
                        <label for="responsabilidad">Responsabilidad:</label>
                        <input type="range" name="responsabilidad" id="responsabilidad" class="form-control" min="0" max="10" value="0" oninput="updateOutput('responsabilidad')" required>
                        <div class="range-value" id="responsabilidad-output">0</div>
                    </div>
                    <br>
                    <div class="form-group range-slider">
                        <label for="liderazgo">Liderazgo:</label>
                        <input type="range" name="liderazgo" id="liderazgo" class="form-control" min="0" max="10" value="0" oninput="updateOutput('liderazgo')" required>
                        <div class="range-value" id="liderazgo-output">0</div>
                    </div>
                    <br>
                    <div class="form-group range-slider">
                        <label for="comunicacion">Comunicación:</label>
                        <input type="range" name="comunicacion" id="comunicacion" class="form-control" min="0" max="10" value="0" oninput="updateOutput('comunicacion')" required>
                        <div class="range-value" id="comunicacion-output">0</div>
                    </div>
                    <br>
                    <div class="total-container">
                        <div class="form-group total-slider">
                            <label for="total">Total (%):</label>
                            <input type="range" id="total" name="total" class="form-control" min="0" max="10" readonly>
                            <div class="range-value" id="total-output">0</div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" onclick="confirmSubmission()">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include 'footer_admin.php'; ?>

<script>
    function updateOutput(id) {
        var slider = document.getElementById(id);
        var output = document.getElementById(id + '-output');
        output.innerHTML = slider.value;
        output.style.left = `calc(${slider.value * 10}% - 10px)`;
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
        output.style.left = `calc(${total * 10}% - 10px)`;
        
        updateSliderColor(totalSlider);
    }

    function confirmSubmission() {
        var confirmation = confirm("¿Estas seguro de enviar la evaluación?");
        if (confirmation) {
            document.getElementById("evaluationForm").submit();
        }
    }

    window.onload = function() {
        var message = "<?php echo $message; ?>";
        if (message) {
            var alert = document.getElementById('alert');
            alert.style.display = 'block';
        }
    }

    function fetchUserData() {
        var id_usuario = document.getElementById('id_usuario').value;
        if (id_usuario) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_user_data.php?id_usuario=' + id_usuario, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var data = JSON.parse(xhr.responseText);
                    if (data) {
                        document.getElementById('nombre').value = data.nombre;
                        document.getElementById('paterno').value = data.paterno;
                        document.getElementById('materno').value = data.materno;
                        document.getElementById('tipo_usuario').value = data.tipo_usuario;
                        document.getElementById('nivel_usuario').value = data.nivel_usuario;
                        document.getElementById('departamento').value = data.departamento;
                        document.getElementById('N_grupo').value = data.N_grupo;
                        document.getElementById('N_departamento').value = data.N_departamento;
                    }
                }
            };
            xhr.send();
        }
    }
</script>
<?php include 'footer1.php'; ?>

<!-- JS FILES -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
