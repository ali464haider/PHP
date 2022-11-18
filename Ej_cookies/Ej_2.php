

<?php
if (isset($_COOKIE['conteo'])) {
    $conteo = $_COOKIE['conteo'] + 1;
} else {
    $conteo = 1;
}
setcookie('conteo', $conteo, time()+3600);
setcookie("Carrito[$conteo]", $conteo, time()+3600);
echo $conteo;
?>
