<?php
require_once "../models/conexionDB.php";
require_once "../models/personasModels.php";
require_once "../models/rolesModels.php";
$obj = new conexiondb(); //guardo los datos de conexion
$conexion = $obj->conexion(); //pruebo la conexion y si es exitosa se guardan los datos en $conexion
$id = $_GET['variable']; //recibo la variable desde el boton modificar
$sql = "SELECT nombre,apellido from personas where idpersonas='$id'"; //string de consulta
$result=mysqli_query($conexion, $sql);  //almaceno los datos
$values=mysqli_fetch_row($result);  //ordeno los datos

$obj2 = new roles();
$datos = $obj2->mostrarDatos();

require_once "../models/personasModels.php";
?>
<?php include "../templates/header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <h2 class="mt-4">Agregar Rol a <?php echo $values[0] ?> <?php echo $values[1] ?></h2>
        <hr>
        <form action="../controllers/agregarRol.php" method="post">
            <input type="text" hidden="" value="<?php echo $id ?>" name="idpersonas">
            <select name="roles" id="roles">
                <?php foreach ($datos as $key){?>
                <option value="<?php echo $key['idroles']?>"><?php var_dump($key['idroles']); echo $key['nombre']?></option>
                <?php
                }?>
            </select>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Agregar">
                <a class="btn btn-primary" href="indexPersonas.php">Regresar Atras</a>
            </div>
        </form>
    </div>
  </div>
</div>

<?php include "../templates/footer.php"; ?>