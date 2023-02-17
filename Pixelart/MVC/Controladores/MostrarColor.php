<?php


require_once "./MVC/Modelos/Pixel.php";
$vistaPrincipal = new Vista();
$vistaPrincipal->cargarVista("./assets/html/index.html"); //le pasamos como parametro el html del main page
//Intercambiamos las llaves del html por las palabras del diccionario 
$vistaPrincipal->renderizarVista("./assets/dictionaries/main.php"); //La direccion del diccionario

$pixel = new Pixel();


if ((isset($_GET['producto']) && isset($_GET['cantidad'])) || empty($_POST)) {
    echo $vistaPrincipal->getVista("./assets/html/index.html"); 
}
else if (isset($_POST[""])) {
    echo json_encode($pixel->getPixels());
}
