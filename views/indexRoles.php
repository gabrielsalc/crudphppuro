<?php
    require_once "../models/conexionDB.php";
    require_once "../models/rolesModels.php";
include "../templates/header.php"; 
?>


<table style="border-collapse: collapse;" border="3">
    <tr>
        <td>Rol</td>
        <td>Personas</td>
    </tr>
<?php
    $obj = new roles();
    $datos = $obj->mostrarDatos();

    foreach ($datos as $key){
    ?>
        <tr>
        <td><?php echo $key['nombre']?></td>
        <td id="botoncitos" class="display-flex"><?php
                $hola = new roles();
                $hola->idroles = $key['idroles'];
                $roles = $hola->damePersonas();
                foreach($roles as $key2){
                    echo $key2['nombre'];?> <?php echo $key2['apellido'];?>
                    <a id="beliminar" href="../controllers/borrarPersonaRoles.php?variable1=<?php echo $key2['idpersonas'] ?>&variable2=<?php echo $key['idroles']?>"  class="btn btn-primary mt-4">X</a>
                    <br>
                <?php
                }?></td>
        <td id="agregar"><a id="aagregar" href="agregarPersona.php?id=<?php echo $key['idroles'] ?>"  class="btn btn-primary mt-4">Agregar Persona</a></td>
        <td id="modificar"><a  id="amodificar" href="modificarRoles.php?id=<?php echo $key['idroles'] ?>"  class="btn btn-primary mt-4">Modificar</a></td>
        <td id="eliminar"><a id="popover-<?php echo $key['idroles']?>" onclick="borrarRol(<?php echo $key['idroles']?>)" class="btn btn-primary mt-4">Eliminar</a></td>
        </tr>
    <?php    
    }
    ?>
    
    <a href="crearRoles.php" id="botoncrear" class="btn btn-primary mt-4">Crear Rol</a>
    <a href="../index.php" id="botoninicio" class="btn btn-primary mt-4">Volver al Inicio</a>

<?php include "../templates/footer.php"; ?>