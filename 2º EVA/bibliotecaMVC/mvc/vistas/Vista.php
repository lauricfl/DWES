<?php
class Vista
{

    private $vista;
    public function __construct()
    {
        $this->setVista('');
    }
    private  function setVista($vista)
    {
        $this->vista = $vista;
    }
    public function cargarVista($vista)
    {
        $this->setVista(file_get_contents($vista));
    }
    public function renderizarVista($path)
    {
        // Cargo el diccionario de datos de la ruta especificada
        require $path;

        // Recorro el diccionario para sustituir en la vista los bloque configurables
        foreach ($dict as $key => $value) {
            $this->setVista(str_replace('{' . $key . '}', $value, $this->getVista()));
        }
    }

    public function getVista()
    {
        return $this->vista;
    }
    public function verVista()
    {
        //Cargamos el html
        $this->setVista(file_get_contents("./media/html/mainPage.html"));
        //Cargamos el diccionario en la vista
        require "./media/dictionaries/mainPage.php";
        foreach ($dict as $key => $value) {
            $this->vista = (str_replace('{' . $key . '}', $value, $this->$this->vista));
        }

        //Devolvemos la vista
        return $this->vista;
    }
    public function renderizarKey($keyword){
        $table = '';
        require "./media/php/biblioteca.php";
        foreach ($libros as $key => $value) {
            $table .= "<tr><td><input type='checkbox' name='ckElem[]' value=".$key."</td><td>" . $key . "</td><td>" . $value . "</td></tr>";
            } 
        /* for ($i = 0; $i < count($datos); $i++) {
            // Relleno cada fila individual de productos
            $table .= "<tr><td>" . $datos[$i] . "</td><td>" . $datos[$i] . "</td></tr>";
        }
         */
        // Llamo al renderView que admite dos parámetros: texto configurable a sustituir y esta tabla.
        $this->renderViewKeyword($keyword, $table);
    }

    public function renderViewKeyword($keyword, $html){
        // Sustituyo la palabra clave pasada como parámetro por el código html también pasado como parámetro
        $this->setVista(str_replace('{' . $keyword . '}', $html, $this->getVista()));
    }
}
