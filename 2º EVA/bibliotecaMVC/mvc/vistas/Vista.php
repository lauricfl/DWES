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
}
