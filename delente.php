<?php
//delete a traves de la url

include('config.php');
$id=$_GET['id'];
$base->query("DELETE  FROM `datosusuarios` WHERE ID='$id'");
header('location:index.php');
 ?>
