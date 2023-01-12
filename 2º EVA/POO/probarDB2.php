<?php
//Incluiomos las clases
include "DB.php";
include "Producto.php";
//Creamos un objeto DB
$db = new DB();

//Creamos objeto Producto
$leche = new Producto("Leche entera");
var_dump($leche);

//Conectamos base de datos
$db->connect();

//Insertamos objeto Producto en BD
$db->insertObject($leche, 'tproductos');

//Rescatamos de la bd a un Producto nuevo
$lecheRecuperada = $db->queryObject('tproductos');
var_dump($lecheRecuperada);