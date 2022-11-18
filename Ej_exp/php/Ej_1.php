<?php
$texto=$_POST['texto'];


function comprueba_pcre($patron, $texto, $objetivo)
{
	if (preg_match($patron, $texto)) {
    	print "    <li>La cadena <strong>\"$texto\"</strong> $objetivo.</li>\n";
	} else {
    	print "    <li>La cadena <strong>\"$texto\"</strong> <span style=\"color: red\">no</span> $objetivo.</li>\n";
	}
}


print "  <p>Ha escrito: <strong>\"$texto\"</strong></p>\n  <ol>\n";

if ($texto == "") {
    print "    <li>La cadena \"\" está vacía.</li>\n";
} else {
    print "    <li>La cadena <strong>\"$texto\"</strong> <span style=\"color: red\">no</span> está vacía.</li>\n";
}

$patron = "/^[[:alpha:]]+$/";
comprueba_pcre($patron, $texto, "es una única palabra");

$patron = "/^[[:alpha:]]+ +[[:alpha:]]+$/";
comprueba_pcre($patron, $texto, "son dos palabra");

$patron = "/^[a-z]+$/i";
comprueba_pcre($patron, $texto, "es una única palabra que contiene solamente caracteres ingleses");

$patron = "/^a*e*i*o*u*$/";
comprueba_pcre($patron, $texto, "es una cadena de vocales minúsculas sin acentuar en orden alfabético ");

$patron = "/^[0-9]+$/";
comprueba_pcre($patron, $texto, "es un único número");

$patron = "/^[0-9]*[02468]$/";
comprueba_pcre($patron, $texto, "es un único número par");

$patron = "/^[6|9][0-9]{8}$/";
comprueba_pcre($patron, $texto,  "es un teléfono de 9 cifras que empieza por 6 o 9");

$patron = "/^[0-9]{1,8}[A-Z]?$/";
comprueba_pcre($patron, $texto, "es un número del DNI (de 1 a 8 números, con letra inglesa final mayúscula o sin ella)");

$patron = "/^[0-4][0-9]{4}$/";
comprueba_pcre($patron, $texto, "es un código postal");

?>