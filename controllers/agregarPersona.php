<?php
    require_once "../models/conexionDB.php";
    require_once "../models/personasrolesModels.php";
    

    $obj = new personasroles();

    $obj->idpersonas=$_POST['personas'];
    $obj->idroles=$_POST['idroles'];

    if($obj->insertarDatos()==1){
        header("location:../views/indexRoles.php");
    } else {
        echo "fallo al modificar";
    }
?> 