<html>
<?php

//Aqui declaro las variables

$modulo = 'DWES';
$nombre = 'Laura';
?>

<head>
    <title>
        <?php
        /*Aqui muestro el contenido de 
        la variable $modulo*/
        echo $modulo;
        ?>
    </title>
</head>

<body>
    <?php /**
     * Esto es un docblock. La siguiente funcion suma dos numeros.
     * @param a Parametro de la funcion
     * @param b Parametro 2 de la funcion
     * @return c Devuelve resultado
     */
    function suma($a, $b)
    {
        $resultado = $a + $b;
        return $resultado;
    }
    ?>

    <h1>Bienvenida <?php echo $nombre; ?></h1>

</body>

</html>