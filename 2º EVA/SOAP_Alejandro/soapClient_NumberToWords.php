<?php

$wsdl = "https://www.dataaccess.com/webservicesserver/numberconversion.wso?WSDL";
$client = new SoapClient($wsdl);
$result = $client->NumberToWords(array("ubiNum" => 14578455));
echo $result->NumberToWordsResult;
