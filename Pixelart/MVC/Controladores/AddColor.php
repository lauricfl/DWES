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
    if ($pixel->addColor(intval($x), intval($y), $color) === "Color actualizado correctamente") {
        //Si se ha actualizado el color en la BBDD, devolver los datos para pintarlos en la tabla
        $vistaPrincipal = new Vista();
        $vistaPrincipal->cargarVista("./assets/html/index.html"); //le pasamos como parametro el html del main page
        //Intercambiamos las llaves del html por las palabras del diccionario 
        $vistaPrincipal->renderizarVista("./assets/dictionaries/main.php"); //La direccion del diccionario
        //Mostramos la vista
        echo $vistaPrincipal->getVista("./assets/html/index.html");
        echo json_encode($_POST);
    } else {
        echo "Algo ha fallado";
    }
}
