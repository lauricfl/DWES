<?php

// Cargo la vista 'ListaCompra' con los textos rellenos
require './mvc/view/ListaCompraView.php';
$vistaLista = new ListaCompraView();
$vistaLista->loadView('./media/html/addProductsTemplate.html');      // Plantilla
$vistaLista->renderView('./media/dictionaries/addProductDictionary.php');    // Diccionario

// Invoco al modelo 'ListaCompra'
require_once './mvc/model/ListaCompraModel.php';
$listaCompra = new ListaCompraModel();

// Compruebo si se ha insertado algún producto nuevo
if ((isset($_REQUEST['producto']) && isset($_REQUEST['cantidad']))  || empty($_POST)) {

    /*  // Me guardo los valores
    $producto = htmlspecialchars($_REQUEST['producto']);
    $cantidad = htmlspecialchars($_REQUEST['cantidad']);

    // Llamo al método de insertar producto
    $listaCompra->insertarProducto($producto, $cantidad); */

    // Añado los productos a la tabla de la lista de la compra
    $vistaLista->renderProductsTable('products_rows', $arrayProductos);    // Tabla productos

    // Devuelvo la vista
    echo $vistaLista->returnView();
    
} else if (isset($_POST['producto']) && isset($_POST['cantidad'])) {
    //Aqui es donde me manda el JQuery AJAX
    echo json_encode($arrayProductos);
}

// Llamo al método de listar productos y con esta información
$arrayProductos = $listaCompra->recuperarProductos();
