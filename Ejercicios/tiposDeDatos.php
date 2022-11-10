<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de datos</title>
</head>
<body>
    <h1>Boolean</h1>
    <?php 
    //Booleano puro
    $variableBooleana = true;
    echo '$variablBooleana es: ';
    var_dump($variableBooleana);
    echo "<br>El tipo de dato es: ";
    echo gettype($variableBooleana);

    //Booleanos casteados
    echo '<br>';
    echo 'El cast a bool del entero 0 es: ';
    var_dump((bool)0);
    echo'<br>';
    echo 'El cast a bool del entero 1 es: ';
    var_dump((bool)1);
    echo'<br>';
    ?>

    <?php
    // Tipo de datos.
    $a = 3.45;
    var_dump($a);
    echo "<br>";
    $b = settype($a, "integer");
    var_dump($a);
    echo "<br>";
    ?>
    <h1>Integer</h1>
    <br>
    <h1>Float</h1>
    <br>
    <h1>String</h1>
    
</body>
</html>