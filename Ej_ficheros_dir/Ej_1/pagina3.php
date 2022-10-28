<?php

$fptr = file("fich_salida.txt");

foreach($fptr as $linea){
    echo($linea).'<br>';
}



?>