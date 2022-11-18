<?php
$peso=$_REQUEST['Peso'];
$altura=$_REQUEST['Altura'];
$altura2=$altura/100;
$imc=round($peso/($altura2*$altura2));

print("Con un peso de $peso kg y una altura de $altura cm, su indice masa corporal es $imc");


?>