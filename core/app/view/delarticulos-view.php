<?php

$articulo = ArticulosData::getById($_GET["id"]);
$articulo->del(); 

Core::redir("./index.php?view=articulos"); 
?>