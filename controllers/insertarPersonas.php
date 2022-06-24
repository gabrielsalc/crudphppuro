<?php
    require_once "../models/conexionPersonas.php";
    require_once "../models/personasModels.php";


    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $edad=$_POST['edad'];

    $datos=array(
        $nombre,
        $apellido,
        $email,
        $edad
    );
    $obj = new metodos();
    if($obj->insertarDatos($datos)==1){
        header("location:../views/indexPersonas.php");
    } else {
        echo "fallo al agregar";
    }
?> 
