<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background-color: lightblue;
        }
        fieldset{
            background-color: grey;
            border: 2px solid purple;
        }
        legend{
            border: 2px solid purple;
            background-color: grey;
        }
    </style>
    
<h1 align=center>Datos Personales 5(Formulario)</h1>

<form action="Ej_5.php" method="POST">
    <fieldset>
        <legend>Formulario</legend>

        <p>Indique sus aficiones:</p>

        <b>Edad:</b>

       <select name="edad">
        <option value="">...</option>
        <option value="Menos de 20 años">Menos de 20 años</option>
        <option value="Entre 20 y 39 años">Entre 20 y 39 años</option>
        <option value="Entre 40 y 59 años">Entre 40 y 59 años</option>
        <option value="60 años o mas">60 años o mas</option>
       </select>
        <br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
        
    </fieldset>
</form>

</body>
</html>


<?php

    print("<h1 align=center>Datos Personales 5(Resultado)</h1>");

    $edad = $_POST['edad'];

    if($edad==""){
        print("<p style='color:red'>No se ha indicado la edad</p>");
    }else{
        print("La edad seleccionada es ".$edad);
    }

    


?>