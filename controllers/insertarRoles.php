<?php
    require_once "../models/conexionDB.php";
    require_once "../models/rolesModels.php";
    session_start();

    $obj = new roles();
    $obj->nombre=$_POST['nombre'];
    var_dump($obj->nombre);
    if($obj->nombre != ""){
        if($obj->insertarDatos()==1){
        header("location:../views/indexRoles.php");
        } else {
            $_SESSION["Login.Error"] = "Este Rol ya existe";
            $previousPage = $_SERVER['HTTP_REFERER'];
            header("Location: $previousPage");
        }
        } else {
            $_SESSION["Login.Error"] = "Campo Rol no puede estar vacio";
            $previousPage = $_SERVER['HTTP_REFERER'];
            header("Location: $previousPage");
        }
?> 
