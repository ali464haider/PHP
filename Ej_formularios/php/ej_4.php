<?php
$dinero=$_REQUEST["Convertir"];
$tipo=$_REQUEST["opcion"];
$euros;
if($tipo=="dolar"){
    $euros=$dinero/1;
}else if($tipo=="peso"){
    $euros=$dinero/20.08;
}else if($tipo=="yenas"){
    $euros=$dinero/143.05;
}else{
    $euros=$dinero/166.386;
}


print("$dinero $tipo son $euros Euros");


?>