<?php
$texto = $_POST['texto'];

print('<p>Ha escrito <b>"' . $texto . '"</b></p><ol>');

function comprobar_fecha($texto)
{
    $pattern='/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    if (preg_match($pattern, $texto)) {
        print('<p>Ha escrito <b>"' . $texto . '"</b> es una fecha valida');
    } else {
        print('<p>Ha escrito <b>"' . $texto . '"</b> <span style="color:red;">no</span> no es una fecha valida ');
    }
}

comprobar_fecha($texto);