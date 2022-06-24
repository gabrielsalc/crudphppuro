<?php
    require_once "../models/conexion.php";
    require_once "../controllers/personasController.php";


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
        header("location:../views/personas.php");
    } else {
        echo "fallo al agregar";
    }
?> 
