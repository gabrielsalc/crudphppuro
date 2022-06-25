<?php



    class personas{

        public $nombre;
        public $apellido;
        public $email;
        public $edad;
        public $idpersonas;

        public function mostrarDatos(){
            $c = new conexiondb(); //guardo en $c los datos de conexion
            $conexion = $c->conexion(); //si la conexion es exitosa, guardo en $conexion los datos
            $sql = "SELECT idpersonas,nombre,apellido,email FROM personas";
            $result=mysqli_query($conexion,$sql); //realizo y guardo la consulta en result
            return mysqli_fetch_all($result, MYSQLI_ASSOC); //MYSQLI_ASSOC hace que el fetch all se comporte como fetch row
        }

        public function seleccionarDatos($dato){
            $c = new conexiondb();
            $conexion = $c->conexion();
            $sql = "SELECT nombre,apellido,email,edad FROM personas where idpersonas=$dato";
            $result=mysqli_query($conexion,$sql); 
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        public function insertarDatos(){
            
            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql = $conexion->prepare("INSERT INTO personas (nombre, apellido, email, edad) VALUES (?, ?, ?, ?)");
            $sql->bind_param("ssss", $this->nombre, $this->apellido, $this->email, $this->edad);
            //$sql = "INSERT into personas (nombre,apellido,email,edad) values ('$this->nombre', '$this->apellido','$this->email','$this->edad')";
            //$result =  mysqli_query($conexion, $sql);
            //return $result;
            return $sql->execute();

        }

        public function modificarDatos(){

            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql= $conexion->prepare("UPDATE personas set nombre=?, apellido=? ,email=?, edad=? where idpersonas=?");
            $sql->bind_param("ssssi", $this->nombre, $this->apellido, $this->email, $this->edad, $this->idpersonas);
            return $sql->execute();
        }

        public function borrarDatos(){
            $c = new conexiondb();
            $conexion = $c->conexion();
            $sql = $conexion->prepare("DELETE from rolespersonas where idpersonas=?");
            $sql->bind_param("i", $this->idpersonas);
            $sql->execute();
            $sql= $conexion->prepare("DELETE from personas where idpersonas=?");
            $sql->bind_param("i", $this->idpersonas);
            return $sql->execute();
        }

        public function dameRoles(){
            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql = $conexion->prepare("SELECT nombre from rolespersonas INNER JOIN roles using (idroles) WHERE idpersonas = ?");
            $sql->bind_param("i", $this->idpersonas);
            $sql->execute();
            $result = $sql->get_result();
            return $result;

        }
    }
?>