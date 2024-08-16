<?php
    include '../funciones/conecPublicaciones.php';
    $id = $_POST['id'];
    if(isset($_POST['like'])){
        $query="UPDATE publicaciones SET megusta = megusta + 1 WHERE id='".$id."'";
        $resultado=mysqli_query($conexion,$query);
    }else if(isset($_POST['ilove'])){
        $query="UPDATE publicaciones SET corazon = corazon + 1 WHERE id='".$id."'";
        $resultado=mysqli_query($conexion,$query);
    }else if(isset($_POST['happy'])){
        $query="UPDATE publicaciones SET felicitacion = felicitacion + 1 WHERE id='".$id."'";
        $resultado=mysqli_query($conexion,$query);
    }else{
        $query="UPDATE publicaciones SET nomegusta = nomegusta + 1 WHERE id='".$id."'";
        $resultado=mysqli_query($conexion,$query);
    }//cierra
    mysqli_close($conexion);
    header("location:catalogoAdmin.php");
?>