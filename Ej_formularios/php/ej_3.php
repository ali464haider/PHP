<?php
$a=$_REQUEST['A'];
$b=$_REQUEST['B'];
$c=$_REQUEST['C'];

$x1=(-($b)+sqrt((($b*$b)-4*($a)*($c))))/(2*$a);
$x2=(-($b)-sqrt((($b*$b)-4*($a)*($c))))/(2*$a);
if($x1>0 and $x2>0){
    print("la ejecucion tiene dos resultados son: $x1 $x2");
}else if($x1<0 and $x2>0){
    print("la ejecucion tiene un resultado: $x2 ");
}else if($x1>0 and $x2<0){
    print("la ejecucion tiene un resultado: $x1 ");
}else{
    print("la ejecucion no tiene solucion real");
}
print("<br>");
print("x1: $x1 x2: $x2");


?>