<?php
require_once "../models/conexionDB.php";
require_once "../models/rolesModels.php";

$id = $_GET['id'];
$obj = new roles();
$obj->idroles=$_GET['id'];
$values = $obj->seleccionarDatos();

require_once "../models/rolesModels.php";
?>
<?php include "../templates/header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Modificar <?php echo $values[0]['nombre'] ?></h2>
      <hr>
      <form action="../controllers/modificarRoles.php" method="post">
        <input type="text" hidden="" value="<?php echo $id ?>" name="id">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $values[0]['nombre'] ?>">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Modificar">
          <a class="btn btn-primary" href="indexRoles.php">Regresar atras</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include "../templates/footer.php"; ?>