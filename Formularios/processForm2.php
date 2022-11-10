<?php

include 'funciones.php';

// Variables
$nombreAp = htmlspecialchars($_POST["nombreApellidos"]);
$curso = htmlspecialchars($_POST["curso"]);
$ciclo = htmlspecialchars($_POST["ciclo"]);

// Compruebo que los campos no están vacíos y que validan
if (!empty($nombreAp) && !empty($curso) && !empty($ciclo))    {
    if(!validar($nombreAp, VALIDA_NOMBREAP)) {
        echo "error de validación del nombre";
        exit();
    } elseif(!validar($curso, VALIDA_CURSO)) {
        echo "error de validación del curso";
        exit();
    } elseif(!validar($ciclo, VALIDA_CICLO)) {
        echo "error de validación del ciclo";
        exit();
    }
} else {
    echo "Ningún campo puede estar vacío";
    exit();
}

// Muestro el mensaje final
echo "El alumno $nombreAp está matriculado en el curso $curso del ciclo $ciclo";

?>