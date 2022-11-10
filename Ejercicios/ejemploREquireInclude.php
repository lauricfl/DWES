<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Require Include</title>
</head>

<body>
    <?php
    //Con include la ejecucion sigue
    include 'config.php';
    //Con require peta
    //require 'config.php'; 
    if (!include_once 'config.php') {
        echo "El nombre de la BDB a la que me tengo que conectar es " . DBNAME . " en el host " . HOST . " con el usuario " . USER . " y la contraseña es " . PASSWORD;
    }
    ?>
</body>

</html>