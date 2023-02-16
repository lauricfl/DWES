<?php

require 'iView.php';

class View implements iView {

    // Atributos
    private $view;

    // Métodos

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setView('');
    }

    /**
     * Carga la vista del fichero pasado como parámetro
     * @param vista La ruta de la vista a cargar
     */
    public function loadView(string $view) {
        // Llamo al setter de la clase 
        $this->setView(file_get_contents($view));
    }

    /**
     * Carga datos en la vista del objeto
     * @param path Ruta al diccionario con los datos a sustituir en la vista
     */
    public function renderView(string $path)
    {
        // Cargo el diccionario de datos de la ruta especificada
        require $path;

        // Recorro el diccionario para sustituir en la vista los bloque configurables
        foreach ($dict as $key => $value) {
            $this->setView(str_replace('{' . $key . '}', $value, $this->getView()));
        }
    }

    /**
     * Carga código html (pasado como string) en la vista del objeto, sustituyendo a un texto configurable concreto.
     * @param keyword Palabra clave a sustituir de la vista
     * @param html Código HTML que sustituye al keyword
     */
    public function renderViewKeyword(string $keyword, string $html)
    {
        // Sustituyo la palabra clave pasada como parámetro por el código html también pasado como parámetro
        $this->setView(str_replace('{' . $keyword . '}', $html, $this->getView()));
    }

    /**
     * El exportador de la vista
     */
    public function returnView() {
        return $this->getView();
    }

    /**
     * Getter para la vista
     * @return string Devuelve la vista
     */
    public function getView() : string {
        return $this->view;
    }

    /**
     * Setter para la vista
     * @param string Vista a setear
     */
    public function setView(string $view) {
        $this->view = $view;
    }
}