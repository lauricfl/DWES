<?php

$options = array('uri' => 'http://localhost/', 'location' => 'http://localhost/dwes/dwes_22_23/UT6%20SOAP/servicioCalculadora_1/serverCalculadora.php');
$client = new SoapClient(NULL, $options);

$suma = $client->suma(5, 3);
echo "Resultado de la suma: " . $suma . "<br />";

$resta = $client->resta(5, 3);
echo "Resultado de la resta: " . $resta;

?>
