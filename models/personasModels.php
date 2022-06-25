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
    
            $sql = $conexion->prepare("SELECT idpersonas,nombre,apellido,email FROM personas"); 
            $sql ->execute();
            $result = $sql->get_result();
            return $result;
        }

        public function seleccionarDatos(){

            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql = $conexion->prepare("SELECT nombre,apellido,email,edad,idpersonas FROM personas where idpersonas=?");
            $sql->bind_param("i", $this->idpersonas);
            $sql->execute();
            $resultSet = $sql->get_result();
            $data = $resultSet->fetch_all(MYSQLI_ASSOC);
            return $data;
        }

        public function insertarDatos(){
            
            $c = new conexiondb();
            $conexion = $c->conexion();

            $control = $conexion->prepare("SELECT email from personas where email=?");
            $control->bind_param("s", $this -> email);
            $control->execute();
            $resultSet = $control->get_result();
            $data = $resultSet->fetch_all(MYSQLI_ASSOC);
            if(count($data)>0){
                return 0;
            } else {
                $sql = $conexion->prepare("INSERT INTO personas (nombre, apellido, email, edad) VALUES (?, ?, ?, ?)");
                $sql->bind_param("ssss", $this->nombre, $this->apellido, $this->email, $this->edad);
                return $sql->execute();
            }
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