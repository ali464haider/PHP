<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    span {
        color: red;
    }
</style>

<body>

    <?php

    $nombreEr = $apellidoEr = $direccion = $idiomas = $genero = $edad = $correo = $estudios = $fecha_nacimiento = "";
    $nombre = $apellido = $direccionEr = $correoEr = "";
    $imagen = "";

    function recoger_Dato($var)
    {
        $var = (isset($_REQUEST[$var])) ?
            htmlspecialchars(trim(strip_tags($_REQUEST[$var])), ENT_QUOTES, "UTF-8")
            : "";
        return $var;
    }

    $nombre = recoger_Dato('nombre');
    $patron = '/^[A-Z][a-z]+( [A-Za-z]+)*$/';

    if ($nombre != "") {
        if (preg_match($patron, $nombre) == 0 or (strlen($nombre) > 13 or strlen($nombre) < 3)) {
            $nombreEr = "Nombre so es correcto";
        }
    }

    $apellido = recoger_Dato('apellido');
    $patron = '/^[A-Z][a-z]+( [A-Za-z]+)*$/';

    if ($apellido != "") {
        if (preg_match($patron, $apellido) == 0 or (strlen($apellido) > 13 or strlen($apellido) < 3)) {
            $apellidoEr = "Apellido so es correcto";
        }
    }

    $direccion = recoger_Dato('direccion');
    $patron = '/^[a-zA-Z0-9]+( [A-Za-z0-9]+)*$/';

    if ($direccion != "") {
        if (preg_match($patron, $direccion) == 0 or (strlen($direccion) > 13 or strlen($direccion) < 3)) {
            $direccionEr = "direccion so es correcto";
        }
    }

    if (isset($_REQUEST['Idiomas'])) {
        $idiomas = $_REQUEST['Idiomas'];
    }

    $fecha_nacimiento = recoger_Dato('fecha_nacimiento');

    $edad = recoger_Dato('edad');

    $genero = recoger_Dato('genero');

    $correo = recoger_Dato('correo');
    $patron = '/^[[:alnum:]\._-]+( [[:alnum:]\.-_]+)*[@]{1}[[:alpha:]]+([.][[:alpha:]]{2,4}){1,2}$/';

    if ($correo != "") {
        if (preg_match($patron, $correo)==0) {
            $correoEr = "Correo so es correcto";
        }
    }

    $estudios = recoger_Dato('estudio');

    



    ?>




    <fieldset>
        <legend>Datos personales</legend>

        <form action="Ej_11.php" method="POST">

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre"><span><?php echo $nombreEr; ?></span>

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido"><span><?php echo $apellidoEr; ?></span>
            <br>

            <label for="direccion">Direccion</label>
            <input type="text" name="direccion" id="direccion"><span><?php echo $direccionEr; ?></span>
            <br>

            <label for="fecha_nacimiento">Fecha Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
            <br>

            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad">
            <br>

            <label for="Idiomas"><b>Idiomas</b></label>
            <br>
            <input type="checkbox" name="Idiomas[]" id="Idiomas" value="Castellano">Castellano<br>
            <input type="checkbox" name="Idiomas[]" id="Idiomas" value="Rumano">Rumano<br>
            <input type="checkbox" name="Idiomas[]" id="Idiomas" value="Ingles">Ingles<br>
            <input type="checkbox" name="Idiomas[]" id="Idiomas" value="Frances">Frances<br>

            <label for="genero"><b>Genero</b></label>
            <br>
            <input type="radio" name="genero" id="genero" value="Masculino">Masculino<br>
            <input type="radio" name="genero" id="genero" value="Fenemino">Fenemino<br>
            <input type="radio" name="genero" id="genero" value="No aportar">No quiero aportar
            <br>

            <label for="correo">Direccion Correo</label>
            <input type="text" name="correo" id="correo"><br><br><span><?php echo $correoEr; ?></span>

            <label for="estudio">Estudios:</label>
            <select name="estudio" id="estudio">
                <option value="">...</option>
                <option value="Sin Estudio">Sin Estudio</option>
                <option value="Eso">Eso</option>
                <option value="Bachillerato">Bachillerato</option>
                <option value="Universitario">Universitario</option>
                <option value="otros">otros</option>
            </select>
            <hr>
            <button type="submit">Enviar</button>

        </form>
    </fieldset>
    <?php
    echo ("<h2>Your Input:</h2>");
    echo "<br>";
    if ($nombreEr == "") {
        echo $nombre;
    }

    echo "<br>";
    if ($apellidoEr == "") {
        echo $apellido;
    }

    echo "<br>";
    if ($direccionEr == "") {
        echo $direccion;
    }

    echo "<br>";
    echo $fecha_nacimiento;

    echo "<br>";
    echo $edad;

    echo "<br>";
    if ($idiomas != "") {
        foreach ($idiomas as $idioma) {
            echo ($idioma . " ");
        }
    }





    echo "<br>";
    echo $genero;

    echo "<br>";
    if ($correoEr == "") {
        echo $correo;
    }

    echo "<br>";
    echo $estudios;
    ?>
</body>

</html>