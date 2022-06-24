<?php

    class metodos{
        public function mostrarDatos($sql){
            $c = new conectarRoles();
            $conexion = $c->conexion();

            $result=mysqli_query($conexion,$sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function insertarDatos($datos){
            $c = new conectarRoles();
            $conexion = $c->conexion();

            $sql = "INSERT into roles (nombre) values ('$datos[0]')";
            $result =  mysqli_query($conexion, $sql);
            return $result;
        }
        public function modificarDatos($datos){
            $c = new conectarRoles();
            $conexion = $c->conexion();
            
            $sql= "UPDATE roles set nombre='$datos[0]' where id='$datos[2]'";
            $result =  mysqli_query($conexion, $sql);
            return $result;
        }
        public function borrarDatos($id){
            $c = new conectarRoles();
            $conexion = $c->conexion();
            $sql="DELETE from roles where id='$id'";
            $result =  mysqli_query($conexion, $sql);
            return $result;
        }
    }
?>