<?php
    include '../funciones/conecPublicaciones.php';
    $id = $_GET['id'];
    $query="UPDATE publicaciones SET estado=1 WHERE id='".$id."'";
    $resultado=mysqli_query($conexion,$query);
    mysqli_close($conexion);
    header("location:archivo.php");
?>