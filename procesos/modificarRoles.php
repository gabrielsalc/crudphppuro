<?php
    require_once "../models/conexionRoles.php";
    require_once "../controllers/rolesController.php";

    
    $nombre=$_POST['nombre'];
    $personas=$_POST['personas'];
    $id=$_POST['id'];

    $datos=array(
        $nombre,
        $personas,
        $id
    );
    $obj = new metodos();
    if($obj->modificarDatos($datos)==1){
        header("location:../views/indexRoles.php");
    } else {
        echo "fallo al modificar";
    }
?> 