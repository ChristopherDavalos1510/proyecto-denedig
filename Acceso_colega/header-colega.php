<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/botonham.css" rel="stylesheet">
    <link rel="icon" href="../images/logo.png" type="image/svg" style="display: block; margin: 0 auto;">
    <style>
        /* hero section */
.hero-section {
    background-color: #142e61ff;
    color: #142e61ff;
    padding: 140px 0;
    position: relative; /* Añadir position */
    z-index: 1; /* Asignar un z-index base */
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
    width: 120%;
}

/* items del menu desplegable al pasar el ratón */
#menu ul li:hover > ul {
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

/*Color dependiendo la notificacion*/
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

/*registro*/ 


#clock-menu {
    position: absolute;
        right: 500px;
        top: 35px;
        margin-right: 1px;
        margin-top: 2px;
        margin-bottom: 1px;
        padding-top: 1px;
        padding-right: 1px;
        padding-bottom: 1px;
        margin-left: 300px;
        padding-left: 1px;
    }
    #clock-menu ul {
        margin-right: 1px;
        margin-top: 2px;
        margin-bottom: 1px;
        padding-top: 1px;
        padding-right: 1px;
        padding-bottom: 1px;
        margin-left: 1px;
        padding-left: 1px;
    }
    #clock-menu .clock-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #ffffff;
        color: #ffffff;
        cursor: pointer;
        transition: transform 0.2s ease-in-out;
    }
    #clock-menu .clock-icon img {
        width: 40px;
    }
    #registration-form {
    font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
    display: none;
    position: absolute;
    top: 40px;
    right: 3px;
    background-color: #ffffff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 5px;
    z-index: 3;
    text-align: center;
    width: 300px;
    animation: slideDown 0.3s ease-out; 
}

#registration-form.show {
    display: block;
    opacity: 1;
    transform: translateY(0);
}

#registration-form label {
    display: block;
    margin-bottom: 2px;
    font-weight: bold;
    color: #333;
    font-size: 14px;
}

#registration-form input {
    display: block;
    margin-bottom: 1px;
    width: calc(100% - 20px); 
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box; 
}

#registration-form button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #014F9C;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

