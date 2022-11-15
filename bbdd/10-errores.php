<?php
/*
Cambio en la configuración de errores de PHP
*/
//error_reporting(E_ALL & ~E_ERROR);
$resultado = 5 / 0;
echo "Estoy después de la división por cero";
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

?>