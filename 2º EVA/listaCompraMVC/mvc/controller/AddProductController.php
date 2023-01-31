<?php

// Cargo la vista 'ListaCompra' con los textos rellenos
require './mvc/view/ListaCompraView.php';

$vistaLista = new ListaCompraView();
$vistaLista->loadView('./media/html/addProductsTemplate.html');      // Plantilla
$vistaLista->renderView('./media/dictionaries/addProductDictionary.php');    // Diccionario

// Invoco el servicio SOAP
$options = array('uri' => 'http://localhost/', 'location' => 'http://localhost/dwes/DWES%20ABRIR%20ESTE/2%C2%BA%20EVA/listaCompraMVC/mvc/model/servidor_ListaCompra.php');
$client = new SoapClient(NULL, $options);

// Compruebo si se ha insertado algún producto nuevo
if (isset($_REQUEST['producto']) && isset($_REQUEST['cantidad'])) {

    // Me guardo los valores
    $producto = htmlspecialchars($_REQUEST['producto']);
    $cantidad = htmlspecialchars($_REQUEST['cantidad']);

    // Llamo al método de insertar producto
    $client->addProductoALaCesta($producto, $cantidad);
    
}

// Llamo al método de listar productos y con esta información
$arrayProductos = $client->recuperarProductos();

// Añado los productos a la tabla de la lista de la compra
$vistaLista->renderProductsTable('products_rows', $arrayProductos);    // Tabla productos

// Devuelvo la vista
echo $vistaLista->returnView();
 