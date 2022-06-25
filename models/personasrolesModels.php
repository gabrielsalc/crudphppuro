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
        public function seleccionarDatos(){
            $c = new conexiondb();
            $conexion = $c->conexion();

            $sql = $conexion ->prepare("SELECT idroles FROM rolespersonas where idpersonas=?");
            $sql->bind_param("i", $this->idpersonas);
            $sql->execute();
            $resultSet = $sql->get_result();
            $data = $resultSet->fetch_all();
            return $data;
        }
        public function insertarDatos(){
            $c = new conexiondb();
            $conexion = $c->conexion();


            $control = $conexion->prepare("SELECT idroles from rolespersonas where idpersonas=?");
            $control->bind_param("i", $this->idpersonas);
            $control->execute();
            $resultSet = $control->get_result();
            $data = $resultSet->fetch_all(MYSQLI_ASSOC);
            $indice = 0;
            foreach($data as $key){
                if($key['idroles'] == $this->idroles){
                    $indice = 1;
                }
            }
            if($indice>0){
                return 0;
            } else {
            $sql = $conexion->prepare("INSERT INTO rolespersonas (idpersonas,idroles) VALUES (?, ?)");
            $sql->bind_param("ii", $this->idpersonas, $this->idroles);
            return $sql->execute();
        }
        }   
        public function insertarDatosPersona(){
            $c = new conexiondb();
            $conexion = $c->conexion();


            $control = $conexion->prepare("SELECT idpersonas from rolespersonas where idroles=?");
            $control->bind_param("i", $this->idroles);
            $control->execute();
            $resultSet = $control->get_result();
            $data = $resultSet->fetch_all(MYSQLI_ASSOC);
            $indice = 0;
            foreach($data as $key){
                if($key['idpersonas'] == $this->idpersonas){
                    $indice = 1;
                }
            }
            if($indice>0){
                return 0;
            } else {
            $sql = $conexion->prepare("INSERT INTO rolespersonas (idpersonas,idroles) VALUES (?, ?)");
            $sql->bind_param("ii", $this->idpersonas, $this->idroles);
            return $sql->execute();
        }
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

            $sql= $conexion->prepare("DELETE from rolespersonas where idpersonas=? and idroles=?");
            $sql->bind_param("ii", $this->idpersonas, $this->idroles);
            return $sql->execute();
        }
    }
?>