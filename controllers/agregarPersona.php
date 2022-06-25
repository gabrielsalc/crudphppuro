<?php
    require_once "../models/conexionDB.php";
    require_once "../models/personasrolesModels.php";
    session_start();

    $obj = new personasroles();

    $obj->idroles=$_POST['idroles'];
    $obj->idpersonas=$_POST['personas'];

    if(($obj->idroles != "") && ($obj->idpersonas != "")){
        if($obj->insertarDatosPersona()==1){
            header("location:../views/indexRoles.php");
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