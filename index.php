<?php include "templates/header.php";
echo "<script>window.alert('Usuario o mail ya en uso')</script>";?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    <!-- INICIO DEL CRUD -->
      <a href="views/indexPersonas.php"  class="btn btn-primary mt-4">Personas</a>
      <hr>
    </div>
    <div class="col-md-12">
      <a href="views/indexRoles.php"  class="btn btn-primary mt-4">Roles</a>
      <hr>
    </div>
  </div>
</div>

<?php include "templates/footer.php"; ?>