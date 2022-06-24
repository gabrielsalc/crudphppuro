<?php
   

    require_once "../models/conexionPersonas.php";
    require_once "../models/personasModels.php";

    $obj = new personas();

    $obj->idpersonas=$_GET['id'];

    if($obj->borrarDatos()==1){
        header("location:../views/indexPersonas.php");
    } else {
        echo "fallo al agregar";
    }