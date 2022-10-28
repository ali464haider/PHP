<?php

$fptr = file("datos.txt");

foreach($fptr as $linea){
    echo($linea).'<br>';
}



?>