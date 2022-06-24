<?php
require_once "../models/conexionRoles.php";
require_once "../controllers/rolesController.php";
include "../templates/header.php"; 
?>

<table style="border-collapse: collapse;" border="3">
    <tr>
        <td>Rol</td>
        <td>Personas</td>
    </tr>
<?php
    $obj = new metodos();
    $sql="SELECT id,nombre,personas FROM roles";
    $datos = $obj->mostrarDatos($sql);

    foreach ($datos as $key){
    ?>
        <tr>
        <td><?php echo $key['nombre']?></td>
        <td><?php if(isset($key['personas'])){
            echo $key['personas'];
            }else{
                echo "Aun no hay personas cubriendo este Rol";}?></td>
        <td id="modificar"><a href="modificarRoles.php?id=<?php echo $key['id'] ?>"  class="btn btn-primary mt-4">Modificar</a></td>
        <td id="eliminar"><a href="../procesos/borrarRoles.php?id=<?php echo $key['id'] ?>"  class="btn btn-primary mt-4">Eliminar</a></td>
        </tr>
    <?php    
    }
    ?>
    <a href="crearRoles.php"  class="btn btn-primary mt-4">Crear</a>
    <a href="../index.php"  class="btn btn-primary mt-4">Volver al Inicio</a>
<?php include "../templates/footer.php"; ?>