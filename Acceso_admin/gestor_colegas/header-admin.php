<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/botonham.css" rel="stylesheet">
    
    <link rel="icon" href="../images/logo.png" type="image/svg">
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

    </style>
       <style>
        .hero-section {
            background-color: #142e61ff;
            color: #142e61ff;
            padding: 140px 0;
        }

        .container2 {
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
/* menu */

#menu ul {
 list-style:none;
 margin:0;
 padding:0;
     border-radius: 10px;
     background-color: transparent;

}

/* items del menu */

#menu ul li {
 background-color:#2e518b;
}

/* enlaces del menu */

#menu ul a {
 display:block;
 color:#fff;
 text-decoration:none;
 font-weight:400;
 font-size:15px;
 padding:10px;
 font-family:"HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
 text-transform:uppercase;
 letter-spacing:1px;
    border-radius: 10px;

}

/* items del menu */

#menu ul li {
 position:relative;
 float:left;
 margin:0;
 padding:0;
  background:#142e61ff;
  width: 70px;
   border: 2px solid #fff; 
    border-radius: 10px;
    


}

/* efecto al pasar el ratón por los items del menu */

#menu ul li:hover {
 background:#193D83;
}

.nav-link {
       font-size: 14px !important;
       margin-left: -7px;

}


/* menu desplegable */
#menu ul ul {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background: #eee;
  padding: 0;
  z-index: 1; /* Asigna un valor z-index */

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
    width: 120%;

}

/* items del menu desplegable al pasar el ratón */
#menu ul li:hover > ul {
  display: block;
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
  <li><a class="nav-link" href="../catalogoAdmin.php">Catalogo noticias.</a></li>
  <li><a class="nav-link" href="../asuntosbuzon.php">buzón.</a></li>
  <li><a class="nav-link" href="../gestor.php">Gestor administrativo.</a></li>
  <li><a class="nav-link" href="../../funciones/logout.php">Cerrar sesión.</a></li>


 <!-- extras
 <li><a class="nav-link" href="../departamentos/diseño.php">Diseño.</a></li>
 <li><a class="nav-link" href="../departamentos/ingenieria.php">Ingenieria.</a></li>
 <li><a class="nav-link" href="../departamentos/administracion.php">Administracion.</a></li>
 <li><a class="nav-link" href="../departamentos/publicidad.php">Publicidad.</a></li>
 -->

  
 </ul>
 </li>

</ul>
<!-- end menu -->
</nav>
<!-- end nav -->
                    <img src="../../images/logo.png" class="img-fluid logo-image" style="width: 200px; margin-left: 550px !important;">

        </nav>
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