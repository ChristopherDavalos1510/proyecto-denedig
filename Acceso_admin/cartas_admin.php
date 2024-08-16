<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cartas Emo</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/tooplate-gotto-job.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <style>
        .hero-section {
            background-color: #142e61ff;
            color: #fff;
        }
        .custom-form {
            background-color: #5c6a87ff;
            color: #fff;
            border-radius: 4px;
            padding: 40px;
        }
        .bi {
            color: #fff;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(80, 80, 80, 0.5); /* Gris oscuro con 50% de transparencia */
            color: white; /* Color de texto blanco por defecto */
            font-size: 20px; /* Tamaño de fuente para toda la tabla */
        }

        .table th, .table td {
       
            padding: 8px; /* Espaciado interno */
        }

        /* Estilo para el hover de la tabla */
        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.5); /* Gris oscuro más claro al pasar el mouse */
            color: white; /* Mantener el texto blanco al pasar el mouse */
        }
        
        .hidden {
            display: none;
        }
          .btn {
            border: none; /* Opcional: quitar bordes */
            color: white; /* Color del texto del botón */
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .btn-success {
            background-color: rgba(200, 200, 200, 0.5);; /* Verde oscuro con transparencia */
            border: 2px solid white; /* Contorno blanco */
        }
        .btn-info {
            background-color: rgba(70, 130, 180, 0.5); /* Verde oscuro con transparencia */
            border: 2px solid white; /* Contorno blanco */
        }
        .btn-primary {
            background-color: rgba(70, 130, 180, 0.5); /* Azul oscuro con transparencia */
            border: 2px solid white; /* Contorno blanco */
        }
        .btn-danger {
            background-color: rgba(80, 80, 80, 0.5); /* Azul oscuro con transparencia */
            border: 2px solid white; /* Contorno blanco */
        }

        .btn-warning {
            background-color: rgba(80, 80, 80, 0.5); /* Azul oscuro con transparencia */
            border: 2px solid white; /* Contorno blanco */
        }

        .btn img {
            vertical-align: middle; /* Alinea la imagen con el texto */
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php include 'header-admin.php'; ?>

    <main>
        <section class="hero-section d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12 col-12">
                        <?php
                        include "../funciones/conex.php";

                        $sql = "SELECT id_usuario, nombre, paterno, aceptacion, termino, aut_termino FROM usuarios WHERE nivel_usuario = 3";
                        $result = $conexion->query($sql);
                        ?>

                        <div class="container">
                            <h2 class="mt-3" style="color:white">Lista de Usuarios</h2>
                            <!-- Barra de búsqueda -->
                            <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Buscar por ID o Nombre" class="form-control mb-3">

                            <!-- Botones de filtro -->
                            <div class="mb-3">
                                <button id="faltantesBtn" class="btn btn-primary">Faltantes</button>
                                <button id="firmadasBtn" class="btn btn-success">Firmadas</button>
                                <button id="todosUsuarios" class="btn btn-info">Todos</button>
                            </div>

                            <div id="faltantes">
                                <table class="table table-hover text-white">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Carta de aceptación</th>
                                            <th>Carta de término</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                if (empty($row['aceptacion']) || empty($row['termino'])) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["id_usuario"] . "</td>";
                                                    echo "<td>" . $row["nombre"] . "</td>";
                                                    echo "<td>" . $row["paterno"] . "</td>";
                                                    if (empty($row['aceptacion'])) {
                                                        echo "<td>
                                                            <form action='../funciones/f_cartas_empresariales/subir_cartas.php?id=" . $row["id_usuario"] . "' method='post' enctype='multipart/form-data' class='my-4 mx-auto' style='max-width: 400px;'>
                                                                <div class='input-group mb-3'>
                                                                    <input type='file' class='form-control' id='pdf_file' name='pdf_file' accept='.pdf' aria-describedby='inputGroupFileAddon' required>
                                                                    <label class='input-group-text' for='pdf_file'>Cargar archivo</label>
                                                                </div>
                                                                <button type='submit' class='btn btn-success'>
                                                                    <img src='upload.png' class='rounded' alt='...' style='width: 40px; height: 40px;'>
                                                                </button>
                                                                <a href='../funciones/f_cartas_empresariales/comprobar_cartas.php?id=" . $row["id_usuario"] . "' class='btn btn-primary'>
                                                                    <img src='download.png' class='rounded' alt='...' style='width: 40px; height: 40px;'>
                                                                </a>
                                                            </form>
                                                          </td>";
                                                    } else {
                                                        echo "<td>Ya has subido la carta de aceptación.
                                                            <form action='../funciones/f_cartas_empresariales/eliminar_carta.php?id=" . $row["id_usuario"] . "&tipo=aceptacion' method='post' style='display:inline;'>
                                                                <button type='submit' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas resubir esta carta?\");'>
                                                                    Resubir
                                                                </button>
                                                            </form>
                                                          </td>";
                                                    }
                                                    if (empty($row['termino'])) {
                                                        echo "<td>
                                                            <form action='../funciones/f_cartas_empresariales/subir_cartasT.php?id=" . $row["id_usuario"] . "' method='post' enctype='multipart/form-data' class='my-4 mx-auto' style='max-width: 400px;'>
                                                                <div class='input-group mb-3'>
                                                                    <input type='file' class='form-control' id='pdf_file' name='pdf_file' accept='.pdf' aria-describedby='inputGroupFileAddon' required>
                                                                    <label class='input-group-text' for='pdf_file'>Cargar archivo</label>
                                                                </div>
                                                                <button type='submit' class='btn btn-success'>
                                                                    <img src='upload.png' class='rounded' alt='...' style='width: 40px; height: 40px;'>
                                                                </button>
                                                                <a href='../funciones/f_cartas_empresariales/comprobar_cartasT.php?id=" . $row["id_usuario"] . "' class='btn btn-primary'>
                                                                    <img src='download.png' class='rounded' alt='...' style='width: 40px; height: 40px;'>
                                                                </a>
                                                            </form>
                                                          </td>";
                                                    } else {
                                                        echo "<td>Ya has subido la carta de término.";
                                                        if ($row['aut_termino'] == 0) {
                                                            echo "
                                                                <form action='../funciones/f_cartas_empresariales/autorizar.php?id=" . $row["id_usuario"] . "&tipo=termino' method='post' style='display:inline;'>
                                                                    <button type='submit' class='btn btn-success' onclick='return confirm(\"¿Estás seguro de que deseas autorizar esta carta?\");'>
                                                                        Autorizar
                                                                    </button>
                                                                </form>";
                                                        } else {
                                                            echo " Ya ha sido autorizado.
                                                                <form action='../funciones/f_cartas_empresariales/desautorizar.php?id=" . $row["id_usuario"] . "&tipo=termino' method='post' style='display:inline;'>
                                                                    <button type='submit' class='btn btn-warning' onclick='return confirm(\"¿Estás seguro de que deseas desautorizar esta carta?\");'>
                                                                        Desautorizar
                                                                    </button>
                                                                </form>";
                                                        }
                                                        echo "<form action='../funciones/f_cartas_empresariales/eliminar_carta.php?id=" . $row["id_usuario"] . "&tipo=termino' method='post' style='display:inline;'>
                                                                <button type='submit' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas resubir esta carta?\");'>
                                                                    Resubir
                                                                </button>
                                                            </form>
                                                          </td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No se encontraron resultados</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="firmadas" class="hidden">
                                <table class="table table-hover text-white">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Carta de aceptación</th>
                                            <th>Carta de término</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result->data_seek(0); // Reset the result pointer
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                if (!empty($row['aceptacion']) && !empty($row['termino'])) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["id_usuario"] . "</td>";
                                                    echo "<td>" . $row["nombre"] . "</td>";
                                                    echo "<td>" . $row["paterno"] . "</td>";
                                                    echo "<td>Ya has subido la carta de aceptación.
                                                        <form action='../funciones/f_cartas_empresariales/eliminar_carta.php?id=" . $row["id_usuario"] . "&tipo=aceptacion' method='post' style='display:inline;'>
                                                            <button type='submit' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas resubir esta carta?\");'>
                                                                Resubir
                                                            </button>
                                                        </form>
                                                      </td>";
                                                    echo "<td>Ya has subido la carta de término.";
                                                    if ($row['aut_termino'] == 0) {
                                                        echo "
                                                            <form action='../funciones/f_cartas_empresariales/autorizar.php?id=" . $row["id_usuario"] . "&tipo=termino' method='post' style='display:inline;'>
                                                                <button type='submit' class='btn btn-success' onclick='return confirm(\"¿Estás seguro de que deseas autorizar esta carta?\");'>
                                                                    Autorizar
                                                                </button>
                                                            </form>";
                                                    } else {
                                                        echo " Ya ha sido autorizado.
                                                            <form action='../funciones/f_cartas_empresariales/desautorizar.php?id=" . $row["id_usuario"] . "&tipo=termino' method='post' style='display:inline;'>
                                                                <button type='submit' class='btn btn-warning' onclick='return confirm(\"¿Estás seguro de que deseas desautorizar esta carta?\");'>
                                                                    Desautorizar
                                                                </button>
                                                            </form>";
                                                    }
                                                    echo "<form action='../funciones/f_cartas_empresariales/eliminar_carta.php?id=" . $row["id_usuario"] . "&tipo=termino' method='post' style='display:inline;'>
                                                            <button type='submit' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas resubir esta carta?\");'>
                                                                Resubir
                                                            </button>
                                                        </form>
                                                      </td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No se encontraron resultados</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div id="todos" class="hidden">
                                <table class="table table-hover text-white">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Carta de aceptación</th>
                                            <th>Carta de término</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result->data_seek(0); // Reset the result pointer
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["id_usuario"] . "</td>";
                                                echo "<td>" . $row["nombre"] . "</td>";
                                                echo "<td>" . $row["paterno"] . "</td>";
                                                if (empty($row['aceptacion'])) {
                                                    echo "<td>
                                                        <form action='../funciones/f_cartas_empresariales/subir_cartas.php?id=" . $row["id_usuario"] . "' method='post' enctype='multipart/form-data' class='my-4 mx-auto' style='max-width: 400px;'>
                                                            <div class='input-group mb-3'>
                                                                <input type='file' class='form-control' id='pdf_file' name='pdf_file' accept='.pdf' aria-describedby='inputGroupFileAddon' required>
                                                                <label class='input-group-text' for='pdf_file'>Cargar archivo</label>
                                                            </div>
                                                            <button type='submit' class='btn btn-success'>
                                                                <img src='upload.png' class='rounded' alt='...' style='width: 40px; height: 40px;'>
                                                            </button>
                                                            <a href='../funciones/f_cartas_empresariales/comprobar_cartas.php?id=" . $row["id_usuario"] . "' class='btn btn-primary'>
                                                                <img src='download.png' class='rounded' alt='...' style='width: 40px; height: 40px;'>
                                                            </a>
                                                        </form>
                                                      </td>";
                                                } else {
                                                    echo "<td>Ya has subido la carta de aceptación.
                                                        <form action='../funciones/f_cartas_empresariales/eliminar_carta.php?id=" . $row["id_usuario"] . "&tipo=aceptacion' method='post' style='display:inline;'>
                                                            <button type='submit' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas resubir esta carta?\");'>
                                                                Resubir
                                                            </button>
                                                        </form>
                                                      </td>";
                                                }
                                                if (empty($row['termino'])) {
                                                    echo "<td>
                                                        <form action='../funciones/f_cartas_empresariales/subir_cartasT.php?id=" . $row["id_usuario"] . "' method='post' enctype='multipart/form-data' class='my-4 mx-auto' style='max-width: 400px;'>
                                                            <div class='input-group mb-3'>
                                                                <input type='file' class='form-control' id='pdf_file' name='pdf_file' accept='.pdf' aria-describedby='inputGroupFileAddon' required>
                                                                <label class='input-group-text' for='pdf_file'>Cargar archivo</label>
                                                            </div>
                                                            <button type='submit' class='btn btn-success'>
                                                                <img src='upload.png' class='rounded' alt='...' style='width: 40px; height: 40px;'>
                                                            </button>
                                                            <a href='../funciones/f_cartas_empresariales/comprobar_cartasT.php?id=" . $row["id_usuario"] . "' class='btn btn-primary'>
                                                                <img src='download.png' class='rounded' alt='...' style='width: 40px; height: 40px;'>
                                                            </a>
                                                        </form>
                                                      </td>";
                                                } else {
                                                    echo "<td>Ya has subido la carta de término.";
                                                    if ($row['aut_termino'] == 0) {
                                                        echo "
                                                            <form action='../funciones/f_cartas_empresariales/autorizar.php?id=" . $row["id_usuario"] . "&tipo=termino' method='post' style='display:inline;'>
                                                                <button type='submit' class='btn btn-success' onclick='return confirm(\"¿Estás seguro de que deseas autorizar esta carta?\");'>
                                                                    Autorizar
                                                                </button>
                                                            </form>";
                                                    } else {
                                                        echo " Ya ha sido autorizado.
                                                            <form action='../funciones/f_cartas_empresariales/desautorizar.php?id=" . $row["id_usuario"] . "&tipo=termino' method='post' style='display:inline;'>
                                                                <button type='submit' class='btn btn-warning' onclick='return confirm(\"¿Estás seguro de que deseas desautorizar esta carta?\");'>
                                                                    Desautorizar
                                                                </button>
                                                            </form>";
                                                    }
                                                    echo "<form action='../funciones/f_cartas_empresariales/eliminar_carta.php?id=" . $row["id_usuario"] . "&tipo=termino' method='post' style='display:inline;'>
                                                            <button type='submit' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas resubir esta carta?\");'>
                                                                Resubir
                                                            </button>
                                                        </form>
                                                      </td>";
                                                }
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No se encontraron resultados</td></tr>";
                                        }
                                        $conexion->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <?php include 'footer1.php'; ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/scripteye.js"></script>
        <script>
            document.getElementById("faltantesBtn").onclick = function() {
                document.getElementById("faltantes").classList.remove("hidden");
                document.getElementById("firmadas").classList.add("hidden");
                document.getElementById("todos").classList.add("hidden");
            };
            document.getElementById("firmadasBtn").onclick = function() {
                document.getElementById("firmadas").classList.remove("hidden");
                document.getElementById("faltantes").classList.add("hidden");
                document.getElementById("todos").classList.add("hidden");
            };
            document.getElementById("todosUsuarios").onclick = function() {
                document.getElementById("todos").classList.remove("hidden");
                document.getElementById("faltantes").classList.add("hidden");
                document.getElementById("firmadas").classList.add("hidden");
            };

            function filterTable() {
                var input, filter, table, tr, td, i, j, txtValue;
                input = document.getElementById("searchInput");
                filter = input.value.toUpperCase();
                tables = document.querySelectorAll("table");
                tables.forEach((table) => {
                    tr = table.getElementsByTagName("tr");
                    for (i = 1; i < tr.length; i++) {
                        tr[i].style.display = "none";
                        td = tr[i].getElementsByTagName("td");
                        for (j = 0; j < td.length; j++) {
                            if (td[j]) {
                                txtValue = td[j].textContent || td[j].innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                    break;
                                }
                            }
                        }
                    }
                });
            }
        </script>
    </main>
</body>
</html>
