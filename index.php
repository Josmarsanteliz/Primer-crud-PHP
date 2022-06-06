<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
<?php
require('config.php');
// $conexion=$base->query("SELECT * FROM `datosusuarios` WHERE 1");
// //lo guardare en una array
// $registros=$conexion->fetchAll(PDO::FETCH_OBJ);
$conexiones=$base->query("SELECT * FROM `datosusuarios` WHERE 1")->fetchAll(PDO::FETCH_OBJ);
if (isset($_POST['cr'])) {

  $nombre=$_POST['nom'];
  $app=$_POST['app'];
  $pai=$_POST['pai'];
  $sql="INSERT INTO `datosusuarios`(NOMBRE, APELLIDO, PAIS) VALUES(:nom, :app, :pai)";
  $resultado=$base->prepare($sql);
  $resultado->execute(array(":nom"=>$nombre, ":app"=>$app, ":pai"=>$pai));
}
 ?>

</head>

<body>


<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form class="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">


  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr>

<?php
//por cada persona que hay dentro en el registro repite

foreach ($conexiones as $persona):?>

   	<tr>
      <td><?php echo $persona->id?></td>
      <td><?php echo $persona->NOMBRE?></td>
      <td><?php echo $persona->APELLIDO?></td>
      <td><?php echo $persona->PAIS?></td>

      <td class="bot"><a href="delente.php?id=<?php echo $persona->id  ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="actualizar.php?id=<?php echo $persona->id ?> & nom=<?php echo $persona->NOMBRE ?> & app=<?php echo $persona->APELLIDO ?> & pai=<?php echo $persona->PAIS ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>
    <?php
endforeach

     ?>
	<tr>
	<td></td>
  
      <td><input type='text' name='nom' size='10' class='centrado'></td>
      <td><input type='text' name='app' size='10' class='centrado'></td>
      <td><input type='text' name='pai' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>
  </table>
</form>
<p>&nbsp;</p>


</body>
</html>
