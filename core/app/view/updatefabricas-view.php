<?php

if(count($_POST)>0){
	$fabrica = FabricasData::getById($_POST["fabrica_id"]);

	$fabrica->nombre = $_POST["nombre"];
	$fabrica->telefono1 = $_POST["telefono1"];
	$fabrica->telefono2 = $_POST["telefono2"]; 

  $is_active=0;
  if(isset($_POST["is_active"])){ $is_active=1;}

  $fabrica->is_active=$is_active;

	$fabrica->user_id = $_SESSION["user_id"];
	$fabrica->update();

	setcookie("prdupd","true");
	print "<script>window.location='index.php?view=editfabricas&id=$_POST[fabrica_id]';</script>";


}


?>