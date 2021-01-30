<?php

if(count($_POST)>0){
	$articulo = ArticulosData::getById($_POST["articulo_id"]);

	$articulo->nombre = $_POST["nombre"];
	$articulo->id_fabrica = $_POST["id_fabrica"];
	$articulo->precio_costo = $_POST["precio_costo"];
	$articulo->precio_venta = $_POST["precio_venta"];
	$articulo->existencias = $_POST["existencias"];
	$articulo->descripcion = $_POST["descripcion"];

  $is_active=0;
  if(isset($_POST["is_active"])){ $is_active=1;}

  $articulo->is_active=$is_active;

	$articulo->articulo_id = $_SESSION["articulo_id"];
	$articulo->update();

	setcookie("prdupd","true");
	print "<script>window.location='index.php?view=editarticulos&id=$_POST[articulo_id]';</script>";


}


?>