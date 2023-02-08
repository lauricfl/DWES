<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banderas por pais</title>
</head>

<body>
    <?php
    session_start();

    //Llamar al servicio para recuperar los datos
    //Ruta al WSDL del servicio
    $wsdl = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
    //Instanciar un cliente soap
    $cliente = new SoapClient($wsdl);
    //Necesito los paises para meterlos al select
    //Llamar al metodo que me devuelve la lista de paises
    $result = $cliente->ListOfCountryNamesByName();
    //Rescatamos los datos que devuelve el servicio
    $paises = $result->ListOfCountryNamesByNameResult->tCountryCodeAndName;

    ?>

    <form action="procesador.php" method="post">
        <label>Seleccione un país</label>
        <select name="pais" onchange="this.form.submit()">
            <?php
            foreach ($paises as $key => $value) {
                echo "<option name='" . $value->sName . "'value='" . $value->sISOCode . "'>" . $value->sName . "</option>";
            }
            ?>
        </select>
    </form>
    <?php
    if (isset($_SESSION['bandera'])) {
        echo "<br>";
        echo "<img src=". $_SESSION['bandera']."><br>";
        foreach($paises as $key => $value){
            if($_SESSION['pais']===$value->sISOCode){
                echo "Bandera de ".$value->sName;
            }
        }
    }
    ?>
        
    
    
</body>

</html>