<?php

    require_once "../models/conexionDB.php";
    require_once "../models/rolesModels.php";

    $obj = new roles();
    $obj->idroles = $_GET['id'];

    if($obj->borrarDatos()==1){
        header("location:../views/indexRoles.php");
    } else {
        echo "fallo al agregar";
    }