<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 align=center>Datos Personales 3(Formulario)</h1>

    <form action="Ej_4.php" method="POST">
        <p>Elige los colores a cambiar:</p>

        color de fondo de la página:
        <input type="color" name="fondo"><br><br>
        color de letra de la página:
        <input type="color" name="letra">

        
         <br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
</body>

</html>

<?php

print("<h1 align=center>Datos Personales(Resultado)</h1>");
// $nombre = $_POST['nombre'];
// $apellido = $_POST['apellido'];




if(isset($body) && $body == true)
{
    echo '<body style="background-color:"'.$_POST['fondo'].'>';
} 

?>


