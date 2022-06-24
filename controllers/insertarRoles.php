<?php
    require_once "../models/conexionDB.php";
    require_once "../models/rolesModels.php";

    $obj = new roles();
    $obj->nombre=$_POST['nombre'];
    
    if($obj->insertarDatos()==1){
        header("location:../views/indexRoles.php");
    } else {
        echo "fallo al agregar";
    }
?> 
