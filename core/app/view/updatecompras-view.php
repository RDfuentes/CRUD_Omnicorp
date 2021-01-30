<?php

if(count($_POST)>0){
	$compra = ComprasData::getById($_POST["compra_id"]);

	$compra->id_cliente = $_POST["id_cliente"];
	$compra->id_envio = $_POST["id_envio"];
	$compra->id_articulo = $_POST["id_articulo"];
	$compra->cantidad = $_POST["cantidad"];
	$compra->total = $_POST["total"];
	$compra->nota = $_POST["nota"];

  $is_active=0;
  if(isset($_POST["is_active"])){ $is_active=1;}

  $compra->is_active=$is_active;

	$compra->compra_id = $_SESSION["compra_id"];
	$compra->update();

	setcookie("prdupd","true");
	print "<script>window.location='index.php?view=editcompras&id=$_POST[compra_id]';</script>";


}


?>