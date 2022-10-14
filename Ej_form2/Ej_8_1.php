<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    label{
        display: inline-block;
        width: 80px;
    }
</style>
<body>
    <p>Escirbe los siguientes datos</p>

    <form action="Ej_8_1.php" method="post">
        <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre"><br><br>
        </div>

        <div>
        <label for="tel">Telefono</label>
        <input type="tel" name="tel" id="tel"><br><br>
        </div>

        <div>
        <label for="correo">Email</label>
        <input type="text" name="correo" id="correo"><br><br>
        </div>
        <input type="submit" value="Enviar">
    </form>
   
</body>
</html>

<?php
    
print("<h1 align=left>Los datos introducidos son los siguientes</h1>");

$patron='/^[[:alpha:]]+( [[:alpha:]]+)*$/';

$nombre=$_POST['nombre'];

if(preg_match($patron,$nombre)){
    print("El nombre es: $nombre");
}else{
    print("El nombre no coincide con el formato");
}
print("<br><br>");

$patron='/^[0-9]{9}$/';

$tel=$_POST['tel'];

if(preg_match($patron,$tel)){
    print("El tel es: $tel");
}else{
    print("El tel no coincide con el formato");
}
print("<br><br>");

$patron='/^[^0-9][[:alnum:]\._-]+( [[:alnum:]\.-_]+)*[@]{1}[[:alpha:]]+([.][[:alpha:]]{2,4}){1,2}$/';

$correo=$_POST['correo'];

if(preg_match($patron,$correo)){
    print("El correo es: $correo");
}else{
    print("El correo no coincide con el formato");
}

?>