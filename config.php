<?php
try {
  $user="root";
  $password='';
  $base= new PDO("mysql:host=localhost; dbname=curso_php2", $user, $password);
  //atributos
  $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $base->exec("SET CHARACTER SET UTF8");
} catch (Exception $e) {
  //acaba con al conexion y dinso
die('Error' . $e->GetMessage());
}


 ?>
