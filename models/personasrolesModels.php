<?php

    class personasroles{

        public $idpersonas;
        public $idroles;

        public function mostrarDatos(){
            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql="SELECT idroles,idpersonas FROM rolespersonas";
            $result=mysqli_query($conexion,$sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function seleccionarDatos($dato){
            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql="SELECT idroles FROM rolespersonas where idpersonas=$dato";
            $result=mysqli_query($conexion,$sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function insertarDatos(){
            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql = $conexion->prepare("INSERT INTO rolespersonas (idpersonas, idroles) VALUES (?, ?)");
            $sql->bind_param("ii", $this->idpersonas, $this->idroles);
            return $sql->execute();
        }
        public function modificarDatos(){
            $c = new conexiondb();
            $conexion = $c->conexion();
            
            $sql= $conexion->prepare("UPDATE roles set nombre=? where idroles=?");
            $sql->bind_param("si", $this->nombre, $this->idroles);
            return $sql->execute();
        }
        public function borrarDatos(){

            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql= $conexion->prepare("DELETE from rolepersonas where idroles=?");
            $sql->bind_param("i", $this->idroles);
            return $sql->execute();
        }
    }
?>