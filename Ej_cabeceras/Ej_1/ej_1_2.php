<?php
    function recoge($var){
        $var = (isset($_REQUEST[$var])) ?
            htmlspecialchars(trim(strip_tags($_REQUEST[$var])),ENT_QUOTES,'UTF-8') : "";
        return $var;
    }

    $error = "Introdujo direccion incorrecta";


    $url = recoge('url');
    if(filter_var($url,FILTER_VALIDATE_URL)){
        header("location: $url");
    }else{
        header("location:ej_1_1.php?urlNoValido=$error");
    }


?>