<?php

function suma($a, $b) {return $a + $b;}
function resta($a, $b) {return $a - $b;}

$options = array('uri' => 'http://localhost/');
$server = new SoapServer(null, $options);
$server->addFunction("suma");
$server->addFunction("resta");
$server->handle();
