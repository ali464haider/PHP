<?php

$caracter= $_REQUEST['caracter'];

if(is_numeric($caracter))
{
    print("<p>$caracter es un valor numerico</p>");
}
elseif($caracter=="")
{
    print("<p> Es un campo blanco</p>");
}
elseif(is_string($caracter))
{
    if(ctype_lower($caracter))
    {
        print("<p>$caracter es minuscula </p>");
    }
    elseif(ctype_upper($caracter))
    {
        print("<p>$caracter es mayuscula </p>");
    }
}


/*
print("<p> C= $caracter</p>");
function averiguarcaracter($C)
{
    $mayusculas=[]
}
averiguarcaracter($C);
*/

?>