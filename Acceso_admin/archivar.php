<?php
    include '../funciones/conecPublicaciones.php';
    $id = $_GET['id'];
    $recomendacion="";
    $query="UPDATE publicaciones SET estado=9, recomendacion='".$recomendacion."' WHERE id='".$id."'";
    $resultado=mysqli_query($conexion,$query);
    mysqli_close($conexion);
    header("location:catalogoAdmin.php");
?>