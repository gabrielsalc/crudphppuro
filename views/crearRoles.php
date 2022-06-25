<?php include "../templates/header.php"; ?>
<?php 
  session_start();
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea un ROL</h2>
      <hr>
      <?php if(isset($_SESSION['Login.Error']))  {
        $cartel = $_SESSION['Login.Error'];
        echo "<script>window.alert('$cartel')</script>";
        unset($_SESSION['Login.Error']); }
      ?>
      <form action="../controllers/insertarRoles.php" method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Crear">
          <a class="btn btn-primary" href="indexRoles.php">Regresar atras</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include "../templates/footer.php"; ?>