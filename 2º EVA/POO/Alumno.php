<?php
include "Persona.php";

final class Alumno extends Persona{
    private $notas;

    function __construct($nombre, $apellidos, $notas)
    {
        parent::__construct($nombre, $apellidos);
        $this->notas = $notas;
    }
}