<?php

$wsdl = 'http://localhost/dwes/dwes_22_23/UT6%20SOAP/servicioCalculadora_2/serverCalculadora_wsdl.php';
$client = new SoapClient($wsdl);

$result = $client->add(array("a" => 8, "b" => 2));
echo "Resultado de la suma: " . $result . "<br />";

$result = $client->subtract(array("a" => 8, "b" => 2));
echo "Resultado de la resta: " . $result;

?>
