<?php

    $directorio = 'directorio';
    $ptrDir=opendir($directorio);

    print"El directorio actual es:"; echo getcwd() ;print" <h1> Su contenido es </h1>";
    while($archivo = readdir($ptrDir)) //obtenemos un archivo tras otro con

    { if(!is_dir($directorio."/".$archivo)) //verificamos si es o no un directorio
    {
        echo $archivo ."-con un tamaño de : ".filesize($directorio."/".$archivo) ." bytes
    <br/>";
    }
    }
    Closedir($ptrDir);


?>