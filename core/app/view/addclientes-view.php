<?php


if(count($_POST)>0){
  $cliente = new ClientesData();
  $cliente->codigo = $_POST["codigo"];
  $cliente->nombres = $_POST["nombres"];
  $cliente->apellidos = $_POST["apellidos"];
  $cliente->credito = $_POST["credito"];
  $cliente->descuento = $_POST["descuento"];
  $cliente->saldo = $_POST["saldo"];
  $cliente->add();

print "<script>window.location='index.php?view=clientes';</script>";

}


?>