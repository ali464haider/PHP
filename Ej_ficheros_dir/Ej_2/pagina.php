<?php
$archivo = "contador.txt";
$contador = 0;
$fp = fopen($archivo,"r");
$contador = fgets($fp, 26);
fclose($fp);
$contador=$contador+1;
$fp = fopen($archivo,"w+");
fwrite($fp, $contador, 26);
fclose($fp);
echo "Esta página ha sido visitada $contador veces";
?>