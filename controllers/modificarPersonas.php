<?php
    require_once "../models/conexionPersonas.php";
    require_once "../models/personasModels.php";
    

    $obj = new personas();


    $obj->nombre=$_POST['nombre'];
    $obj->apellido=$_POST['apellido'];
    $obj->email=$_POST['email'];
    $obj->edad=$_POST['edad'];
    $obj->idpersonas=$_POST['idpersonas'];

    //$obj = new personas();
    if($obj->modificarDatos()==1){
        header("location:../views/indexPersonas.php");
    } else {
        echo "fallo al modificar";
    }
?> 