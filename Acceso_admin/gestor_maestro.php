<?php
// Incluye el archivo de conexión y funciones
include '../funciones/conex.php';
include '../funciones/funciones.php';
session_start();

if (!isset($_SESSION['id_usuario'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: ../login.php");
    exit();
}

// Contar el número total de colegas
$sql_total_colegas = "SELECT COUNT(*) AS total_colegas FROM usuarios WHERE nivel_usuario = '2'";
$result_total_colegas = $conexion->query($sql_total_colegas);
$row_total_colegas = $result_total_colegas->fetch_assoc();
$total_colegas = $row_total_colegas['total_colegas'];

// Contar el número de colegas confirmados
$sql_colegas_confirmados = "SELECT COUNT(*) AS colegas_confirmados FROM usuarios WHERE nivel_usuario = '2' AND CONFIDENCIAL = 1";
$result_colegas_confirmados = $conexion->query($sql_colegas_confirmados);
$row_colegas_confirmados = $result_colegas_confirmados->fetch_assoc();
$colegas_confirmados = $row_colegas_confirmados['colegas_confirmados'];

// Contar el número de colegas no confirmados
$sql_colegas_no_confirmados = "SELECT COUNT(*) AS colegas_no_confirmados FROM usuarios WHERE nivel_usuario = '2' AND CONFIDENCIAL = 0";
$result_colegas_no_confirmados = $conexion->query($sql_colegas_no_confirmados);
$row_colegas_no_confirmados = $result_colegas_no_confirmados->fetch_assoc();
$colegas_no_confirmados = $row_colegas_no_confirmados['colegas_no_confirmados'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];

    if (isset($_POST['link_seguimiento'])) {
        $link_seguimiento = $_POST['link_seguimiento'];

        // Actualizar el link en la base de datos
        $sql = "UPDATE usuarios SET link_seguimiento = ? WHERE id_usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("si", $link_seguimiento, $id_usuario);

        if ($stmt->execute()) {
            echo "Link actualizado exitosamente.";
        } else {
            echo "Error al actualizar el link: " . $conexion->error;
        }

        $stmt->close();
    } else {
        // Eliminar el link de la base de datos
        $sql = "UPDATE usuarios SET link_seguimiento = NULL WHERE id_usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id_usuario);

        if ($stmt->execute()) {
            echo "Link eliminado exitosamente.";
        } else {
            echo "Error al eliminar el link: " . $conexion->error;
        }

        $stmt->close();
    }

    $conexion->close();

    // Redirigir de vuelta a la página principal
    header("Location: seguimiento.php");
    exit();
}
?>


<?php include 'header-admin.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gestor maestro</title>
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
            height: 100% !important;
            margin-top: 125px;
        }

        h1 {
            margin-bottom: 00px;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            max-width: 800px;
            color: black;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #6d809c;
        }

        #detalle-propiedad .descripcion tr:nth-child(odd) {
            background-color: #6d809c;
        }

        th, td {
            padding: 1px 10px;
        }

        tr:nth-child(even) {
            background-color: #fff;
            border: 1px solid #ccc;
        }

        .contenedor-tabla {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #aaa;
            border-radius: 5px;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            width: 70% !important;
            height: 90% !important;
        }
        
                .contenedor-tabla1 {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #aaa;
            border-radius: 5px;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            width: 65% !important;
            height: 90% !important;
        }
        
        .contenedor-text {
            display: flex;
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
            background-color: #fff;
            border-radius: 5px;
            margin-top:  50px;
            margin-left: auto;
            margin-right: auto;
            width: 20% !important;
            height: 10vh;
        }

        .my-button {
            width: 100px;
            padding: 10px 20px;
            background-color: #142e61ff !important;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 120px;
        }

.my-button1 {
            width: 100%;
            padding: 10px 20px;
            background-color: #142e61ff !important;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
        }
