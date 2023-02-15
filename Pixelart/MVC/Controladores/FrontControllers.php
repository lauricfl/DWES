<?php
require "./MVC/Vistas/Vista.php";

if (!isset($_REQUEST) || isset($_REQUEST) and empty(($_REQUEST))) {
    //Si el usuario no ha realizado ninguna accion se le muestra la pagina principal 
    //Se crea una nueva vista
    $vistaPrincipal = new Vista();
    $vistaPrincipal->cargarVista("./assets/html/index.html"); //le pasamos como parametro el html del main page
    //Intercambiamos las llaves del html por las palabras del diccionario 
    $vistaPrincipal->renderizarVista("./assets/dictionaries/main.php"); //La direccion del diccionario
    //Mostramos la vista
    echo $vistaPrincipal->getVista("./assets/html/index.html");
} /* else {
    //Si ha hecho alguna de las acciones se le redirige en funcion de lo que haya seleccionado
    if ($_REQUEST["action"] == "matricula") {
        //Ha pinchado sobre el botón de matricularse. Nos dirigimos al controlador de los Ciclos
        require "./mvc/controlador/ciclosController.php";
    } else if ($_REQUEST["action"] == "formulario") {
        //Ha pinchado en algún ciclo y entra al formulario a través del contrador Formulario
        require "./mvc/controlador/formularioController.php";
    }else if($_REQUEST['action']==="confirmacion" ){
        //Ha rellenado el formulario y le llevamos a la página de confirmacion de la matricula.
        require "./mvc/controlador/matriculaController.php";
    } 
   
}
 */