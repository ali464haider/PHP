<?php


$numero= $_REQUEST['numero'];

print("<p> N= $numero</p>");
function factorizar($num){
    $factores=1;
    for($i = 1; $i<= $num; $i++)
    {
        if($num%$i==0){

        print("<p>$i</p>");
        $factores=$factores*$i;
        
        if($factores==$num or $factores>$num){
            break;
        }
        }
        
    }
}
factorizar($numero);


?>