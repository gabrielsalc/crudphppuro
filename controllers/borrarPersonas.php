<?php
   

    require_once "../models/conexionDB.php";
    require_once "../models/personasModels.php";

    $obj = new personas();

    $obj->idpersonas=$_GET['variable'];

    if($obj->borrarDatos()==1){
        header("location:../views/indexPersonas.php");
    } else {
        echo "fallo al agregar";
    }