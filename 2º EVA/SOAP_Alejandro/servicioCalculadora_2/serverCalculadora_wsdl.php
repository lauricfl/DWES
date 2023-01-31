<?php

function add($a, $b) {return $a + $b;}
function subtract($a, $b) {return $a - $b;}

$wsdl = 'http://localhost/dwes/dwes_22_23/UT6%20SOAP/servicioCalculadora_2/calculadora.wsdl';
$server = new SoapServer($wsdl);
$server->addFunction("add");
$server->addFunction("subtract");
$server->handle();