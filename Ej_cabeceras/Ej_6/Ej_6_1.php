<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form {
        padding: 20px 10px;
        background-color: lightyellow;
        margin-top: 10px;
    }

    table {
        margin: 10px 10px;
        background-color: lightyellow;
        padding: 10px;
        border: 1px;
    }

    td,
    th {
        border: 1px solid black;
        border-collapse: collapse;
    }

    span {
        color: red;
    }
</style>

<body>




    <?php

    function recoge($var)
    {
        $var = (isset($_REQUEST[$var])) ?
            htmlspecialchars(trim(strip_tags($_REQUEST[$var])), ENT_QUOTES, 'UTF-8') : "";
        return $var;
    }

    $nombre = $destino = $duracion = $salida = "";
    $nombreEr = $destinoEr = $duracionEr = $salidaEr = "";

    $nombre = recoge('nombre');
    $patron = '/^[a-z]+$/i';

    if (preg_match($patron, $nombre) == 0) {
        $nombreEr = "El nombre no es correcto";
    }

    $destino = recoge('destino');


    if (preg_match($patron, $destino) == 0) {
        $destinoEr = "El destino no es correcto";
    }

    $duracion = recoge('duracion');
    $patron = "/^[0-9]{2}$/";

    if (preg_match($patron, $duracion) == 0) {
        $duracionEr = "la duracion no es correcto";
    }


    $salida = recoge('salida');
    $patron = '/^(lunes|miercoles|martes|jueves|viernes|sabado|domingo)$/i';

    if (preg_match($patron, $salida) == 0) {
        $salidaEr = "la salida no es correcto";
    }


    $fptr = fopen('viajes.txt', "a+");

    if ($nombreEr == "" and $destinoEr == "" and $duracionEr == "" and $salidaEr == "") {
        $textoAPasar = $nombre . ":" . $destino . ":" . $duracion . ":" . $salida . "\n";
        fwrite($fptr, $textoAPasar);
      
    }

    fclose($fptr);

    $fptr = fopen('viajes.txt', "r");


    echo ("<table>
<tr>
    <th>Nombre</th>
    <th>Destino</th>
    <th>Duracion</th>
    <th>Salida</th>
</tr>
");
    if (filesize('viajes.txt') > 0) {
        while (!feof(($fptr))) {
            $textoARecibir = fgets($fptr);
            $textoArray = explode(":", $textoARecibir);
            echo ("<tr>");
  
           if(is_array($textoArray) and count($textoArray)>2){
            echo ("<td>" . $textoArray[0] . "</td>");
            echo ("<td>" . $textoArray[1] . "</td>");
            echo ("<td>" . $textoArray[2] . "</td>");
            echo ("<td>" . $textoArray[3] . "</td>");
           }
                
            echo ("</tr>");
    
        }
    }
    fclose($fptr);



    echo ("</table>");

    ?>


    <form action="Ej_6_1.php">
        Intorducza el nombre del circuito:
        <input type="text" name="nombre"><?php echo ("<span>$nombreEr</span>"); ?>
        <br><br>
        Intorducza el nombre del destino:
        <input type="text" name="destino"><?php echo ("<span>$destinoEr</span>"); ?>
        <br><br>
        Intorducza el nombre del duracion:
        <input type="text" name="duracion"><?php echo ("<span>$duracionEr</span>"); ?>
        <br><br>
        Intorducza el nombre del salida:
        <input type="text" name="salida"><?php echo ("<span>$salidaEr</span>"); ?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>


</body>

</html>