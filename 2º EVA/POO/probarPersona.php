<?php
include "Persona.php";
//Instancio el objeto de la clase Persona
$p = new Persona(); 
//Asigno un nombre a este objeto
$p->nombre = "Pepe"; 
//Muestro por pantalla el nombre de este objeto
echo $p->nombre;
