<?php

$direccion = ClientesData::getById($_GET["id"]);
$direccion->del(); 

Core::redir("./index.php?view=clientes"); 
?>