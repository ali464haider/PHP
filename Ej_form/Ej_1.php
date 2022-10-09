<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: lightblue;
    }

    input {
        width: 100px;
    }
</style>

<body>

    <h1 align=center>Datos Personales(Formulario)</h1>
    <form action="Ej_1.php" method="POST">
        Escibe su nombre: <input type="text" name="nombre" id="nombre"><br><br>
        Ecribe sus apellidos: <input type="text" name="apellido" id="apellido"><br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>



</body>

</html>


<?php

print("<h1 align=center>Datos Personales(Resultado)</h1>");
// $nombre = $_POST['nombre'];
// $apellido = $_POST['apellido'];

$excribirnombres=true;

if (empty($_POST['nombre'])) {
    print("<p style='color:red'>No se ha excrito su nombre</p>");
    $excribirnombres=false;
} 

if(empty($_POST['apellido'])) {
    print("<p style='color:red'>No se ha excrito sus apellidos</p>");
    $excribirnombres=false;
} 

if($excribirnombres){
    print("<p>Tu nombre es " . $_POST['nombre']);
    print("<p>Tus apellidos son " . $_POST['apellido']);
}

?>