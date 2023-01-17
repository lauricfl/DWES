<?php

class Persona {
    //Atributos
    private static $num_personas = 0;
    private $nombre;
    private $apellidos;
    private $edad;
    private $sueldo;

    //Constructor
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        self::$num_personas++;
     
    }

    //Metodos
    public function comprar($producto){
        
    }

    public function getNombre(){
        return $this->nombre;
    }

    //Destructor
    public function __destruct()
    {
        self::$num_personas--;
    }   
}