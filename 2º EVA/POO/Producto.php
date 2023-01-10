<?php

class Producto
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
   /**
    * Método getter para obtener el nombre del objeto instanciado
    */
   public function getNombre(){
      return $this->nombre;
   }
   /**
    * Método setter para darle valor al nombre del objeto instanciado
    * @param nombre Nombre que se le da al producto
    */
   public function setNombre($nombre){
      $this->nombre = $nombre;
   }
}
