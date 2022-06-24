<?php
$config = include 'configbase.php';

try {
  $conexion = new PDO('mysql:host=' . $config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['options']);
  $sql = file_get_contents("phpcrud.sql");
  
  $conexion->exec($sql);
  echo "La base de datos phpcrud y las tablas personas y roles se han creado con éxito.";
} catch(PDOException $error) {
  echo $error->getMessage();
}


