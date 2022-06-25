<?php
   

    require_once "../models/conexionDB.php";
    require_once "../models/personasrolesModels.php";

    $obj = new personasroles();

    $obj->idpersonas=$_GET['variable1'];
    $obj->idroles=$_GET['variable2'];

    if($obj->borrarDatos()==1){
        header("location:../views/indexRoles.php");
    } else {
        echo "fallo al agregar";
    }