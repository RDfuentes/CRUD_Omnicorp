<?php

// CARGA TODOS LOS ARCHIVOS NECESARIOS PARA FOMRULARIOS
include "controller/forms/lbForm.php";
include "controller/forms/lbInputText.php";
include "controller/forms/lbInputPassword.php";
include "controller/forms/lbValidator.php";

// ARCHIVOS NECESARIOS PARA CARGAR EL SISTEMA 
include "controller/Core.php";
include "controller/View.php";
include "controller/Module.php";
include "controller/Database.php";
include "controller/Executor.php";


// CARGA LOS MODELOS Y LOS ACTION
include "controller/Model.php";
include "controller/Bootload.php";
include "controller/Action.php";

// CONTROLA LOS INICIOS DE SESION 
include "controller/Session.php";
include "controller/Lb.php";

// ARCHIVO NECESARIO
include "controller/class.upload.php";


?>