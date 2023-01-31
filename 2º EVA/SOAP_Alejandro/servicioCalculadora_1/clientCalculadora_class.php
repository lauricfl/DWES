<?php

$options = array('uri' => 'http://localhost/', 'location' => 'http://localhost/dwes/dwes_22_23/UT6%20SOAP/servicioCalculadora_1/serverCalculadora_class.php');
$client = new SoapClient(NULL, $options);

$suma = $client->suma(3, 2);
echo "Resultado de la suma: " . $suma . "<br />";

$resta = $client->resta(3, 2);
echo "Resultado de la resta: " . $resta;

?>
