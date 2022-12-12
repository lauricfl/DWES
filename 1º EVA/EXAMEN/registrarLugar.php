<?php
include_once "./procesador.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action='procesador.php' method="POST" enctype="multipart/form-data">
        <p>Latitud</p>
        <span><?php echo $errorLatitud ?></span>
        <input type="text" name="latitud" value="<?php echo $latitudOK ?>">
        <p>Longitud</p>
        <span><?php echo $errorLongitud ?></span>
        <input type="text" name="longitud" value="<?php echo $longitudOK ?>">
        <p>Comentarios</p>
        <input type="text" name="comentario" value="<?php echo $comentarioOK ?>">
        <p>¿Quieres subir una imagen?</p>
        <input type="file" value="Subir foto" name="imagen" value="<?php echo $imagenOK ?>">
        <br><br>
        <input type="submit" value="Registrar lugar">
    </form>
</body>

</html>