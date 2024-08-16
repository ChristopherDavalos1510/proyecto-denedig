<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/botonham.css" rel="stylesheet">
    <link rel="icon" href="../images/logo.png" type="image/svg" style="display: block; margin: 0 auto;">
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
            width: 70px;
            border: 2px solid #fff;
            border-radius: 10px;
        }

        /* efecto al pasar el ratón por los items del menu */
        #menu ul li:hover {
            background: #193D83;
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

        /* notificaciones */

       /* Ajustar posición de icono de notificaciones */
       #notifications-menu {
            position: absolute;
         
            right: 455px;
            
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
            margin-right: 20px;
            margin-right: 1px;
            margin-top: 2px;
            margin-bottom: 1px;
            padding-top:1px;
            padding-right: 1px;
            padding-bottom: 1px;
            margin-left: 1px;
            padding-left: 1px;
        }

         /* Estilos del botón de notificaciones */
        #notifications-menu .notification-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #ffffff;
            color: #ffffff;
            cursor: pointer;
        }

        /* Tamaño del ícono de notificaciones */
        #notifications-menu .notification-icon img {
            width: 40px;
        }

        /* Estilos de la lista de notificaciones */
        #notifications-menu .notification-list {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            display: none;
            z-index: 2;
        }

        /* Separación entre las notificaciones */
        #notifications-menu .notification-list li {
            margin-bottom: 3px;
            border-radius: 10px;
            padding: 5px 10px;
            width: 200px;
        }
        
        /* Mostrar la lista de notificaciones al pasar el ratón */
        #notifications-menu:hover .notification-list {
            display: block;
        }

        .no-notifications {
    background-color: #142e61ff;
    color: white; /* Ajusta el color del texto para que sea legible en el fondo azul */
    padding: 5px 10px; /* Ajusta el relleno para que se vea mejor */
    border-radius: 5px; /* Ajusta el radio de borde para que coincida con otros estilos */
}

        /Color dependiendo la notificacion/
        /* Notificaciones */
        #notifications-menu .notification-list li.notification-urgente {
    background-color: rgba(213, 17, 17, 0.536);
    color: black;
}
#notifications-menu .notification-list li.notification-prioritaria {
    background-color: rgba(206, 213, 17, 0.536);
    color: black;
}
#notifications-menu .notification-list li.notification-normal {
    background-color: rgba(27, 213, 17, 0.536);
    color: black;
}


        .notification-title {
    display: block;
    text-align: center;
}

        
.notification-icon .badge.bg-danger {
    position: absolute;
    bottom: 25px;
    left: 22px;
    background-color: red;
    color: white;
    border-radius: 100%;
    padding: 10px 10px;
    font-size: 12px;
    width: 30px;
    height: 30px;
    font-size: 15px;
    padding-top: 8px;
}
.notification-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #ffffff;
    color: #ffffff;
    cursor: pointer;
    transition: transform 0.2s ease-in-out;
}

.notification-icon img {
    width: 24px;
    transition: transform 0.2s ease-in-out;
}

/* Animación de pulso */
@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}

.notification-icon.pulsating img {
    animation: pulse 0.5s infinite;
}


    </style>
</head>
<body>
<header id="top">
    <nav class="navbar navbar-expand-lg">
        <!-- start nav -->
        <nav id="menu" style="margin-left: 150px !important;">
            <!-- start menu -->
            <ul>
                <li><a href="#">Menú</a>
                    <!-- start menu desplegable -->
                    <ul>
                        <li><a class="nav-link" href="../index-colega.php">Página principal</a></li>
                        <li><a class="nav-link" href="../tutorialdocs.php">Documentación</a></li>
                        <li><a class="nav-link" href="../confidencial.php">Contrato</a></li>
                        <li><a class="nav-link" href="../reglamento.php">Reglamento</a></li>
                        <li><a class="nav-link" href="../capacitaciones.php">Capacitaciones</a></li>
                        <li><a class="nav-link" href="../cartas_empresariales.php">Cartas</a></li>
                        <li><a class="nav-link" href="../recursos.php">Recursos</a></li>
                        <li><a class="nav-link" href="../editar-perfil-usuario.php">Perfil</a></li>
                        <li><a class="nav-link" href="../../funciones/logout.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end menu -->
        </nav>
        <!-- end nav -->
        <img src="../../images/logo.png" class="img-fluid logo-image" style="width: 200px; margin-left: 550px !important;">
        <nav id="notifications-menu">
            <ul>
                    <a href="#" class="notification-icon">
                        <img src="../../img/icono-notificaciones.png" alt="Notificaciones">
                        <span class="badge bg-danger" id="count-label">0</span>
                    </a>
                    <ul class="notification-list">
                        <!-- Contenido generado por PHP -->
                        <?php

