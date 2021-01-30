<?php

if(count($_POST)>0){
  $compra = new ComprasData();
  $compra->id_cliente = $_POST["id_cliente"];
  $compra->id_envio = $_POST["id_envio"];
  $compra->id_articulo = $_POST["id_articulo"];
  $compra->cantidad = $_POST["cantidad"]; 
  $compra->total = $_POST["total"];
  $compra->nota = $_POST["nota"];
  $compra->add();
 
print "<script>window.location='index.php?view=compras';</script>";

}


?>