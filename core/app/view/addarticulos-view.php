<?php


if(count($_POST)>0){
  $articulo = new ArticulosData();
  $articulo->nombre = $_POST["nombre"];
  $articulo->id_fabrica = $_POST["id_fabrica"];
  $articulo->precio_costo = $_POST["precio_costo"];
  $articulo->precio_venta = $_POST["precio_venta"];
  $articulo->existencias = $_POST["existencias"];
  $articulo->descripcion = $_POST["descripcion"];
  $articulo->add();

print "<script>window.location='index.php?view=articulos';</script>";

}


?>