<?php

$options = array('uri' => 'http://localhost/', 'location' => 'http://localhost/dwes/DWES%20ABRIR%20ESTE/2%c2%ba%20EVA/servicios/ejercicioSOAP/serverCalculadora.php');
$client = new SoapClient(NULL, $options);
$suma = $client->suma(5, 3);
echo "Resultado de la suma: " . $suma . "<br>";
$resta = $client->resta(5, 3);
echo "Resultado de la resta: " . $resta . "\n";
