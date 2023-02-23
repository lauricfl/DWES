<?php

require_once "./MVC/Modelos/Pixel.php";

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
}
    echo json_encode($pixel->getPixels());
