<?php
    require_once "../models/conexionPersonas.php";
    require_once "../controllers/personasController.php";

    
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $edad=$_POST['edad'];
    $id=$_POST['id'];

    $datos=array(
        $nombre,
        $apellido,
        $email,
        $edad,
        $id
    );
    $obj = new metodos();
    if($obj->modificarDatos($datos)==1){
        header("location:../views/indexPersonas.php");
    } else {
        echo "fallo al modificar";
    }
?> 