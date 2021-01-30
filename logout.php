<?php
// Sesion inicializada
session_start();

// Eliminar la sesion - cerrarla
if(isset($_SESSION['user_id'])){
	unset($_SESSION['user_id']);
}

// Destruir la sesion - cerrar
session_destroy();

// Aca nos redirige el index para verificar el inicio de sesion
print "<script>window.location='./';</script>";
?>