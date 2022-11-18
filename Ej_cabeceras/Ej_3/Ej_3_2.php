<?php
    function recoge($var){
        $var = (isset($_REQUEST[$var])) ?
            htmlspecialchars(trim(strip_tags($_REQUEST[$var])),ENT_QUOTES,'UTF-8') : "";
        return $var;
    }

    $error = "No ha escrito su nombre, o los caracteres no son los esperados";


    $nombre = recoge('nombre');
    if(preg_match("/^[a-z]+$/i",$nombre)){
        echo("Su nombre es: $nombre");
    }else{
        header("location:ej_3_1.php?nombreIncorrecto=$error");
    }


?>