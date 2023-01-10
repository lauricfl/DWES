<?php
require "DB.php";
echo "Para conectarse a la base de datos " . DB::DB . " tienes que utilizar el HOST "
 . DB::HOST . " con el usuario " . DB::USER . " y el password ".DB::PASSWORD;
