<?php
require "Producto.php";
//Iniciar sesion
session_start();
//Instancio el objeto de la clase Producto
$mesa = new Producto("Mesuki");
$pepe = new Producto("Pepe");
//Almaceno como variable de sesion el objeto pepe
$_SESSION["pepe"] = serialize($pepe);
var_dump($_SESSION);
//Voy a ver cuantos productos llevo creados
echo "Cantidad de objetos: ".$mesa->getCantidad()."<br>";

//Mostramos nombres de los objetos si pertenecen a la clase Prodcuto
if($mesa instanceof Producto){
   echo $mesa->mostrar()."<br>";
}
if($pepe instanceof Persona){
    echo $pepe->mostrar()."<br>";
 }else{
    echo "<br>".get_class($pepe);
 }

/* //Mostrar nombres de los objetos creados
echo $pepe->mostrar()."<br>";
 */
//Asiganamos el nombre al objeto
$mesa->setNombre("nuevoNombreMesa");

//Mostramos el nombre del objeto
$mesa->mostrar();

//Destruimos el objeto pepe
$pepe = null;

//VMostrar el inventqario de productos
echo "<br>Productos despues de destruir a Pepe: ".$mesa->getCantidad()."<br>";

