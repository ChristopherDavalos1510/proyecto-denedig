<?php
include '../funciones/conecPublicaciones.php';
    $id= $_GET["id"];
    $recomendacion = $_GET['recomendacion'];
    $query="UPDATE publicaciones SET estado=2, recomendacion='".$recomendacion."' WHERE id='".$id."'";
    $resultado=mysqli_query($conexion,$query);
    mysqli_close($conexion);
   header("location:catalogoAdmin.php");
?>