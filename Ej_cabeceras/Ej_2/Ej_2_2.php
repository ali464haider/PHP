<?php
    function recoge($var){
        $var = (isset($_REQUEST[$var])) ?
            htmlspecialchars(trim(strip_tags($_REQUEST[$var])),ENT_QUOTES,'UTF-8') : "";
        return $var;
    }

    $error = "La calve es incorrecta, intentelo de nuevo";


    $clave = recoge('clave');
    if(preg_match("/^(z80)$/",$clave)){
        echo("Bienvenido Su clave Era La Requerida");
    }else{
        header("location:ej_2_1.php?claveNoValida=$error");
    }


?>