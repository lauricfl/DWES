<?php
//var_dump($_POST);
//htmlspecialchars() cambia los caracteres sensibles por su codigo
$nombreApe = htmlspecialchars($_POST["nombreApellidos"]);
$curso = htmlspecialchars($_POST["curso"]);
$ciclo = htmlspecialchars($_POST["ciclo"]);

if(!empty($nombreApe)){
    if(!validarNombre($nombreApe)){
        echo "Error de validacion del nombre";
        exit();
    }
    
}else{
    echo "el campo no puede estar vacio";
    exit();
}

if(!empty($curso)){
    if(!validarCurso($curso)){
        echo "Error de validacion del curso";
        exit();
    }
}else{
    echo "el campo no puede estar vacio";
    exit();
}

if(!empty($ciclo)){
    if(!validarCiclo($ciclo)){
        echo "Error de validacion del ciclo";
        exit();
    }
}else{
    echo "el campo no puede estar vacio";
    exit();
}


echo "El alumno $nombreApe esta matriculado en el $curso curso de $ciclo";

function validarNombre($datoAValidar){

    //Validar el campo de nombre y apellidos
    if(preg_match("/([A-ZÁ-Ú]{1}[a-zá-ú]+\s?)+/A",$datoAValidar)){
        return true;
    }
    else{
        return false;
    }
    }
    
    function validarCurso($datoAValidar){
    
    //Validar el campo de curso
    if(preg_match("/([1-2]{1}\º){1}/A",$datoAValidar)){
        return true;
    }
    else{
        return false;
    }
    }
    
    function validarCiclo($datoAValidar){
    
    //Validar el campo de ciclo
    if(preg_match("/(DAM|DAW|ASIR)/A",$datoAValidar)){
        return true;
    }
    else{
        return false;
    }
    }
