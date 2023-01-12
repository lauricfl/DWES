<?php

//Incluimos las clases en juego
include "Alumno.php";

//Creamos un alumno
$alumno = new Alumno("Laura", "Castro", 10);

//Instancio objeto de Persona
$persona = new Persona("1", "Laura", "Castro", "lacas@gmail.com");

//Ver objeto
var_dump($alumno);
var_dump($persona);
