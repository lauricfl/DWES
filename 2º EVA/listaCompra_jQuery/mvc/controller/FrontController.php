<?php

if(!isset($_REQUEST) || isset($_REQUEST) and empty($_REQUEST)) {
    // Página principal
    // En este caso no tengo nada diferente a la lista de la compra que mostrar, así que cargo lo que cargaría si añadiese productos desde URL
    require_once './mvc/controller/MainController.php';
} else {
    if (isset($_REQUEST['action'])) {
        // El usuario está mandando una acción para realizar
        if (htmlspecialchars($_REQUEST['action'] == 'add')) {
            // Llamo al controlador AddProductController
            // Ahora sólo pasará por aquí cuando venga de un GET, porque el POST lo gestiono con jQuery
            require_once './mvc/controller/AddProductController.php';    
        }
    }
    
}