<?php

class Producto2
{
   //Atributos, propiedades...
   private $nombre = "";
//Métodos
   /**
    * Este método muestra por pantalla el nombre del objeto instanciado
    */
    public function mostrar(){
        echo $this->nombre;
     }
   public function __set($var, $valor) {
    if (property_exists(__CLASS__, $var)) { 
        $this->$var = $valor; 
    } else {
        echo "No existe el atributo $var."; 
    }
}
public function __get($var) {
    if (property_exists(__CLASS__, $var)) { 
         return $this->$var; 
    }
} 
}
