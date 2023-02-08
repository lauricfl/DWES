<?php
//Nos llega el ISO del pais seleccionado 
//Buscamos la bandera del pais
$cliente = new SoapClient("http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL");
$result = $cliente->CountryFlag(array("sCountryISOCode" => $_POST['pais']));
if(!isset($_SESSION['bandera'])){
 session_start();
$_SESSION['bandera']= $result->CountryFlagResult; 
$_SESSION['pais'] = $_POST['pais'];  
}
//Buscamos el nombre del pais a raiz del ISO
$pais = $cliente->ListOfCountryNamesByName();

header("Location: index.php");