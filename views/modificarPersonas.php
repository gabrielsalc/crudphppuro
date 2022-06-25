<?php
require_once "../models/conexionDB.php";
require_once "../models/personasModels.php";

$obj = new personas;
$obj->idpersonas=$_GET['variable'];
$datos = $obj -> seleccionarDatos();


require_once "../models/personasModels.php";
?>
<?php include "../templates/header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Modificar <?php echo $datos[0]['nombre'] ?></h2>
      <hr>
      <form action="../controllers/modificarPersonas.php" method="post">
        <input type="text" hidden="" value="<?php echo $datos[0]['idpersonas']?>" name="idpersonas">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $datos[0]['nombre'] ?>">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" name="apellido" id="apellido" value="<?php echo $datos[0]['apellido'] ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" value="<?php echo $datos[0]['email'] ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="edad">Edad</label>
          <input type="text" name="edad" id="edad" value="<?php echo $datos[0]['edad'] ?>" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Modificar">
          <a class="btn btn-primary" href="indexPersonas.php">Regresar Atras</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include "../templates/footer.php"; ?>