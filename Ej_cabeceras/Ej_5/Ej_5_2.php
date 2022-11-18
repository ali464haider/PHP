<?php
    function recoge($var){
        $var = (isset($_REQUEST[$var])) ?
            htmlspecialchars(trim(strip_tags($_REQUEST[$var])),ENT_QUOTES,'UTF-8') : "";
        return $var;
    }

    $errorEdad = "Su edad no está entre 18 y 130 años";
    $errorNombre = "No ha escrito su nombre, o los caracteres no son los esperados";


    $edad = recoge('edad');
    $nombre = recoge('nombre');
    if(preg_match("/^[a-z]+$/i",$nombre) and $edad >= 18 and $edad  <= 130){
        echo("Su nombre es: $nombre <br>");
        echo("Su edad es: $edad");
    }elseif(preg_match("/^[a-z]+$/i",$nombre)==0 and ($edad < 18 or $edad  > 130)){
        header("location:ej_5_1.php?edadIncorrecto=$errorEdad&nombreIncorrecto=$errorNombre");
    }
    elseif(preg_match("/^[a-z]+$/i",$nombre)==0){
        header("location:ej_5_1.php?nombreIncorrecto=$errorNombre");
    }elseif($edad < 18 or $edad  > 130 or $edad==""){
        header("location:ej_5_1.php?edadIncorrecto=$errorEdad");
    }



?>