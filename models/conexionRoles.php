<?php

    class conectarRoles{
        private $servidor="localhost";
        private $usuario="root";
        private $pass="";
        private $bd="rolescrud";

        public function conexion(){
            $conexion=mysqli_connect($this->servidor,$this->usuario,$this->pass,$this->bd);
            return $conexion;
        }   
    }
?>