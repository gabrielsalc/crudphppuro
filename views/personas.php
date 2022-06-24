<?php
require_once "../models/conexion.php";
require_once "../controllers/personasController.php";
include "../templates/header.php"; 
?>

<table style="border-collapse: collapse;" border="3">
    <tr>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Email</td>
        <td>Rol</td>
    </tr>
<?php
    $obj = new metodos();
    $sql="SELECT id,nombre,apellido,email,roles FROM personas";
    $datos = $obj->mostrarDatos($sql);

    foreach ($datos as $key){
    ?>
        <tr>
        <td><?php echo $key['nombre']?></td>
        <td><?php echo $key['apellido']?></td>
        <td><?php echo $key['email']?></td>
        <td><?php if(isset($key['roles'])){
            echo $key['roles'];
            }else{
                echo "No tiene Rol";}?></td>
        <td><a href="modificar.php?id=<?php echo $key['id'] ?>"  class="btn btn-primary mt-4">Modificar</a></td>
        </tr>
    <?php    
    }
    ?>
    <a href="crearpersona.php"  class="btn btn-primary mt-4">Crear</a>
    <a href="../index.php"  class="btn btn-primary mt-4">Volver al Inicio</a>
<?php include "../templates/footer.php"; ?>