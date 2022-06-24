<?php

    class roles{

        public $nombre;
        public $idroles;

        public function mostrarDatos(){
            $c = new conectarRoles();
            $conexion = $c->conexion();
            $sql="SELECT idroles,nombre FROM roles";
            $result=mysqli_query($conexion,$sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function insertarDatos(){
            $c = new conectarRoles();
            $conexion = $c->conexion();

            $sql = $conexion->prepare("INSERT INTO roles (nombre) VALUES (?)");
            $sql->bind_param("s", $this->nombre);
            return $sql->execute();
        }
        public function modificarDatos(){
            $c = new conectarRoles();
            $conexion = $c->conexion();
            
            $sql= $conexion->prepare("UPDATE roles set nombre=? where idroles=?");
            $sql->bind_param("si", $this->nombre, $this->idroles);
            return $sql->execute();
        }
        public function borrarDatos(){

            $c = new conectarRoles();
            $conexion = $c->conexion();

            $sql= $conexion->prepare("DELETE from roles where idroles=?");
            $sql->bind_param("i", $this->idroles);
            return $sql->execute();
        }
    }
?>