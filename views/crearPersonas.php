<?php include "../templates/header.php"; 

session_start();
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea una Persona</h2>
      <hr>
      <?php if(isset($_SESSION['Login.Error']))  {
        $cartel = $_SESSION['Login.Error'];
        echo "<script>window.alert('$cartel')</script>";
        unset($_SESSION['Login.Error']); }
      ?>
      <form action="../controllers/insertarPersonas.php" method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input type="text" name="apellido" id="apellido" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="edad">Edad</label>
          <input type="text" name="edad" id="edad" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" id="amodificar" class="btn btn-primary" value="Crear">
          <a class="btn btn-primary" id="aeliminar" href="indexPersonas.php">Regresar Atras</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include "../templates/footer.php"; ?>