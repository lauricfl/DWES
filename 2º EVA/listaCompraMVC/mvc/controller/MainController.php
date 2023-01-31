<?php

require './mvc/view/View.php';
$vistaPrincipal = new View();
$vistaPrincipal->loadView('./media/html/mainPageTemplate.html');
$vistaPrincipal->renderView('./media/dictionaries/mainPageDictionary.php');
echo $vistaPrincipal->returnView();