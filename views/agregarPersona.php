<?php
require_once "../models/conexionDB.php";
require_once "../models/personasModels.php";
require_once "../models/rolesModels.php";

$id = $_GET['id'];
$obj = new roles();
$obj->idroles = $_GET['id'];
$values = $obj->seleccionarDatos();


$obj2 = new personas();
$datos = $obj2->mostrarDatos();

require_once "../models/personasModels.php";
?>
<?php include "../templates/header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <h2 class="mt-4">Agregar Persona a <?php echo $values[0]['nombre'] ?></h2>
        <hr>
        <form action="../controllers/agregarPersona.php" method="post">
            <input type="text" hidden="" value="<?php echo $id ?>" name="idroles">
            <select name="personas" id="personas">
                <?php foreach ($datos as $key){?>
                <option value="<?php echo $key['idpersonas'];?>"><?php echo $key['nombre']?> <?php echo $key['apellido']?></option>
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