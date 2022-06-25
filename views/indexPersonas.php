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

                /*$obj2 = new personasroles();
                $datos2 = $obj2->seleccionarDatos($idpersonas);
                foreach($datos2 as $key2){
                    $idroles = $key2['idroles'];
                    $obj3 = new roles();
                    $datos3 = $obj3->seleccionarDatos($idroles);
                    foreach($datos3 as $key3){
                        if (isset($key3['nombre'])){
                            echo $key3['nombre'];
                        } else { echo "Aun no tiene Roles Asignados";}?><br><?php
                    }*/
                }?></td>
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