<?php

function recoge($var)
{
    $var =  (isset($_REQUEST[$var])) ?
        htmlspecialchars(trim(strip_tags($_REQUEST[$var])), ENT_QUOTES, 'UTF-8')
        : "";
    return $var;
}


$nombre=recoge('nombre');
$comentario = recoge('comentario');

if($nombre !="" and $comentario!=""){
    
echo("<p>Los datos se cargaron correctamente.</p>");
echo("<p>Pulsa <a href='pagina3.php'>aquí</a> para ver los datos.</p>");


}else{
    echo("<p>No hay datos registrados.</p>");
}

$fptr = fopen("datos.txt",'a+');

if(!$fptr){
    die("No existe el fichero");
}else{
    fwrite($fptr,"-------------------------------------------------------------------------"."\n");
    fwrite($fptr,$nombre."\n");
    fwrite($fptr,$comentario."\n");
   
}

fclose($fptr);





?>