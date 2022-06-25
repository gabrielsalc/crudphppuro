<?php

    require_once "../models/conexionDB.php";
    require_once "../models/rolesModels.php";
    header('Content-Type: application/json; charset=utf-8');
    
    // Checking, if post value is
    // set by user or not
    if(isset($_POST['idroles'])){
        $obj = new roles();
        $obj->idroles = $_POST['idroles'];
        if($obj->borrarDatos()==1){
            echo json_encode(['error' => null]);
            return;
        } else {
            echo json_encode(['error' => 'error']);
            return;
        }
    } else {
        echo json_encode(['error' => 'Request Incorrecto']);
        return;
    }


    /*$obj = new roles();
    $obj->idroles = $_GET['id'];

    if($obj->borrarDatos()==1){
        header("location:../views/indexRoles.php");
    } else {
        echo "fallo al borrar";
    }*/
?>