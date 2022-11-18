<?php
    function recoge($var){
        $var = (isset($_REQUEST[$var])) ?
            htmlspecialchars(trim(strip_tags($_REQUEST[$var])),ENT_QUOTES,'UTF-8') : "";
        return $var;
    }

    $error = "Su edad no está entre 18 y 130 años";


    $edad = recoge('edad');
    if($edad >= 18 and $edad  <= 130){
        echo("Su nombre es: $edad");
    }else{
        header("location:ej_4_1.php?edadIncorrecto=$error");
    }


?>