#confirmation-message {
    background-color: #4CAF50; /* Color verde para el mensaje de confirmación */
    color: white;
    border-radius: 5px;
    margin-bottom: -15px; 
    left: 1080px;
    right: 550px;
    position: absolute;
}
@keyframes slideDown {
    0% {
        opacity: 0;
        transform: translateY(-30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
#registration-form .success-message {
    color: #008000; /* Color verde */
    margin-top: 10px; /* Espacio superior */
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
                         <li><a class="nav-link" href="index-colega.php">Página principal</a></li>
                        <li><a class="nav-link" href="tutorialdocs.php">Documentación</a></li>
                        <li><a class="nav-link" href="confidencial.php">Contrato</a></li>
                        <li><a class="nav-link" href="reglamento.php">Reglamento</a></li>
                        <li><a class="nav-link" href="capacitaciones.php">Capacitaciones</a></li>
                        <li><a class="nav-link" href="cartas_empresariales.php">Cartas</a></li>
                        <li><a class="nav-link" href="recursos.php">Recursos</a></li>
                        <li><a class="nav-link" href="editar-perfil-usuario.php">Perfil</a></li>
                        <li><a class="nav-link" href="../funciones/logout.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end menu -->
        </nav>
        <!-- end nav -->
        <img src="../images/logo.png" class="img-fluid logo-image" style="width: 200px; margin-left: 550px !important;">
        <div id="confirmation-message"></div>


<!-- Reloj -->
<nav id="clock-menu">
    <ul>
        <a href="#" class="clock-icon">
            <img src="../img/icono-registro.png" alt="Registro">
        </a>
    </ul>
    <div id="registration-form" style="display:none;">
        <label for="entry-datetime">Fecha y Hora:</label>
        <input type="datetime-local" id="entry-datetime" name="entry-datetime" readonly>
        <label for="entry-type"></label>
        <select id="entry-type" style="display: none;">
            <option value="entrada">Entrada</option>
            <option value="salida">Salida</option>
        </select>
        <div id="early-exit-reason" style="display:none;">
            <label for="exit-reason">Motivo de Salida Temprana:</label>
            <input type="text" id="exit-reason" name="exit-reason">
        </div>
        <button id="register-entry">Registrar</button>
    </div>
    <div id="confirmation-message" style="display:none;"></div>
</nav>


<div id="confirmation-message" style="display:none;"></div>



        <nav id="notifications-menu">
            <ul>
                    <a href="#" class="notification-icon">
                        <img src="../img/icono-notificaciones.png" alt="Notificaciones">
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
<audio id="urgent-sound" src="../tonoNotificación/Notificación Rojo.mp3" preload="auto"></audio>
    <audio id="priority-sound" src="../tonoNotificación/Notificación Amarillo.mp3" preload="auto"></audio>
    <audio id="normal-sound" src="../tonoNotificación/Notificación Verde.mp3" preload="auto"></audio>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
// Función para dar formato a la fecha y hora actual al formato requerido para input[type="datetime-local"]
function getFormattedDateTime() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            return `${year}-${month}-${day}T${hours}:${minutes}`;
        }

// Establecer la fecha y hora actual en el campo de entrada
const dateTimeInput = document.getElementById('entry-datetime');
        dateTimeInput.value = getFormattedDateTime();
    });

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
                    fetch('update_views.php', {
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    const clockIcon = document.querySelector('#clock-menu .clock-icon');
    const registrationForm = document.getElementById('registration-form');
    const registerButton = document.getElementById('register-entry');
    const confirmationMessage = document.getElementById('confirmation-message');
    const earlyExitReason = document.getElementById('early-exit-reason');
    let entryType = 'entrada'; // Tipo inicial: entrada

    // Mostrar el formulario al pasar el mouse sobre el icono del reloj
    clockIcon.addEventListener('mouseover', function () {
        registrationForm.style.display = 'block';
    });

    // Ocultar el formulario al salir el mouse del icono del reloj
    clockIcon.addEventListener('mouseleave', function () {
        registrationForm.style.display = 'none';
    });

    // Asegurar que el formulario permanezca visible mientras el mouse está sobre él
    registrationForm.addEventListener('mouseover', function () {
        registrationForm.style.display = 'block';
    });

    // Ocultar el formulario cuando el mouse sale del formulario
    registrationForm.addEventListener('mouseleave', function () {
        registrationForm.style.display = 'none';
    });

    // Función para verificar si hay una entrada pendiente para el usuario actual
    function checkPendingEntry() {
        fetch('verificar_entrada_pendiente.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id_usuario: <?php echo $_SESSION['id_usuario']; ?> })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                entryType = data.entryType; // 'entrada' o 'salida'
                console.log(`Tipo de entrada actualizado a: ${entryType}`);
            } else {
                alert('Error al verificar la entrada pendiente');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al verificar la entrada pendiente');
        });
    }

    // Verificar si hay una entrada pendiente al cargar la página
    checkPendingEntry();

    // Manejar el evento del botón de registrar entrada/salida
    registerButton.addEventListener('click', function () {
        const entryDateTime = document.getElementById('entry-datetime').value;

        if (entryDateTime) {
            // Obtener la hora de inicio y término del horario del usuario
            fetch('obtener_horario.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id_usuario: <?php echo $_SESSION['id_usuario']; ?> })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const horaInicio = data.horaInicio;
                    const horaTermino = data.horaTermino;
                    const nombreDias = data.nombreDias.split(', ');

                    // Obtener el día de la semana de la fecha seleccionada
                    const selectedDate = new Date(entryDateTime).getDay();
                    const dayNames = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
                    const selectedDayName = dayNames[selectedDate];

                    // Verificar si el día seleccionado está dentro de los días laborales
                    if (!nombreDias.includes(selectedDayName)) {
                        alert('No puedes registrar tu entrada ni salida porque no estás en tus días laborales.');
                        return;
                    }

                    const selectedDateTime = new Date(entryDateTime).getTime();
                    const startTime = new Date(`${entryDateTime.split('T')[0]}T${horaInicio}`).getTime();
                    const endTime = new Date(`${entryDateTime.split('T')[0]}T${horaTermino}`).getTime();
                    const thirtyMinutesAfterEndTime = endTime + (30 * 60 * 1000); // 30 minutos después de la hora de término

                    // Verificar si la entrada es antes de la hora de inicio
                    if (selectedDateTime < startTime) {
                        alert('No puedes registrar tu entrada antes del horario de inicio.');
                        return;
                    }

                    // Verificar si la salida es más de 30 minutos después de la hora de término
                    if (entryType === 'salida' && selectedDateTime > thirtyMinutesAfterEndTime) {
                        // Registrar la salida con mensaje de excedido
                        registerExitWithMessage(entryDateTime);
                        return;
                    }

                    if (entryType === 'salida' && selectedDateTime < endTime) {
                        // Mostrar el motivo de salida temprana
                        earlyExitReason.style.display = 'block';

                        // Registrar la salida con motivo
                        registerEarlyExit(entryDateTime);
                    } else {
                        // Registrar la entrada/salida normalmente
                        registerEntry(entryDateTime);
                    }
                } else {
                    alert('Error al obtener el horario del usuario');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al obtener el horario del usuario');
            });
        } else {
            alert('Por favor, selecciona una fecha y hora.');
        }
    });

    // Función para registrar la entrada/salida normalmente
    function registerEntry(entryDateTime) {
        fetch('registro_horario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id_usuario: <?php echo $_SESSION['id_usuario']; ?>,
                tipo: entryType,
                fecha_hora: entryDateTime
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(`Hora de ${entryType} registrada correctamente.`);

                // Ocultar formulario después de un breve período
                setTimeout(() => {
                    registrationForm.style.display = 'none';
                    confirmationMessage.style.display = 'none';
                }, 200000000); // 2 segundos

                // Alternar entre entrada y salida para el próximo registro
                entryType = entryType === 'entrada' ? 'salida' : 'entrada';
            } else {
                alert('Error al registrar entrada/salida');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al registrar entrada/salida');
        });
    }

    // Función para registrar la salida con motivo
    function registerEarlyExit(entryDateTime) {
        const exitReason = document.getElementById('exit-reason').value;

        if (exitReason.trim() !== '') {
            fetch('registro_horario.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id_usuario: <?php echo $_SESSION['id_usuario']; ?>,
                    tipo: entryType,
                    fecha_hora: entryDateTime,
                    motivo_salida: exitReason
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert(`Hora de Salida registrada con el motivo: ${exitReason}`);

                    // Ocultar formulario después de un breve período
                    setTimeout(() => {
                        registrationForm.style.display = 'none';
                        confirmationMessage.style.display = 'none';
                    }, 2000); // 2 segundos

                    // Alternar entre entrada y salida para el próximo registro
                    entryType = 'entrada'; // Reiniciar a entrada después de una salida con motivo
                } else {
                    alert('Error al registrar salida con motivo');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error al registrar salida con motivo');
            });
        } else {
            alert('Por favor, ingresa el motivo de la salida antes de la hora establecida.');
        }
    }

   // Función para registrar la salida con mensaje de excedido
function registerExitWithMessage(entryDateTime) {
    fetch('registro_horario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id_usuario: <?php echo $_SESSION['id_usuario']; ?>,
            tipo: 'salida',
            fecha_hora: entryDateTime,
            motivo_salida: "Horas excedidas del colega, no hay validez de sus horas."
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Mostrar alerta con el mensaje
            alert("Tus horas se excedieron de tus horas laborales, como consecuencia no se tomarán en cuenta tus horas del día de hoy.");

            // Reiniciar tipo de entrada para el próximo registro
            entryType = 'entrada'; // Reiniciar a entrada después de registrar la salida con mensaje
        } else {
            alert('Error al registrar salida con mensaje de excedido');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al registrar salida con mensaje de excedido');
    });
}

});
</script>


<div id="message-container"></div>
</body>
</html>
