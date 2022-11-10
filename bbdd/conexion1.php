<?php
//Incluir dichero de configuracion de DB
require_once("configDB.php");

//Conectar con la base de datos utilizando llamadas a procedimientos
$conexion = mysqli_connect(HOST, USER, PASSWORD, DB);

//Vamos a ver si ha conectado
if($conexion){
    //Muestro los detalles del objeto devuelto
    var_dump($conexion);
   //Cerrar conexion
   mysqli_close($conexion);
}
