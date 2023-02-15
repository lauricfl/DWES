<?php

class Vista
{
    //Atributos
    private $vista;

    //Constructor
    public function __construct()
    {
        $this->setVista("");
    }

    //Carga la vista desde la plantilla html
    public function cargarVista($path)
    {
        $this->setVista(file_get_contents($path));
    }

    //Intercambia las palabras entre llaves del html por las del diccionario
    public function renderizarVista($path)
    {
        // Cargo el diccionario de datos de la ruta especificada
        require $path;

        // Recorro el diccionario para sustituir en la vista los bloque configurables
        foreach ($dict as $key => $value) {
            $this->setVista(str_replace('{' . $key . '}', $value, $this->getVista()));
        }
    }

    //Setea la vista
    public function setVista($vista)
    {
        $this->vista = $vista;
    }

    //Devuelve la vista
    public function getVista()
    {
        return $this->vista;
    }
  
    //Renderiza una parte en concreto del código (pasado como $keyword) y lo sustituye por el html que hemos hecho previamente
    public function renderViewKeyword($keyword, $html)
    {
        // Sustituyo la palabra clave pasada como parámetro por el código html también pasado como parámetro
        $this->setVista(str_replace('{' . $keyword . '}', $html, $this->getVista()));
    }
}
