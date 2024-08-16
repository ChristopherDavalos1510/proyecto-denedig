<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images\logo.png" type="image/svg">
</head>
<header id="top">
    <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index1.php">
                    <img src="../images\logo.png" class="img-fluid logo-image">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-center ms-lg-5">
                        <li class="nav-item">
                        <a class="nav-link" href="index1.php">Página principal</a>
                        <a class="nav-link" href="capacitaciones.php">Capacitaciones</a>
                        
                        </li>
                    <li class="nav-item">
    <?php
    // Verificar si el usuario tiene documentos
    if (usuarioTieneDocumentos($_SESSION['Correo'], $conexion)) {
        // Si tiene documentos, enlazar a yatienesdocs.php
        echo '<a class="nav-link" href="yatienesdocs.php">Documentación</a>';
    } else {
        // Si no tiene documentos, enlazar a tutorialdocs.php
        echo '<a class="nav-link" href="tutorialdocs.php">Documentación</a>';
    }
    ?>
</li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle custom-btn btn" href="#">Iniciar Sesion</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="login.php">Inicia como colega</a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="login-admin2.php">Inicia como lider</a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="login-admin.php">Inicia como administrador</a>
                                </li>
            </div>
        </nav>
    </header>
</body>
</html>

