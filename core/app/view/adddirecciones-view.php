<?php


if(count($_POST)>0){
  $direccion = new DireccionesData();
  $direccion->nombre = $_POST["nombre"];
  $direccion->calle = $_POST["calle"];
  $direccion->comuna = $_POST["comuna"];
  $direccion->ciudad = $_POST["ciudad"];
  $direccion->add();

print "<script>window.location='index.php?view=direcciones';</script>";

}


?>