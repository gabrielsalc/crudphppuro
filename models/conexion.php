<?php

    class conectarpersonas{
        private $servidor="localhost";
        private $usuario="root";
        private $pass="";
        private $bd="personascrud";

        public function conexion(){
            $conexion=mysqli_connect($this->servidor,$this->usuario,$this->pass,$this->bd);
            return $conexion;
        }   
    }

    //pruebo conexion
        /*$obj = new conectarpersonas();
        if($obj->conexion()){
            echo "conectado con exito";
        } else {
            echo "fallo conexion";
        }*/
    ?>