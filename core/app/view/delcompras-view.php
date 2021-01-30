<?php

$compra = ComprasData::getById($_GET["id"]);
$compra->del(); 

Core::redir("./index.php?view=compras"); 
?>