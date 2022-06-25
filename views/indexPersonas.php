<?php
    require_once "../models/conexionDB.php";
    require_once "../models/personasModels.php";
    require_once "../models/rolesModels.php";
    require_once "../models/personasrolesModels.php";
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
    $datos = $obj->mostrarDatos(); //llamo a mi metodo y guardo la respuesta en $dato

    foreach ($datos as $key){ //el buen foreach para ordenar en la tabla
    ?>
        <tr>
        
        <td><a href="mostrarPersonas.php?variable=<?php echo $key['idpersonas'];?>"><?php echo $key['nombre']?></a></td>
        <td><?php echo $key['apellido']?></td>
        <td><?php echo $key['email']?></td>
        </a>
        <td><?php
                $hola = new personas();
                $hola->idpersonas = $key['idpersonas'];
                $roles = $hola->dameRoles();
                foreach($roles as $key2){
                    echo $key2['nombre'];?>
                    <br>
                <?php
                }?></td>
        <td id="tdmodificar"><a id="amodificar" href="modificarPersonas.php?variable=<?php echo $key['idpersonas'] //aqui mando la variable id?>" id="modificarbtn" class="btn btn-primary mt-4">Modificar</a></td>
        <td id="tdeliminar"><a id="aeliminar" href="../controllers/borrarPersonas.php?variable=<?php echo $key['idpersonas'] ?>"  class="btn btn-primary mt-4">Eliminar</a></td>
        <td id="tdagregar"><a id="aagregar" href="agregarRol.php?variable=<?php echo $key['idpersonas'] ?>"  class="btn btn-primary mt-4">Añadir Rol</a></td>
        </tr>
    <?php    
    }
    ?>
    <a href="crearPersonas.php" id="botoncrear" class="btn btn-primary mt-4">Crear nueva Persona</a>
    <a href="../index.php" id="botoninicio"  class="btn btn-primary mt-4">Volver al Inicio</a>
<?php include "../templates/footer.php"; ?>