.my-button2 {
            width: 10%;
            padding: 10px 20px;
            background-color: #142e61ff !important;
            color: white;
            border:  solid #fff;
            border-radius: 25px;            
            cursor: pointer;
            display: flex;
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
        }
      
        .my-button:hover {
            background-color: #fff;
        }

        .my-button:active {
            background-color: #fff;
        }

        .cajita {
            border: 3px solid #ddd;
            border-radius: 5px;
            margin-left: -100px;
        }

        .icono-grande {
            font-size: 1.5em;
            margin-top: 8px;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .tabla {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .tabla th {
            background-color: #f2f2f2;
            color: #333;
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .tabla td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .tabla tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tabla tr:hover {
            background-color: #e1e1e1;
        }

        .tabla tr td[colspan='4'] {
            text-align: center;
            color: #888;
            font-style: italic;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.7);
        }

        .modal-content {
             display: flex;
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            height: 88.5%;
            margin-top: 104px;
            max-width: 600px;
            color: black;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 30px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        
        iframe {
  width: 100%; /* Hace que el iframe ocupe el ancho completo de su contenedor */
  height: 727px; /* Altura fija del iframe */
  border: none; /* Elimina el borde predeterminado del iframe */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Añade una sombra alrededor del iframe */
  border-radius: 8px; /* Bordes redondeados */
}

.txt {
    margin-top: 25px;
    font-size: 40px;
}

 .modales {
  width: 250px;  
}
 
 .subirse {
  width: 100%;
  margin-top: -55px;
}

.InputContainer {
  width: 210px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(to bottom,rgb(227, 213, 255),rgb(255, 231, 231));
  border-radius: 30px;
  overflow: hidden;
  cursor: pointer;
  margin-right: 50px;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.075);
}

.input {
  width: 200px;
  height: 40px;
  border: none;
  outline: none;
  caret-color: rgb(255, 81, 0);
  background-color: rgb(255, 255, 255);
  border-radius: 30px;
  padding-left: 15px;
  letter-spacing: 0.8px;
  color: rgb(19, 19, 19);
  font-size: 13.4px;
}

.centrado {
    
    display: flex;
  align-items: center;
  justify-content: center;
}

    </style>
</head>
<body>
    <main>
        
        <div class="contenedorgral">
        <br><br>
                       <div class="centrado">

               <div class="InputContainer">
        <form method="GET" action="">
            <input type="text" class="input" name="id_usuario" placeholder="Buscar por ID de usuario">
                </div>

            <p></p> <button class="my-button2"type="submit">Buscar</button>
        </form>
        </div>
           <div class="contenedor-text">
        <p class="txt">Líderes</p>
    </div>

    <div class="contenedor-tabla1">
        <?php
        // Incluir el archivo de conexión
        include 'funciones/conex.php';

        // Verificar si se envió una consulta de búsqueda
        if (isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])) {
            $id_usuario = $_GET['id_usuario'];
            $sql = "SELECT id_usuario, nombre, paterno, materno, telefono, correo, nom_usuario, contraseña, escuela, tipo_usuario, nivel_usuario, departamento 
                    FROM usuarios 
                    WHERE nivel_usuario = '2' AND id_usuario = $id_usuario";
        } else {
            $sql = "SELECT id_usuario, nombre, paterno, materno, telefono, correo, nom_usuario, contraseña, escuela, tipo_usuario, nivel_usuario, departamento 
                    FROM usuarios 
                    WHERE nivel_usuario = '2'";
        }

        // Ejecutar la consulta SQL
        $result = $conexion->query($sql);

        // Inicio de la tabla
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Paterno</th>";
        echo "<th>Materno</th>";
        echo "<th>Teléfono</th>";
        echo "<th>Correo</th>";
        echo "<th>Contraseña</th>";
        echo "<th>Escuela</th>";
        echo "<th>Editar</th>";
        echo "</tr>";

        // Mostrar los datos de cada fila
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_usuario"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["paterno"] . "</td>";
                echo "<td>" . $row["materno"] . "</td>";
                echo "<td>" . $row["telefono"] . "</td>";
                echo "<td>" . $row["correo"] . "</td>";
                echo "<td>" . $row["contraseña"] . "</td>";
                echo "<td>" . $row["escuela"] . "</td>";
                echo "<td><button class='my-button' onclick='abrirModal(\"" . $row["id_usuario"] . "\", \"" . $row["nombre"] . "\", \"" . $row["paterno"] . "\", \"" . $row["materno"] . "\", \"" . $row["telefono"] . "\", \"" . $row["correo"] . "\", \"" . $row["contraseña"] . "\", \"" . $row["escuela"] . "\")'>Editar</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No se encontraron usuarios con el ID de usuario proporcionado.</td></tr>";
        }

        // Cierre de la tabla
        echo "</table>";
        ?>
    <script>
        function abrirModal(id, nombre, paterno, materno, telefono, correo, contrasena, escuela) {
            // Implementa la función para abrir un modal y editar los datos
            alert(`Editar usuario: ${nombre} ${paterno} ${materno}`);
        }
    </script>

<!-- Modal de Edición -->
<div id="modalEditar" class="modal">
  <div class="modal-content">
    <span class="close" onclick="cerrarModal()">&times;</span>
    <h2>Edita Informacion</h2>
