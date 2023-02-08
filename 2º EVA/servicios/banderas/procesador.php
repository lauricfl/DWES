<?php
//Nos llega el ISO del pais seleccionado 
//Buscamos la bandera del pais
$cliente = new SoapClient("http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL");
$result = $cliente->CountryFlag(array("sCountryISOCode" => $_POST['pais']));
//Buscamos el nombre del pais a raiz del ISO
$result = $cliente->

session_start();
$_SESSION['bandera']= $result->CountryFlagResult;

//header("Location: index.php");