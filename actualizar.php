<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include('config.php');
    //evitar que se vuelvan a leer
    //si n ohas pusaldo el boton de actualizar entonces haz esto
    if (!isset($_POST['submit'])) {
      $id=$_GET['id'];
     $nom=$_GET['nom'];
     $app=$_GET['app'];
     $pai=$_GET['pai'];
   } else {
     $id=$_POST['id'];
     $nom=$_POST['nombre'];
     $app=$_POST['apellido'];
     $pai=$_POST['pais'];
     $sql="UPDATE `datosusuarios` SET NOMBRE=:miNombre, APELLIDO=:miApellido, PAIS=:elPais WHERE id=:miId";
     $resultado=$base->prepare($sql); //crear consulta preparada
     $resultado->execute(array(":miNombre"=>$nom, ":miApellido"=>$app, ":elPais"=>$pai, ":miId"=>$id));
     header('location:index.php');
   }

     ?>
    <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

      <input type="text" name="id" value="<?php echo $id  ?>" placeholder="id" style="visibility:hidden">
              <input type="text" name="nombre" value="<?php echo $nom?>" placeholder="nombre">
              <input type="text" name="apellido" value="<?php echo $app?>" placeholder="apellido">
              <input type="text" name="pais" value="<?php echo $pai?>" placeholder="pais">

              <button type="submit" name="submit">actualizar</button>
    </form>
  </body>
</html>
