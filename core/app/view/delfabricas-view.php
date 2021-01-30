<?php

$nota = FabricasData::getById($_GET["id"]);
$nota->del();

Core::redir("./index.php?view=fabricas");
?>