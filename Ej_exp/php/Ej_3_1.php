<?php
$texto = $_POST['texto'];

print('<p>Ha escrito <b>"' . $texto . '"</b></p><ol>');
$pattern='/^[^0-9][a-zA-Z0-9_-]+([.]{0,1})[a-zA-Z0-9_-]+([@]{1,1})[a-zA-Z0-9]+([.]{1,1})[a-zA-Z0-9]{2,4}([.]{1,1})[a-zA-Z0-9]{2,4}$/';

function comprobar_nro($pattern,$texto)
{
    
    if (preg_match($pattern, $texto)){
        print('<p>Ha escrito <b>"' . $texto . '"</b> es un correo valida');
    } else {
        print('<p>Ha escrito <b>"' . $texto . '"</b> <span style="color:red;">no</span> es un correo valida ');
    }
}

comprobar_nro($pattern,$texto);