<?php
require "./MVC/Vistas/Vista.php";

if (!isset($_REQUEST) || isset($_REQUEST) and empty(($_REQUEST))) {
    $vistaPrincipal = new Vista();
    $vistaPrincipal->cargarVista("./assets/html/index.html"); //le pasamos como parametro el html del main page
    //Intercambiamos las llaves del html por las palabras del diccionario 
    $vistaPrincipal->renderizarVista("./assets/dictionaries/main.php"); //La direccion del diccionario
    //Mostramos la vista
    echo $vistaPrincipal->getVista("./assets/html/index.html");
} else {
    if (isset($_REQUEST['action'])) {
        require_once "./MVC/Controladores/ColorController.php";
    }
}
