<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>
  <!-- Aqui arriba valido el formulario-->
  <?php
  //Declaro lasa variables a utilizar
  $_nombreApellidos = $_curso = $_ciclo = "";
  $_nombreApellidosErr = $_cursoErr = $_cicloErr = "";


  if (!empty($_POST)) {
    include 'funciones.php';

    // Variables
    $nombreAp = htmlspecialchars($_POST["nombreApellidos"]);
    $curso = htmlspecialchars($_POST["curso"]);
    $ciclo = htmlspecialchars($_POST["ciclo"]);

    // Compruebo que los campos no están vacíos y que validan
    if (!empty($nombreAp)) {
      if (!validar($nombreAp, VALIDA_NOMBREAP)) {
        $_nombreApellidosErr = "No has escrito bien el Nombre y/o Apellidos";
      } else {
        $_nombreApellidos = $nombreAp;
      }
    } else {
      $_nombreApellidosErr = "El campo Nombre y Apellidos no puede estar vacío";
    }

    if (!empty($curso)) {
      if (!validar($curso, VALIDA_CURSO)) {
        $_cursoErr = "No has escrito bien el curso: 1º o 2º";
      } else {
        $_curso = $curso;
      }
    } else {
      $_cursoErr = "El campo curso no puede estar vacío";
    }
    if (!empty($ciclo)) {
      if (!validar($ciclo, VALIDA_CICLO)) {
        $_cicloErr = "El ciclo introducido no es válido";
      } else {
        $_ciclo = $ciclo;
      }
    } else {
      $_cicloErr = "El campo ciclo no puede estar vacío";
    }

    if ($_nombreApellidos != "" && $_curso != "" && $_ciclo != "") {
      //Muestra el mensaje final
      echo "El alumno $_nombreApellidos está matriculado en $_curso de $_ciclo";
      exit();
    }
  }
  ?>

  <!-- A partir de aqui tengo el formulario -->
  <h1>Formulario de recogida de datos de alumno</h1>
  <p><span class="error">* = campo obligatorio</span></p>
  <form action='<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post">
    Nombre y Apellidos:
    <input type="text" name="nombreApellidos" value="<?php echo $_nombreApellidos; ?>">
    <span class="error">* <?php echo $_nombreApellidosErr; ?></span>
    <br>
    <br>
    Curso:
    <input type="text" name="curso" value="<?php echo $_curso; ?>">
    <span class="error">*<?php echo $_cursoErr; ?></span>
    <br>
    <br>
    Ciclo:
    <input type="text" name="ciclo" value="<?php echo $_ciclo; ?>">
    <span class="error">*<?php echo $_cicloErr; ?></span>
    <br>
    <br>
    <input type="submit" value="Enviar informacion del alumno">
  </form>
</body>

</html>