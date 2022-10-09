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

    <form action="Ej_2.php" method="POST">
        <p>Indique su sexo:</p>

        <b>Sexo:</b>
        <input type="radio" name="sexo" id="hombre" value="hombre">Hombre
        <input type="radio" name="sexo" id="mujer" value="mujer">Mujer
        <br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>


<?php


print("<h1 align=center>Datos Personales 3(Resultado)</h1>");

if(empty($_POST['sexo'])){
    print("<p style='color:red'>No se ha indicado su sexo</p>");
}else{
    print("Su sexo es ".$_POST['sexo']);
}


?>