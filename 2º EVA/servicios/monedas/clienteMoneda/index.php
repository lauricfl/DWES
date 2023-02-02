<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monedas de paises</title>
</head>

<body>
    <?php
    //Llamar al servicio para recuperar los datos
    //Ruta al WSDL del servicio
    $wsdl = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
    //Instanciar un cliente soap
    $cliente = new SoapClient($wsdl);
    ?>

    <?php
    //Proceso la informacion enviada por POST al formulario
    if (isset($_POST['pais']) && !empty($_POST['pais'])) {
        //Llamo al metodo de recuperacion de monedas
        $result = $cliente->CountryCurrency(array("sCountryISOCode" => $_POST['pais']));
        echo "La moneda del pais que has elegido es: ".$result->CountryCurrencyResult->sName;
    }
    ?>
    <?php
    //Llamar al metodo que me devuelve la lista de paises
    $result = $cliente->ListOfCountryNamesByName();
    //Rescatamos los datos que devuelve el servicio
    $result = $result->ListOfCountryNamesByNameResult->tCountryCodeAndName;
    ?>
    <!-- Un formulario con un select para elegir pais.
    onchange hare la peticion al servicio-->
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <label>Selecciona un país: </label>
        <select name="pais" onchange="<?php $_SESSION['nombre'] = ""?>this.form.submit()">
            <!-- Alguien me tiene que rellenar las options de este select -->
            <?php
            foreach ($result as $key => $value) {
                echo "<option name='" . $value->sName . "'value='" . $value->sISOCode . "'>" . $value->sName . "</option>";
            }
            ?>
        </select>
    </form>
    <?php

    ?>
</body>

</html>