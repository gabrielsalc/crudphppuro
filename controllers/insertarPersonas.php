<?php
    require_once "../models/conexionDB.php";
    require_once "../models/personasModels.php";
    session_start();

    $obj = new personas();

    $obj->nombre=$_POST['nombre'];
    $obj->apellido=$_POST['apellido'];
    $obj->email=$_POST['email'];
    $obj->edad=$_POST['edad'];

    if(($obj->nombre != "") && ($obj->apellido != "") && ($obj->email != "")){
        if($obj->insertarDatos()==1){
            header("location:../views/indexPersonas.php");
        } else {
            $_SESSION["Login.Error"] = "Ya existe un usuario con este EMAIL";
            $previousPage = $_SERVER['HTTP_REFERER'];
            header("Location: $previousPage");
        }
        } else {
            $_SESSION["Login.Error"] = "Los Campos Nombre, Apellido, Email no pueden estar vacios";
            $previousPage = $_SERVER['HTTP_REFERER'];
            header("Location: $previousPage");
        }
?> 
