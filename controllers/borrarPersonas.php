<?php
    $id=$_GET['id'];

    require_once "../models/conexionPersonas.php";
    require_once "../models/personasModels.php";

    $obj = new metodos();
    if($obj->borrarDatos($id)==1){
        header("location:../views/indexPersonas.php");
    } else {
        echo "fallo al agregar";
    }