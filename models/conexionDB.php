<?php

    class conexiondb{
        private $servidor="localhost"; //datos de conexion, a mi me funciona asi, depende de la pc si hay que cambiar algo
        private $usuario="root";
        private $pass="";
        private $bd="phpcrud";

        public function conexion(){
            $conexion=mysqli_connect($this->servidor,$this->usuario,$this->pass,$this->bd); //aunque no hay nada en el pass igual debo mandarlo porque si no, no funciona
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