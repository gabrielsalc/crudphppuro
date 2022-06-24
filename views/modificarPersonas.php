<?php
require_once "../models/conexionPersonas.php";
$obj = new conectarpersonas(); //guardo los datos de conexion
$conexion = $obj->conexion(); //pruebo la conexion y si es exitosa se guardan los datos en $conexion
$id = $_GET['id']; //recibo la variable desde el boton modificar
$sql = "SELECT nombre,apellido,email,edad from personas where id='$id'"; //string de consulta
$result=mysqli_query($conexion, $sql);  //almaceno los datos
$values=mysqli_fetch_row($result);  //ordeno los datos

require_once "../controllers/personasController.php";
?>
<?php include "../templates/header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Modificar <?php echo $values[0] ?></h2>
      <hr>
      <form action="../procesos/modificarPersonas.php" method="post">
        <input type="text" hidden="" value="<?php echo $id ?>" name="id">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $values[0] ?>">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" name="apellido" id="apellido" value="<?php echo $values[1] ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" value="<?php echo $values[2] ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="edad">Edad</label>
          <input type="text" name="edad" id="edad" value="<?php echo $values[3] ?>" class="form-control">
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