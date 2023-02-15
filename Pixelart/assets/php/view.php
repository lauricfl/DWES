<?php

function data_replace($vista, $data){
    //Cargar el diccionario correspondiente ($datos)
    require $data;

    //Recorrer el diccionario para sustituir los textos configurables de la vista
    foreach ($dict as $key => $value) {
        $vista = str_replace('{'.$key.'}', $value, $vista);
    }

    //Devolver la vista con los textos rellenos
    return $vista;    

}