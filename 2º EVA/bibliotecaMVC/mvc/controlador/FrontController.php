<?php
require "./mvc/vistas/Vista.php";

if(!isset($_REQUEST) || isset($_REQUEST) and empty(($_REQUEST))){
    //Página de inicio
    //Cargo la vista de la pagina principal
    $vistaPrincipal = new Vista();
    $vistaPrincipal->cargarVista("./media/html/mainPage.html");
    $vistaPrincipal->renderizarVista("./media/dictionaries/mainPage.php");//La direccion del diccionario
    echo $vistaPrincipal->getVista();
}else{
    if($_REQUEST["action"]=="alquilar"){
        //Si el usuario ha seleccionado alquilar
    }else{
        //Si el usuario selecciona devolver
    }

}