<?php
/*
Manejo de errores propio
*/
set_error_handler("miGestorDeErrores");     // fuerzo la utilización de mi gestor
include_once('pepito.php');                      // incluyo un fichero que no existe
restore_error_handler();                    // le paso el control de errores a PHP
include_once('pepito.php');                      // incluyo un fichero que no existe

function miGestorDeErrores($nivel, $mensaje)
{
    switch ($nivel) {
        case E_WARNING:
            echo "Error de tipo WARNING: $mensaje. " . "<br />";
            break;
        default:
            echo "Error de tipo no especificado: $mensaje." . "<br />";
    }
}