<?php

if(count($_POST)>0){
	$direccion = DireccionesData::getById($_POST["direccion_id"]);

	$direccion->nombre = $_POST["nombre"];
	$direccion->calle = $_POST["calle"];
	$direccion->comuna = $_POST["comuna"];
	$direccion->ciudad = $_POST["ciudad"];

  $is_active=0;
  if(isset($_POST["is_active"])){ $is_active=1;}

  $direccion->is_active=$is_active;

	$direccion->user_id = $_SESSION["user_id"];
	$direccion->update();

	setcookie("prdupd","true");
	print "<script>window.location='index.php?view=editdirecciones&id=$_POST[direccion_id]';</script>";


}


?>