<form id="formEditar" method="post" action="update_user.php">
          <input type="hidden" id="edit_id_usuario" name="id_usuario">
      Nombre:<input type="text" class="modales" id="edit_nombre" name="nombre" style="margin-left:100px;"><br><br>
      Paterno:<input type="text" class="modales" id="edit_paterno" name="paterno" style="margin-left:100px;"><br><br>
      Materno: <input type="text" class="modales" id="edit_materno" name="materno"style="margin-left:90px;"><br><br>
      Teléfono: <input type="text" class="modales" id="edit_telefono" name="telefono" style="margin-left:90px;"><br><br>
      Correo: <input type="text" class="modales" id="edit_correo" name="correo" style="margin-left:100px;"><br><br>
      Contraseña:<input type="text" class="modales" id="edit_contraseña" name="contraseña" style="margin-left:73px;"><br><br>
      Escuela: <input type="text" class="modales" id="edit_escuela" name="escuela" style="margin-left:95px;"><br><br>
      <input type="submit" class="my-button1" value="Guardar Cambios">

    </form>
    <div class="subirse">
                  <?php include 'footer1.php'; ?>
    </div>
  </div>
</div>

<script>
// Función para abrir el modal con los datos del usuario seleccionado
function abrirModal(id, nombre, paterno, materno, telefono, correo, contraseña, escuela) {
    document.getElementById("edit_id_usuario").value = id;
    document.getElementById("edit_nombre").value = nombre;
    document.getElementById("edit_paterno").value = paterno;
    document.getElementById("edit_materno").value = materno;
    document.getElementById("edit_telefono").value = telefono;
    document.getElementById("edit_correo").value = correo;
    document.getElementById("edit_contraseña").value = contraseña;
    document.getElementById("edit_escuela").value = escuela;
    document.getElementById("modalEditar").style.display = "block";
}

// Función para cerrar el modal
function cerrarModal() {
    document.getElementById("modalEditar").style.display = "none";
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Capturar el evento de envío del formulario
    $('#formEditar').submit(function(event) {
        event.preventDefault(); // Prevenir el envío normal del formulario

        // Obtener los datos del formulario
        var formData = $(this).serialize();

        // Enviar la petición Ajax
        $.ajax({
            type: 'POST',
            url: 'update_user.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                // Mostrar mensaje de éxito o error
                if (response.status === 'success') {
                    alert(response.message);
                    // Redireccionar a la página indicada en 'redirect'
                    window.location.href = response.redirect;
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al actualizar los datos:', error);
            }
        });
    });
});
</script>



            </div>
    <div class="contenedor-text">
                
               <p class="txt">Colegas </p>
               
            </div>
            
                        <div class="contenedor-tabla">
               
             
              <?php
// Incluir el archivo de conexión
include 'funciones/conex.php';

// Verificar si se envió una consulta de búsqueda
if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];
    $sql = "SELECT id_usuario, nombre, paterno, materno, telefono, correo, nom_usuario, contraseña, escuela, tipo_usuario, nivel_usuario, departamento, link_seguimiento FROM usuarios WHERE nivel_usuario = '3' AND id_usuario = $id_usuario";
} else {
    $sql = "SELECT id_usuario, nombre, paterno, materno, telefono, correo, nom_usuario, contraseña, escuela, tipo_usuario, nivel_usuario, departamento, link_seguimiento FROM usuarios WHERE nivel_usuario = '3'";
}

// Ejecutar la consulta SQL
$result = $conexion->query($sql);

// Inicio de la tabla
echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nombre</th>";
echo "<th>Paterno</th>";
echo "<th>Materno</th>";
echo "<th>telefono</th>";
echo "<th>correo</th>";
echo "<th>contraseña</th>";
echo "<th>escuela</th>";
echo "<th>editar</th>";
echo "</tr>";

// Mostrar los datos de cada fila
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_usuario"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["paterno"] . "</td>";
        echo "<td>" . $row["materno"] . "</td>";
        echo "<td>" . $row["telefono"] . "</td>";
        echo "<td>" . $row["correo"] . "</td>";
        echo "<td>" . $row["contraseña"] . "</td>";
        echo "<td>" . $row["escuela"] . "</td>";
 echo "<td><button class='my-button'onclick='abrirModal(\"" . $row["id_usuario"] . "\", \"" . $row["nombre"] . "\", \"" . $row["paterno"] . "\", \"" . $row["materno"] . "\", \"" . $row["telefono"] . "\", \"" . $row["correo"] . "\", \"" . $row["contraseña"] . "\", \"" . $row["escuela"] . "\")'>Editar</button></td>";

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No se encontraron usuarios con el ID de usuario proporcionado.</td></tr>";
}   

// Cierre de la tabla
echo "</table>";

$conexion->close();

?>



            </div>
              <br><br><br><br><br>
          
        </div>
   
</div


    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
        <?php include 'footer1.php'; ?>

</body>
</html>