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
    
<h1 align=center>Datos Personales 4(Formulario)</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <fieldset>
        <legend>Formulario</legend>

        <p>Indique sus aficiones:</p>

        <b>Aficiones:</b>

        <input type="checkbox" name="aficiones[]" id="cine" value=" el cine">Cine
        <input type="checkbox" name="aficiones[]" id="literatura" value="la literatura">Literatura
        <input type="checkbox" name="aficiones[]" id="musica" value="la musica">Musica
        
        <br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
        
    </fieldset>
</form>

</body>
</html>


<?php

print("<h1 align=center>Datos Personales 4(Resultado)</h1>");

    if(empty($_POST['aficiones'])){
        print("<p style='color:red'>No se ha indicado sus aficiones</p>");
    }else{
        $aficiones=$_POST['aficiones'];

        foreach($aficiones as $aficion){
            print("Le gusta: $aficion <br>");
        }



    }


?>