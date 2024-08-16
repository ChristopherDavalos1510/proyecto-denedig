<?php
    include '../funciones/conecPublicaciones.php';
    $id = $_GET['id'];
    $recomendacion="Aprobado";
    $query="UPDATE publicaciones SET estado=3, recomendacion='".$recomendacion."' WHERE id='".$id."'";
    $resultado=mysqli_query($conexion,$query);
    mysqli_close($conexion);
    header("location:catalogoAdmin.php");
?>