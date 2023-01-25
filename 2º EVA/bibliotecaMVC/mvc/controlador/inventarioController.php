<?php

$vista = new Vista();
$vista->cargarVista("./media/html/inventario.html");
$vista->renderizarVista("./media/dictionaries/inventario.php");
//Cojo 
echo $vista->getVista();