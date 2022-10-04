<?php
$texto = $_POST['texto'];

print('<p>Ha escrito <b>"' . $texto . '"</b></p><ol>');

function comprobar_nro($texto)
{
    $pattern='/^[0-9]{9}$/';
    if (preg_match($pattern, $texto)) {
        print('<p>Ha escrito <b>"' . $texto . '"</b> es un numero valida');
    } else {
        print('<p>Ha escrito <b>"' . $texto . '"</b> <span style="color:red;">no</span> es un numero valida ');
    }
}

comprobar_nro($texto);