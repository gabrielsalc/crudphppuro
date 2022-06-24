<?php
    $id=$_GET['id'];

    require_once "../models/conexionRoles.php";
    require_once "../controllers/rolesController.php";

    $obj = new metodos();
    if($obj->borrarDatos($id)==1){
        header("location:../views/indexRoles.php");
    } else {
        echo "fallo al agregar";
    }