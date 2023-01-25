<?php
require "./mvc/vistas/Vista.php";

if (!isset($_REQUEST) || isset($_REQUEST) and empty(($_REQUEST))) {
    //Página de inicio
    //Cargo la vista de la pagina principal
    $vistaPrincipal = new Vista();
    $vistaPrincipal->cargarVista("./media/html/mainPage.html");
    $vistaPrincipal->renderizarVista("./media/dictionaries/mainPage.php"); //La direccion del diccionario
    echo $vistaPrincipal->getVista("./media/html/mainPage.html");
} else {
    if ($_REQUEST["action"] == "alquilar") {
        //Si el usuario ha seleccionado alquilar
        require "alquilarController.php";
    } else if ($_REQUEST["action"] == "seleccion") {
        echo "alquiladando libros";
        //require "inventarioController.php";
    }else{
        require "inventarioController.php";
    }
}
