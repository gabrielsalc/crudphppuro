<?php
require_once "../models/conexionPersonas.php";
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
                echo "No posee un Rol aun";}?></td>
        <td id="modificar"><a href="modificarPersonas.php?id=<?php echo $key['id'] ?>"  class="btn btn-primary mt-4">Modificar</a></td>
        <td id="eliminar"><a href="../procesos/borrarPersonas.php?id=<?php echo $key['id'] ?>"  class="btn btn-primary mt-4">Eliminar</a></td>
        </tr>
    <?php    
    }
    ?>
    <a href="crearPersonas.php"  class="btn btn-primary mt-4">Crear</a>
    <a href="../index.php"  class="btn btn-primary mt-4">Volver al Inicio</a>
<?php include "../templates/footer.php"; ?>