$id_usuario_actual = $_SESSION['id_usuario']; // ID del usuario actual

// Consulta SQL para seleccionar las notificaciones dirigidas al usuario actual y cuya hora programada es menor o igual a la hora actual
$sql_select = "SELECT DISTINCT id, titulo_notificación, mensaje_notificacion, tipo_notificacion, fecha_hora, vistas_usuario 
               FROM notificaciones 
               WHERE FIND_IN_SET($id_usuario_actual, id_usuario) > 0 
               AND fecha_hora <= NOW()
               UNION
               SELECT DISTINCT n.id, n.titulo_notificación, n.mensaje_notificacion, n.tipo_notificacion, n.fecha_hora, n.vistas_usuario 
               FROM notificaciones n 
               JOIN usuarios u ON FIND_IN_SET(u.N_grupo, n.N_grupo) > 0 
               WHERE FIND_IN_SET($id_usuario_actual, n.id_usuario) > 0 
               AND u.id_usuario = $id_usuario_actual 
               AND u.N_grupo = n.N_grupo 
               AND u.N_departamento = n.N_departamento 
               AND n.fecha_hora <= NOW()";

// Ejecutar la consulta
$resultado_select = mysqli_query($conexion, $sql_select);

// Verificar si hay resultados
if ($resultado_select && mysqli_num_rows($resultado_select) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado_select)) {
        $vistas_usuario_array = explode(',', $fila['vistas_usuario']);
        $vistas_usuario_actual = 0;
        foreach ($vistas_usuario_array as $vista) {
            $vista_usuario = explode(':', $vista);
            if ($vista_usuario[0] == $id_usuario_actual) {
                $vistas_usuario_actual = intval($vista_usuario[1]);
                break;
            }
        }
        if ($vistas_usuario_actual >= 5) {
            continue; // Si ha alcanzado el límite de vistas, omitir esta notificación
        }

        $tipo_notificacion = strtolower(str_replace(' ', '-', $fila['tipo_notificacion']));
        $inline_style = "";
        if ($tipo_notificacion == 'urgente') {
            $inline_style = "background-color: rgba(213, 17, 17, 0.536); color: black;";
        } elseif ($tipo_notificacion == 'prioritaria') {
            $inline_style = "background-color: rgba(206, 213, 17, 0.536); color: black;";
        } elseif ($tipo_notificacion == 'normal') {
            $inline_style = "background-color: rgba(27, 213, 17, 0.536); color: black;";
        }

        echo "<li class='notification-$tipo_notificacion' style='$inline_style' data-notification-id='{$fila['id']}'>
        <strong class='notification-title'>{$fila['titulo_notificación']}</strong>
        {$fila['mensaje_notificacion']}
        <br><strong>Prioridad:</strong> {$fila['titulo_notificación']}
        </li>";
    }
} 

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

                   
                    </ul>
            </ul>
        </nav>
    </nav>
