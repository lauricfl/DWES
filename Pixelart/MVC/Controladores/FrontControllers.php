<?php
require "./MVC/Vistas/Vista.php";

if (!isset($_REQUEST) || isset($_REQUEST) and empty(($_REQUEST))) {
    require_once './MVC/Controladores/MostrarColor.php';    
/* 
    //Si el usuario no ha realizado ninguna accion se le muestra la pagina principal 
    //Se crea una nueva vista
    $vistaPrincipal = new Vista();
    $vistaPrincipal->cargarVista("./assets/html/index.html"); //le pasamos como parametro el html del main page
    //Intercambiamos las llaves del html por las palabras del diccionario 
    $vistaPrincipal->renderizarVista("./assets/dictionaries/main.php"); //La direccion del diccionario
    //Mostramos la vista
    echo $vistaPrincipal->getVista("./assets/html/index.html"); */
} else {
    if (isset($_REQUEST['action'])) {
        // El usuario está mandando una acción para realizar
        if (htmlspecialchars($_REQUEST['action'] == 'add')) {
            // Llamo al controlador AddProductController
            // Ahora sólo pasará por aquí cuando venga de un GET, porque el POST lo gestiono con jQuery
            require_once './MVC/Controladores/AddColor.php';    
        }
    }
    
}