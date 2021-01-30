<?php

if(count($_POST)>0){
	$cliente = ClientesData::getById($_POST["cliente_id"]);

	$cliente->codigo = $_POST["codigo"];
	$cliente->nombres = $_POST["nombres"];
	$cliente->apellidos = $_POST["apellidos"];
	$cliente->credito = $_POST["credito"];
	$cliente->descuento = $_POST["descuento"];
	$cliente->saldo = $_POST["saldo"];

  $is_active=0;
  if(isset($_POST["is_active"])){ $is_active=1;}

  $cliente->is_active=$is_active;

	$cliente->cliente_id = $_SESSION["cliente_id"];
	$cliente->update();

	setcookie("prdupd","true");
	print "<script>window.location='index.php?view=editclientes&id=$_POST[cliente_id]';</script>";


}


?>