<?php
require "./mvc/vistas/vistaAlquilar.php";
$vistaA = new VistaAlquilar();
$vistaA->cargarVista("./media/html/alquilar.html");
$vistaA->renderizarVista("./media/dictionaries/alquileres.php");//La direccion del diccionario

//Cargo el modelo libreria para recuperar los datos de los libros
require "./mvc/modelo/libros.php";
$libreria = new Libreria();
$arrayLibros = $libreria->recuperarLibros();

//Ahora en la vista alquilar llamo al renderizar por palabra para que cambie las rows
$vistaA->renderizarKey("rows");

echo $vistaA->getVista("./media/html/alquilar.html");
