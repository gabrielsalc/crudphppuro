<?php

    class metodos{
        public function mostrarDatos($sql){
            $c = new conectarpersonas();
            $conexion = $c->conexion();

            $result=mysqli_query($conexion,$sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function insertarDatos($datos){
            $c = new conectarpersonas();
            $conexion = $c->conexion();

            $sql = "INSERT into personas (nombre,apellido,email,edad) values ('$datos[0]', '$datos[1]','$datos[2]','$datos[3]')";
            $result =  mysqli_query($conexion, $sql);
            return $result;
        }
        public function modificarDatos($datos){
            $c = new conectarpersonas();
            $conexion = $c->conexion();

            $sql= "UPDATE personas set nombre='$datos[0]',apellido='$datos[1]',email='$datos[2]',edad='$datos[3]' where id='$datos[4]'";
            $result =  mysqli_query($conexion, $sql);
            return $result;
        }
    }
?>