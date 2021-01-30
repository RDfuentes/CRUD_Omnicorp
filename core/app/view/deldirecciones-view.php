<?php

$direccion = DireccionesData::getById($_GET["id"]);
$direccion->del(); 

Core::redir("./index.php?view=direcciones"); 
?>