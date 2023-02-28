<?php
$dict = array(
  "titulo" => "P1X3L4RT",
  "direccion_css" => ".assets/css/styles.css",
  "celda" => "celda",
  'form_id' => 'datos',
  'form_destination' => './index.php?action=add',
  "direccion_css" => '<link rel="stylesheet" src="../css/styles.css"/>',
  'script_tag_jquery' => '<script type="text/javascript"
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>',
  'script_tag_js' => '<script type="text/javascript" src="./assets/javascript/validar.js"></script>',
  'script_load_page' => '<script>console.log("Página recargada");</script>',
  'link_bootstrap' => '<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
    crossorigin="anonymous"/>',
  'script_bootstrap' => '<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>',
  'id_input' => 'color',
  'id_div_form' => 'colorDiv',
  'name_input' => 'inputcolor',
  'id_boton' => 'boton',
  'id_tablero' => 'tablero',
  'script_js' => '<script src="./assets/javascript/tablero.js"></script>',
  'txt_color' => "Confirmar color",
  'id_div_color' => "divColor",
  //Los estilos están aqui porque no me funciona el enlace al CSS
  'estilo' => ' <style>
    @font-face {
      font-family: fuente;
      src: url(./assets/fonts/CAT-Arena.ttf);
    }
    h1{
      font-family: fuente;
      font-size: 5vw;
      font-weight: bold;
    }
    body {
      text-align: center;
      
      background-image: url(./assets/images/lluvia.jpg);
       background-repeat: no-repeat;
       background-size: cover;
      color: black;
    }
    #tablero {
      width: 80vh;
      height: 80vh;
      margin: auto;
      border: 1px solid black;
      background-color: white;
      transform: rotate(90deg); 
    }
    td {
      color: black;
      border: 1px solid black;
    }

    td:hover{
      opacity: 0.5;
    }
    #inputCoord{
      text-align: center;
      width:250px;
      border:1px solid blue;
      border-radius: 10px;
    }
    #divColor{
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content: center;
      position: absolute;
      right:0;
      top:0;
      height:100%;
      width:30%;
    }
    input[type="color"]{
      width:100px;
      height:100px;
    }
    button{
      border: 1px solid black;
      border-radius:10px;
      padding:10px;
      box-shadow: inset 0 0 7px 0 black; 
      font-weight:bold;
    }
    button:hover{
      background-color: lightblue;
    }
  </style>',
);
