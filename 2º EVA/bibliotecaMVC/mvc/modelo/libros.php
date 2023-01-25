<?php
class Libreria{
    public function recuperarLibros(){
        require "./media/php/biblioteca.php";
        $arrayLibros = array();
        foreach ($libros as $key => $value) {
            
            array_push($arrayLibros, $key,$value);
            
        }
        return $arrayLibros;
    }
}