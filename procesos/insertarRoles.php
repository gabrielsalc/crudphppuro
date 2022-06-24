<?php
    require_once "../models/conexionRoles.php";
    require_once "../controllers/rolesController.php";


    $nombre=$_POST['nombre'];
    $personas=$_POST['personas'];

    $datos=array(
        $nombre,
        $personas,
    );
    $obj = new metodos();
    if($obj->insertarDatos($datos)==1){
        header("location:../views/indexRoles.php");
    } else {
        echo "fallo al agregar";
    }
?> 
