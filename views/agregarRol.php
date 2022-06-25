<?php
require_once "../models/conexionDB.php";
require_once "../models/personasModels.php";
require_once "../models/rolesModels.php";
$id = $_GET['variable'];
$obj = new personas;
$obj->idpersonas=$_GET['variable'];
$datos1 = $obj -> seleccionarDatos();

$obj2 = new roles();
$datos = $obj2->mostrarDatos();

require_once "../models/personasModels.php";
?>
<?php include "../templates/header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
        <h2 class="mt-4">Agregar Rol a <?php echo $datos1[0]['nombre'] ?> <?php echo $datos1[0]['apellido'] ?></h2>
        <hr>
        <form action="../controllers/agregarRol.php" method="post">
            <input type="text" hidden="" value="<?php echo $id ?>" name="idpersonas">
            <select name="roles" id="roles">
                <?php foreach ($datos as $key){?>
                <option value="<?php echo $key['idroles']?>"><?php echo $key['nombre']?></option>
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