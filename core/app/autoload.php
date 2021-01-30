<?php

// CARGA LOS ARCHIVOS NECESARIO PARA INICIALIZAR EL SISTEMA

function __autoload($modelname){
	if(Model::exists($modelname)){
		include Model::getFullPath($modelname);
	} 

}

?>