<?php

class Producto
{
    //Atributos
    private static $num_productos = 0;
    private $color;
    private $nombre;
    private $precio;
    private $fechaCaducidad;
    private $peso;

    //Métodos
    //Constructor
    public function __construct($color, $nombre, $precio, $fechaCaducidad, $peso)
    {
        //Construir el prodcuto
        $this->color = $color;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->fechaCaducidad = $fechaCaducidad;
        $this->peso = $peso;
        self::$num_productos++;
    }

    //Getters y Setters
    public function getColor()
    {
        return $this->color;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getFechaCad()
    {
        return $this->fechaCaducidad;
    }
    public function getPeso()
    {
        return $this->peso;
    }
    public function getTotalProductos()
    {
        return $this->num_productos;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function setFechaCad($fecha)
    {
        $this->fechaCaducidad = $fecha;
    }
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    //Destructor
    public function __destruct()
    {
        self::$num_productos--;
    }
}
