<?php include "../templates/header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea un ROL</h2>
      <hr>
      <form action="procesos/insertar.php" method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Crear">
          <a class="btn btn-primary" href="../index.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include "../templates/footer.php"; ?>