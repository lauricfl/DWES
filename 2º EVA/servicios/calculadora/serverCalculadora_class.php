<?php

class Calculadora {
    public function suma($a, $b) {
        return $a + $b;
    }
    public function resta($a, $b) {
        return $a - $b;
    }
}

$options = array('uri' => 'http://localhost/');
$server = new SoapServer(NULL, $options);
$server->setClass('Calculadora');
$server->handle();
//Desde el cliente se le va a seguir llamando igual, sin importar si es clase o no