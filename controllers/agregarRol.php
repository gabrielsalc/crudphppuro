<?php
    require_once "../models/conexionDB.php";
    require_once "../models/personasrolesModels.php";
    session_start();

    $obj = new personasroles();

    $obj->idroles=$_POST['roles'];
    $obj->idpersonas=$_POST['idpersonas'];

    if(($obj->idroles != "") && ($obj->idpersonas != "")){
        if($obj->insertarDatos()==1){
            header("location:../views/indexPersonas.php");
        } else {
            $_SESSION["Login.Error"] = "Este usuario ya tiene asignado este rol";
            $previousPage = $_SERVER['HTTP_REFERER'];
            header("Location: $previousPage");
        }
        } else {
            $_SESSION["Login.Error"] = "error desconocido";
            $previousPage = $_SERVER['HTTP_REFERER'];
            header("Location: $previousPage");
        }
?> 