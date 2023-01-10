<?php
require "Producto.php";

//Instancio el objeto de la calse Producto
$p = new Producto();
//Asiganamos el nombre al objeto
$p->setNombre("pera");
//Mostramos el nombre del objeto
$p->mostrar();