</header>
<audio id="urgent-sound" src="../../tonoNotificación/Notificación Rojo.mp3" preload="auto"></audio>
    <audio id="priority-sound" src="../../tonoNotificación/Notificación Amarillo.mp3" preload="auto"></audio>
    <audio id="normal-sound" src="../../tonoNotificación/Notificación Verde.mp3" preload="auto"></audio>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            const notificationIcon = document.querySelector('#notifications-menu .notification-icon');
            const countLabel = document.getElementById('count-label');
            const notificationList = document.querySelector('#notifications-menu .notification-list');
            const noNotificationsMessage = document.createElement('li');
            noNotificationsMessage.textContent = 'No hay notificaciones disponibles';

            let mouseOverCount = 0;


            const urgentSound = document.getElementById('urgent-sound');
            const prioritySound = document.getElementById('priority-sound');
            const normalSound = document.getElementById('normal-sound');

            // Función para reproducir el sonido adecuado
            function playSound(type) {
                switch(type) {
                    case 'urgente':
                        urgentSound.play();
                        break;
                    case 'prioritaria':
                        prioritySound.play();
                        break;
                    case 'normal':
                        normalSound.play();
                        break;
                }
            }

            // Función para actualizar el contador
            function updateCounter() {
                let notificationCount = notificationList.children.length;
                if (notificationList.contains(noNotificationsMessage)) {
                    notificationCount = 0;
                }
                countLabel.textContent = notificationCount;
                if (notificationCount === 0) {
                    notificationList.appendChild(noNotificationsMessage);
                    notificationIcon.classList.remove('pulsating');
                } else {
                    notificationIcon.classList.add('pulsating');
                }
            }

            // Función para manejar el evento mouseover del icono de notificación y del count-label
            function handleMouseover() {
                mouseOverCount++;
                const notificationItems = document.querySelectorAll('#notifications-menu .notification-list li');
                notificationItems.forEach(function (item) {
                    const notificationId = item.getAttribute('data-notification-id');

                    // Enviar solicitud AJAX para incrementar el conteo de vistas
                    fetch('../update_views.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ notificationId: notificationId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            if (data.views >= 5) {
                                item.remove(); // Eliminar la notificación que ha sido vista 5 veces
                            }
                            // Restablecer el contador visual a 0
                            updateCounter();
                            countLabel.textContent = 0; // Restablecer el contador visual a 0

                        }
                    });
                });
            }

            // Función para manejar el evento mouseleave del icono de notificación y del count-label
            function handleMouseleave() {
                countLabel.textContent = 0;
                notificationIcon.classList.remove('pulsating');
            }

            // Agregar eventos mouseover y mouseleave al icono de notificación y al count-label
            notificationIcon.addEventListener('mouseover', handleMouseover);
            notificationIcon.addEventListener('mouseleave', handleMouseleave);
            countLabel.addEventListener('mouseover', handleMouseover);
            countLabel.addEventListener('mouseleave', handleMouseleave);

            // Agregar evento mouseleave a la lista de notificaciones
            notificationList.addEventListener('mouseleave', function () {
                mouseOverCount = 0;
                if (notificationList.contains(noNotificationsMessage)) {
                    notificationList.removeChild(noNotificationsMessage);
                }
                updateCounter();
            });

            noNotificationsMessage.classList.add('no-notifications');

            // Inicializa el contador al cargar la página
            updateCounter();

            // Reproduce sonido según tipo de notificación
            const notifications = document.querySelectorAll('#notifications-menu .notification-list li');
            notifications.forEach(notification => {
                const type = notification.classList[0].split('-')[1];
                playSound(type);
            });
             // Función para almacenar notificaciones vistas
    function storeSeenNotifications(notificationIds) {
        localStorage.setItem('seenNotifications', JSON.stringify(notificationIds));
    }

    // Función para recuperar notificaciones vistas
    function getSeenNotifications() {
        return JSON.parse(localStorage.getItem('seenNotifications') || '[]');
    }

    // Verificar y actualizar el contador con nuevas notificaciones
    function checkNewNotifications() {
        const currentNotificationIds = Array.from(notificationList.children).map(item => item.getAttribute('data-notification-id'));
        const seenNotificationIds = getSeenNotifications();
        const newNotifications = currentNotificationIds.filter(id => !seenNotificationIds.includes(id));
        countLabel.textContent = newNotifications.length;
        if (newNotifications.length > 0) {
            storeSeenNotifications(currentNotificationIds);
        }
    }

    // Ejecutar la verificación de nuevas notificaciones al cargar la página
    checkNewNotifications();
        });
    </script>

</body>
</html>