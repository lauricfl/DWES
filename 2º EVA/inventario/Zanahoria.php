<?php
include "Producto.php";

final class Zanahoria extends Producto{
    const COLOR = "Naranja";
    const NOMBRE = "Zanahoria";
    public static $num_zanahorias = 0; 

   public function __construct($precio, $peso)
    {   self::$num_zanahorias++;
        parent::__construct(self::COLOR, self::NOMBRE, $precio, date('YYYY-MM-DD', time()+30*24*60*60), $peso);
        
    } 
}