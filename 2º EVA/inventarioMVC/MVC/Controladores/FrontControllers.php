<?php
include './assets/php/view.php';
include "./mvc/modelos/Persona.php";

if (!isset($_GET) || isset($_GET) and empty($_GET)) {
    //Estoy en la pagina principal de mi aplicacion
    //No necesito llamar a modelo ninguno
    //Cargo la vista por defecto
    $vista = file_get_contents("./MVC/Vistas/generalView.php");
    //Hemos sustituido el titulo de la vista
    $vista = str_replace('{text_title}', 'Página principal', $vista);
    //1 - Sustituir cabecera
    $vista = str_replace('{header}', file_get_contents('assets/html/header.html'), $vista);
    $vista = data_replace($vista, "./assets/dictionaries/header_noLink.php");
    //2 - Susituir el body
    $vista = str_replace('{body}', file_get_contents('./assets/html/body_main.html'), $vista);
    //3 - Sustituir el footer
    $vista = str_replace('{footer}', file_get_contents('./assets/html/footer.html'), $vista);
    $vista = data_replace($vista, './assets/dictionaries/body_main.php');
} else {
    //Compruebo que accion esta ejecutando el usuario
    if (isset($_GET["crear"])) {
        switch (htmlspecialchars($_GET["crear"])) {
            case 'persona':
                //Invocar al modelo pagina
                if (isset($_POST['nombre'])) {
                    //Recojo el nombre 
                    $nombre = htmlspecialchars($_POST['nombre']);
                    //Y lo utilizo para invocar al modelo Persona
                    $persona = new Persona($nombre);
                    //Insertar la persona en la base de datos
                    //$persona->insertarEnBD();

                    //Cargar otra vista
                    $vista = "<p>Has creado la persona {$nombre}</p>";
                } else {

                    //Llamar a la vista que me cargue el formulario de creacion del objeto pagina
                    $vista = file_get_contents('./mvc/Vistas/generalView.php');
                    //Sustituimos el diccionario
                    $vista = str_replace('{text_title}', 'Crear Persona', $vista);
                    //1 - Sustituir cabecera
                    $vista = str_replace('{header}', file_get_contents('assets/html/header.html'), $vista);
                    $vista = data_replace($vista, "./assets/dictionaries/header_main.php");
                    //2 - Susituir el body
                    $vista = str_replace('{body}', file_get_contents('./assets/html/form_crearPersona.html'), $vista);
                    $vista = data_replace($vista, './assets/dictionaries/body_main.php');
                    $vista = data_replace($vista, './assets/dictionaries/form_crearPersona.php');
                    //3 - Sustituir el footer
                    $vista = str_replace('{footer}', file_get_contents('./assets/html/footer.html'), $vista);
                    $vista = data_replace($vista, './assets/dictionaries/body_main.php');
                    break;
                }
            case 'inventario':
                //Invocar al modelo Inventario
                //Llamar a la vista que me cargue el formulario de creacion del objeto inventario
            case 'producto':
                //Invocar al modelo Producto
                //Llamar a la vista que me cargue el formulario de creacion del objeto producto
            default:
                //Mostrar mensaje de "No puedo crear eso"
                break;
        }
    } else {
        switch (htmlspecialchars($_GET["mostrar"])) {
            case 'persona':
                //Invocar al modelo Personas
                //Llamar a la vista que me cargue una vista de tabla con las personas de m mi base de datos
                break;
            case 'inventario':
                //Invocar al modelo inventario
                //Llamar a la vista que me cargue una vista de tabla con los inventarios de m mi base de datos
            case 'producto':
                //Invocar al modelo producto
                //Llamar a la vista que me cargue una vista de tabla con laos productos de m mi base de datos

            default:
                //Mostrar mensaje de "No puedo mostrar eso"
                break;
        }
    }
    //?crear = persona
    //?crear = inventario
    //?crear = producto
    //?mostrar = persona
    //?mostrar = inventarios
    //?mostrar = productos
}

//Mostrar la vista al usuario
print $vista;
