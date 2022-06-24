<?php
    require_once "../models/conexionDB.php";
    require_once "../models/personasModels.php";
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
    //llamo a personasController.php
    $obj = new personas();
    $datos = $obj->mostrarDatos(); //llamo a mi metodo y guardo la respuesta en $datos

    foreach ($datos as $key){ //el buen foreach para ordenar en la tabla
    ?>
        <tr>
        <td><?php echo $key['nombre']?></td>
        <td><?php echo $key['apellido']?></td>
        <td><?php echo $key['email']?></td>
        <td><?php if(isset($key['roles'])){ //me fijo si es rol es nulo para asi escribir otra cosa si es pertinente
            echo $key['roles'];
            }else{
                echo "No posee un Rol aun";}?></td>
        <td id="modificar"><a id="amodificar" href="modificarPersonas.php?variable=<?php echo $key['idpersonas'] //aqui mando la variable id?>"  class="btn btn-primary mt-4">Modificar</a></td>
        <td id="eliminar"><a id="aeliminar" href="../controllers/borrarPersonas.php?variable=<?php echo $key['idpersonas'] ?>"  class="btn btn-primary mt-4">Eliminar</a></td>
        <td id="agregar"><a id="aagregar" href="agregarRol.php?variable=<?php echo $key['idpersonas'] ?>"  class="btn btn-primary mt-4">Añadir Rol</a></td>
        </tr>
    <?php    
    }
    ?>
    <a href="crearPersonas.php"  class="btn btn-primary mt-4">Crear</a>
    <a href="../index.php"  class="btn btn-primary mt-4">Volver al Inicio</a>
<?php include "../templates/footer.php"; ?>