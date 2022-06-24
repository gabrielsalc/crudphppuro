<?php
    require_once "../models/conexionDB.php";
    require_once "../models/personasrolesModels.php";
    

    $obj = new personasroles();

    $obj->idroles=$_POST['roles'];
    $obj->idpersonas=$_POST['idpersonas'];
    var_dump($obj);

    if($obj->insertarDatos()==1){
        header("location:../views/indexPersonas.php");
    } else {
        echo "fallo al modificar";
    }
?> 