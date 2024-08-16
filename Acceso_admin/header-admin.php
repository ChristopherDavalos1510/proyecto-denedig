<?php
// Con este header nos aseguramos que la sesión esté iniciada con la condición si está inicaida ya no deberá de inicarse, se muestran los datos
// del usuario en la parte superior izquierda de la pantalla

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/botonham.css" rel="stylesheet">
    <link rel="icon" href="..\images\logo.png" type="image/svg">
    <style>
        .hero-section {
            background-color: #142e61ff;
            color: #142e61ff;
            padding: 140px 0;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
        }

        @media only screen and (max-width: 767px) {
            .hero-section {
                padding: 120px 0;
            }
        }

        .fadeIn {
            animation: fadeInAnimation ease 2s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }

        @keyframes fadeInAnimation {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-brand {
            flex: 1; /* Estirar para ocupar el espacio restante */
            display: flex;
            justify-content: center; /* Centrar la imagen del logo */
        }

        .submenu a:first-child {
            display: none;
        }

        .user-info {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #2e518b;
            padding: 15px;
            border-radius: 8px;
            text-align: left;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .user-info p {
            margin: 5px 0;
        }

        /* Estilos del menú */
      #menu {
    position: relative; /* Añadir position */
    z-index: 1000; /* Asignar un z-index alto */
}

#menu ul {
    list-style: none;
    margin: 0;
    padding: 0;
    border-radius: 10px;
    background-color: transparent;
}

/* items del menu */
#menu ul li {
    background-color: #2e518b;
}

/* enlaces del menu */
#menu ul a {
    display: block;
    color: #fff;
    text-decoration: none;
    font-weight: 400;
    font-size: 15px;
    padding: 10px;
    font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-radius: 10px;
}

/* items del menu */
#menu ul li {
    position: relative;
    float: left;
    margin: 0;
    padding: 0;
    background: #142e61ff;
    width: auto;
    border: 2px solid #fff;
    border-radius: 10px;
}

/* menu desplegable */
#menu ul ul {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #eee;
    padding: 0;
    z-index: 1001; /* Asignar un z-index más alto que el menú */
}

/* items del menu desplegable */
#menu ul ul li {
    float: none;
    width: 180px;
}

/* enlaces de los items del menu desplegable */
#menu ul ul a {
    line-height: 120%;
    padding: 10px 15px;
    width: 118%;
}

/* items del menu desplegable al pasar el ratón */
#menu ul li:hover {
    background: #193D83;
}

/* submenú */
#menu ul ul ul {
    display: none;
    position: absolute;
    top: 0;
    left: 100%;
    background: #eee;
    padding: 0;
    z-index: 1002; /* Asignar un z-index más alto que el menú desplegable */
}

/* items del submenú */
#menu ul ul ul li {
    float: none;
    width: 180px;
}

/* enlaces de los items del submenú */
#menu ul ul ul a {
    line-height: 120%;
    padding: 10px 15px;
    width: 118%;
}

/* items del submenú al pasar el ratón */
#menu ul ul li:hover > ul {
    display: block;
}


/* notificaciones */
#notifications-menu {
    position: absolute;
    right: 50px; 
    top: 30px; 
    margin-right: 1px;
    margin-top: 2px;
    margin-bottom: 1px;
    padding-top:1px;
    padding-right: 1px;
    padding-bottom: 1px;
    margin-left: 1px;
    padding-left: 1px;
}

#notifications-menu ul {
    margin-right: 1px;
    margin-top: 2px;
    margin-bottom: 1px;
    padding-top:1px;
    padding-right: 1px;
    padding-bottom: 1px;
    margin-left: 1px;
    padding-left: 1px;
}
    </style>
</head>
<body>

<header id="top">
    <nav class="navbar navbar-expand-lg">
        <!-- start nav -->
        <nav id="menu" style="margin-left: 200px !important;">
        <!-- start menu -->
        <ul>
            <li><a href="#">Menú</a>
            <!-- start menu desplegable -->
            <ul>
                 <li><a class="nav-link" href="index-admin.php">Pagina principal.</a></li>
  <li><a class="nav-link" href="catalogoAdmin.php">Catalogo noticias.</a></li>
  <li><a class="nav-link" href="asuntosbuzon.php">buzón.</a></li>
  <li><a class="nav-link" href="gestor_maestro.php">Gestor maestro.</a></li>
  <li><a class="nav-link" href="seguimiento.php">Seguimiento.</a></li>
  <li><a class="nav-link" href="gestor.php">Gestor administrativo.</a></li>
  <li><a class="nav-link" href="formulario_evaluacion.php">Evaluacion.</a></li>
  <li><a class="nav-link" href="creacion_de_departamentos.php">Gestión de departamentos.</a></li>
  <li><a class="nav-link" href="cartas_admin.php">Cartas.</a></li>
  <li><a class="nav-link" href="../funciones/logout.php">Cerrar sesión.</a></li>
            </ul>
            </li>
        </ul>
        <!-- end menu -->
        </nav>
        <!-- end nav -->
        <img src="logo.png" class="img-fluid logo-image" style="width: 200px; margin-left: 550px !important;">
    </nav>
    <div class="user-info">
        <p>Nombre de Usuario: <?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] . ' ' . $_SESSION['paterno'] : 'N/A'; ?></p>
        <p>Tipo de Usuario: <?php echo isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : 'N/A'; ?></p>
        <p>Nivel de Usuario: <?php echo isset($_SESSION['nivel_usuario']) ? $_SESSION['nivel_usuario'] : 'N/A'; ?></p>
        <p>ID de Usuario: <?php echo isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : 'N/A'; ?></p>
        
    </div>
</header>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuIcon = document.querySelector('.menu-icon');
    const menu = document.getElementById('menu');

    menuIcon.addEventListener('click', function () {
        menu.classList.toggle('active'); // Alternar la clase 'active' en el menú
    });
});
</script>

</body>
</html>
