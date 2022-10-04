<?php
$texto = $_POST['texto'];

print('<p>Ha escrito <b>"' . $texto . '"</b></p><ol>');

function comprobar_texto($pattern, $texto, $frase)
{
    if (preg_match($pattern, $texto)) {
        print('<p>Ha escrito <b>"' . $texto . '"</b>' . $frase);
    } else {
        print('<p>Ha escrito <b>"' . $texto . '"</b> <span style="color:red;">no</span>' . $frase);
    }
}

$pattern='/^[a-zA-Z]( +[a-zA-Z])*$/';
comprobar_texto($pattern,$texto," es uno o más letras sueltas separadas por espacios");

$pattern='/^[a-zA-Z]( +[a-zA-Z]){1,}$/';
comprobar_texto($pattern,$texto," son dos o más letras sueltas separadas por espacios");

$pattern='/^[a-z]+( +[a-z]+)*$/';
comprobar_texto($pattern,$texto," una o más palabras (sólo letras inglesas minúsculas, separadas por uno o varios espacios).");

$pattern='/^([A-Z]+){1}$/';
comprobar_texto($pattern,$texto," es una unica palabra en mayuscula.");

$pattern='/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
comprobar_texto($pattern,$texto," es una fecha valida.");

$pattern='/^[0-9]+([\,.][0-9]{1,2})?$/';
comprobar_texto($pattern,$texto," un único número sin signo y con como mucho dos decimales.");

$pattern='/^[\+-][0-9]+([\,.][0-9]{1,2})?$/';
comprobar_texto($pattern,$texto," un único número con signo y con como mucho dos decimales.");

$pattern='/^[[:alnum:]\+\.*_-]{6,}$/';
comprobar_texto($pattern,$texto,"  es una contraseña valida.");

