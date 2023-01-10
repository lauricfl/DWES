<?php

class Producto
{
   //Atributos, propiedades...
   private static $num_productos=0;
   private $nombre = "";
   
   //Métodos
   /**
    * Constructor
    */
   public function __construct($name)
   {
      //Incrementamos el numero de objetos creados de esta clase
      self::$num_productos++;
      $this->setNombre($name);
   }

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
    * Método getter para el obtener la cantidad de objetos de la clase (estático)
    */
    public function getCantidad(){
      return self::$num_productos;
   }
   /**
    * Método setter para darle valor al nombre del objeto instanciado
    * @param nombre Nombre que se le da al producto
    */
   public function setNombre($nombre){
      $this->nombre = $nombre;
   }

   /**
    * Destructor
    */
    public function __destruct()
    {
       //Decrementamos el numero de objetos creados de esta clase
       self::$num_productos--;
    }
}
