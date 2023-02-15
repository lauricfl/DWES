<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Ejemplo Tema 7: Validación formulario con AJAX</title>
        <link rel="stylesheet" href="estilos.css" type="text/css" />
        <script type="text/javascript" src="validar.js"></script>
    </head>
    <body>
        <script>console.log("Recargo página principal");</script>
        <div id='form'>
            <form id='datos'>
                <fieldset >
                    <legend>Introducción de datos</legend>
                    <div class='campo'>
                        <label for='nombre' >Nombre:</label>
                        <input type='text' name='nombre' id='nombre' maxlength="50" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']; ?>" /><br />
                        <span id='errorNombre'></span>
                    </div>
                    <div class='campo'>
                        <label for='password1' >Contraseña:</label>
                        <input type='password' name='password1' id='password1' maxlength="50" value="<?php if(isset($_POST['password1'])) echo $_POST['password1']; ?>" /><br />
                        <span id='errorPassword'></span>
                    </div>
                    <div class='campo'>
                        <label for='password2' >Repita la contraseña:</label>
                        <input type='password' name='password2' id='password2' maxlength="50" value="<?php if(isset($_POST['password2'])) echo $_POST['password2']; ?>" />
                    </div>
                    <div class='campo'>
                        <label for='email' >Email:</label>
                        <input type='text' name='email' id='email' maxlength="50" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /><br />
                        <span id='errorEmail'></span>
                    </div>
                    <div class='campo'>
                        <button type='button' name='enviar' onclick="validar()">Enviar</button>
                    </div>
                    <div id='registrado'></div>
                </fieldset>
            </form>
        </div>
    </body>
</html>