<?php
$segundos=$_REQUEST['convertidor'];
$modulo=$segundos%60;
$segundos=$segundos-$modulo;
$minutos=$segundos/60;
print("$segundos segundos son $minutos minutos y $modulo segundos");
?>