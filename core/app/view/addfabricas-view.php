<?php


if(count($_POST)>0){
  $fabrica = new FabricasData();
  $fabrica->nombre = $_POST["nombre"];
  $fabrica->telefono1 = $_POST["telefono1"];
  $fabrica->telefono2 = $_POST["telefono2"];
  $fabrica->add();

print "<script>window.location='index.php?view=fabricas';</script>";

}


?>