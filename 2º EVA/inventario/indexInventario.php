<?php
include "Persona.php";
include "Zanahoria.php";
include "Inventario.php";
$personas = array();
//Crear persona
$pepe = new Persona("Pepe", "Lopez", 25, 1200);
$personas[] = $pepe;

//Crear inventario asociado a la persona
$invent1 = new Inventario($pepe);
$invent2 = new Inventario($pepe);

//Crear una zanahoria y asociarla al inventario
$zanahoria = new Zanahoria(0.75, "18-12-2020", 3);
$zanahoria2 = new Zanahoria(1.59, "13-12-2008", 3);
$colacao = new Producto("marron", "colacao", 3, "01-01-2080", 1.5);
//Meter la zanahoria al inventario
$invent1->anadirProducto($zanahoria);
$invent1->anadirProducto($zanahoria2);
$invent1->anadirProducto($colacao);

$invent1->getInventario();
echo "<br>";
echo "<br>Total de productos en el inventario de ".$invent1->getPropietario().": ".$invent1->getCantidad();

$invent2->anadirProducto($colacao);
//Mostrar las personas creadas con sus inventarios y numero de productos (y que productos) de esos inventarios
//var_dump($invent1->getInventario());
echo "He creado ".count($personas)." personas con nombres: ";
foreach ($personas as $persona) {
    echo "<br>".$persona->getNombre();
    //Mostrar inventario de esa persona
}
//Eliminamos la zanahoria2
$invent1->eliminarProducto($zanahoria2);
echo "<br><br>";
$invent1->getInventario();
echo "<br>Total de productos en el inventario de ".$invent1->getPropietario().": ".$invent1->getCantidad();