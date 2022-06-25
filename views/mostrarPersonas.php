<?php
    require_once "../models/conexionDB.php";
    require_once "../models/personasModels.php";
    require_once "../models/rolesModels.php";
    require_once "../models/personasrolesModels.php";
    include "../templates/header.php"; 

    $id = $_GET['variable'];
    $obj =new personas();
    $datos = $obj->seleccionarDatos($id);
?>

<div id="show">Nombre:
    <?php foreach ($datos as $key) {
        echo $key['nombre']; ?> 
    <?php echo $key['apellido']; ?>
    <br>Email: 
    <?php echo $key['email']; ?>
    <br>Edad: 
    <?php echo $key['edad'];?>
    <br>
    Roles: 
    <?php 
    }
    
    $obj2 = new personasroles();
    $datos2 = $obj2->seleccionarDatos($id);
        foreach($datos2 as $key2){
            $idroles = $key2['idroles'];
            $obj3 = new roles();
            $datos3 = $obj3->seleccionarDatos($idroles);
                foreach($datos3 as $key3){
                        echo $key3['nombre'];?> <?php
                }
            }?>
    <br>
    <form>
        <a href="indexpersonas.php" class="btn btn-primary mt-4">Volver Atras</a>
        <a id="amodificar" href="modificarPersonas.php?variable=<?php echo $id //aqui mando la variable id?>"  class="btn btn-primary mt-4">Modificar</a>
        <a id="aeliminar" href="../controllers/borrarPersonas.php?variable=<?php echo $id ?>"  class="btn btn-primary mt-4">Eliminar</a>
        <a id="aagregar" href="agregarRol.php?variable=<?php echo $id ?>"  class="btn btn-primary mt-4">Añadir Rol</a>
    </form>
</div>




<?php include "../templates/footer.php"; ?>


