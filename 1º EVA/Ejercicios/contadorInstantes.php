<?php
session_start();
$tiempoActual=[date("H:i:s")];

if(isset($_SESSION["visita"])){//Si esta creada actualizo
    $tiemposGuardados = str_split($_SESSION["instantes"],25);
    var_dump($tiemposGuardados);
    $_SESSION["visita"] =array_merge($tiemposGuardados, $tiempoActual);

}else{//No esta creada
    $_SESSION["visita"][1]= $tiempoActual;
}

echo "Has accedido ".$_SESSION["instantes"];
?>