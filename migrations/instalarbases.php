<?php
$config = include 'configpersonas.php';

try {
  $conexion = new PDO('mysql:host=' . $config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['options']);
  $sql = file_get_contents("personas.sql");
  
  $conexion->exec($sql);
  echo "La base de datos y la tabla de personas se han creado con éxito.";
} catch(PDOException $error) {
  echo $error->getMessage();
}

$config = include 'configroles.php';

try {
  $conexion = new PDO('mysql:host=' . $config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['options']);
  $sql = file_get_contents("roles.sql");
  
  $conexion->exec($sql);
  echo "La base de datos y la tabla de roles se han creado con éxito.";
} catch(PDOException $error) {
  echo $error->getMessage();
}

