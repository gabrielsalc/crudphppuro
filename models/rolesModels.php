<?php

    class roles{

        public $nombre;
        public $idroles;

        public function mostrarDatos(){
            $c = new conexiondb();
            $conexion = $c->conexion();
            $sql="SELECT idroles,nombre FROM roles";
            $result=mysqli_query($conexion,$sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        public function seleccionarDatos(){
            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql = $conexion->prepare("SELECT nombre,idroles FROM roles where idroles=?");
            $sql->bind_param("i", $this->idroles);
            $sql->execute();
            $resultSet = $sql->get_result();
            $data = $resultSet->fetch_all(MYSQLI_ASSOC);
            return $data;
        }

        public function insertarDatos(){
            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql = $conexion->prepare("INSERT INTO roles (nombre) VALUES (?)");
            $sql->bind_param("s", $this->nombre);
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

            $sql= $conexion->prepare("DELETE from roles where idroles=?");
            $sql->bind_param("i", $this->idroles);
            return $sql->execute();
        }

        public function damePersonas(){
            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql = $conexion->prepare("SELECT nombre,apellido,idpersonas from rolespersonas INNER JOIN personas using (idpersonas) WHERE idroles = ?");
            $sql->bind_param("i", $this->idroles);
            $sql->execute();
            $result = $sql->get_result();
            return $result;

        }
    }
?>