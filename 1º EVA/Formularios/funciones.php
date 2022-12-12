<?php

include_once 'configForm.php';

/**
 * Función validar valida un dato de formulario con una expresión regular
 * @param datoAValidar cadena de texto que se quiere validar
 * @param expresionRegular expresión regular con la que validarla
 * 
 * @return valida true o false en función de si valida o no
 */
function validar($datoAValidar, $expresionRegular) {
    // Valido el campo
    if (preg_match($expresionRegular, $datoAValidar))   {
        $valida = true;
    } else {
        $valida = false;
    }

    return $valida;

}

?>