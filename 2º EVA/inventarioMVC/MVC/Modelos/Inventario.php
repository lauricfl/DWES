<?php
include "iInventario.php";
include "./MVC/Modelos/Producto.php";

class Inventario implements iInventario
{   private $cantidad = 0;
    private Persona $persona;
    private $productos;

    public function __construct(Persona $persona)
    {
        $this->persona = $persona;
        $this->productos = array();
    }


    public function anadirProducto(Producto $p)
    {
        array_push($this->productos, $p);
        $this->cantidad++;
    }
    public function eliminarProducto(Producto $p)
    {        
         if (($clave = array_search($p, $this->productos)) !== false) {
            unset($this->productos[$clave]);
            $this->cantidad--;
        } 
}
    public function getInventario(){
        return $this->persona->getNombre()." tiene ". var_dump($this->productos);
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function getPropietario(){
        return $this->persona->getNombre();
    }
}
