<?php

require_once "./MVC/Modelos/Pixel.php";
$vistaPrincipal = new Vista();
$vistaPrincipal->cargarVista("./assets/html/index.html"); //le pasamos como parametro el html del main page
//Intercambiamos las llaves del html por las palabras del diccionario 
$vistaPrincipal->renderizarVista("./assets/dictionaries/main.php"); //La direccion del diccionario

$pixel = new Pixel();
if (isset($_POST['coordenadas']) && isset($_POST['inputcolor'])) {

    $coordenadas = $_POST['coordenadas'];
    $color = $_POST['inputcolor'];
    //Las coordenadas vienen separadas por un guión, por lo que hay que separarlo para obtener la X y la Y
    $separadas = explode("-", $coordenadas);
    $x = $separadas[0];
    $y = $separadas[1];

    //Agregamos el color con las coordenadas a la base de datos
    //Tengo que usar el metodo intval() para transformar las coordenadas de string a int
    $pixel->addColor(intval($x), intval($y), $color);
    if ((isset($_GET['producto']) && isset($_GET['cantidad'])) || empty($_POST)) {
        echo $vistaPrincipal->getVista("./assets/html/index.html"); 
    }
    else if (isset($_POST['coordenadas']) && isset($_POST['inputcolor'])) {
        $array = array();
        array_push($array, $coordenadas, $color);
        echo json_encode($array);
    }
}