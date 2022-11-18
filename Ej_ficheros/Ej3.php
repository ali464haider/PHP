<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color: lightblue;
    }
    input{
        margin: 0 3px;
    }
    span{
        color:red;
    }
</style>
<body>

<?php
    function recoge($var)
    {
        $var =  (isset($_REQUEST[$var])) ?
            htmlspecialchars(trim(strip_tags($_REQUEST[$var])), ENT_QUOTES, 'UTF-8')
            : "";
        return $var;
    }

    function recoge_Imagen($nombre, $tipo)
    {
        $var =  (isset($_FILES[$nombre][$tipo])) ?
            htmlspecialchars(trim(strip_tags($_FILES[$nombre][$tipo])), ENT_QUOTES, 'UTF-8')
            : "";
        return $var;
    }

    $tipo = $zona = $direccion = $numero = $precio = $talla = $extras = $obser = $nombreFichero = $ficheroEr = "";
    $obserEr = $direccionEr = $numeroEr = $precioEr = $tallaEr = $extrasEr = "";
    $nombreCompleto="";
    $max_file_size = "51200";
    $patron = '/^[a-zA-Z]+( [a-zA-Z]+)*$/';
    $dirSubida = "uploads/";


    if (isset($_REQUEST['enviar'])) {

        $tipo = recoge('tipo');
        $zona= recoge('zona');

        $direccion = recoge('direccion');
        $patron = '/^[a-zA-Z]+( [a-zA-Z0-9]+)*$/';


        if (preg_match($patron, $direccion) == 0) {
            $direccionEr = "<span>$direccion no es una direccion correcta o es Vacia.</span>";
        }

        $numero = recoge('numero');

        if($numero==""){
            $numeroEr = "<span>$numero no indico numero de dormitorios.</span>";
        }


        $precio = recoge('precio');
        $patron= '/^[0-9]+$/';


        if (preg_match($patron, $precio) == 0) {
            $precioEr = "<span>$precio no es un precio correcta o es Vacia.</span>";
        }

        $talla = recoge('talla');
        $patron= '/^[0-9]+$/';


        if (preg_match($patron, $talla) == 0) {
            $tallaEr = "<span>$talla no es un tamaño correcta o es Vacia.</span>";
        }

        

        $obser = recoge('obser');

        if($obser==""){
            $obserEr = "<span>$obser no indico observacion de su $tipo.</span>";
        }

        



        if (isset($_FILES['imagen'])) {

            $nombreFichero = recoge_Imagen('imagen', 'name');
            $tmp_name = recoge_Imagen('imagen', 'tmp_name');
            $size = recoge_Imagen('imagen', 'size');
            $type = recoge_Imagen('imagen', 'type');

            if (is_uploaded_file($tmp_name)) {

                $id = date('d-m-y');
                $nombreCompleto = $dirSubida . $id . "-" . $nombreFichero;

                move_uploaded_file($tmp_name, $nombreCompleto);
                $ficheroMensaje = "Fichero subido con el nombre $nombreCompleto";
            } else {
                $ficheroEr = "No se ha podido subir el fichero";
            }
        }
    }

    ?>
    <p>Introduca los datos de vivienda</p>

    <form action="Ej3.php" enctype="multipart/form-data" method="post">

        Tipo de VIvienda:<select name="tipo">
            <option value="piso">Piso</option>
            <option value="chalet">Chalet</option>
        </select>
        <br><br>

        zona:<select name="zona">
            <option value="Mostoles">Mostoloes</option>
            <option value="Alcorcon">Alcorcon</option>
        </select><br><br>

        Direccion: <input type="text" name="direccion">
        <br><br>

        Numero de dormitorios:
        <input type="radio" name="numero" value="1">1
        <input type="radio" name="numero" value="2">2
        <input type="radio" name="numero" value="3">3
        <input type="radio" name="numero" value="4">4
        <input type="radio" name="numero" value="5">5
        <br><br>

        Precio<input type="text" name="precio">€ <br><br>
        Tamaño<input type="text" name="talla">metros cuadrados <br><br>

        Extras(marque los que proceden):
        <input type="checkbox" name="extras[]" value="piscina">piscina
        <input type="checkbox" name="extras[]" value="Jardin">Jardin
        <input type="checkbox" name="extras[]" value="Garage">Garage<br><br>

        Foto: <input type="file" name="imagen"><br><br>

        Observaciones: <textarea name="obser" cols="60" rows="6"></textarea><br><br>

        <input type="submit" value="Insertar vivienda" name="enviar">

    </form>

    <?php
    $dirOk = $preOk = $obsOk = $tallaOk = $tipoOk = $zonaOk = $nroOk = false;
     
     if($direccionEr == ""){
        echo("la direccion es $direccion");
        $dirOk = true;
     }else{
        echo($direccionEr);
     }
     echo("<br>");

     if($precioEr == "" and $precio != ""){
        echo("el precio solicitado es $precio");
        $preOk = true;
     }else{
        echo($precioEr);
     }
     echo("<br>");

     if($obserEr == "" and $obser != ""){
        echo("la observacion es $obser");
        $obsOk = true;
     }else{
        echo($obserEr);
     }
     echo("<br>");

     if($tallaEr == "" and $talla != ""){
        echo("el tamaño es $talla");
        $tallaOk = true;
     }else{
        echo($tallaEr);
     }
     echo("<br>");

     if($tipo != ""){
        echo("el tipo solicitado es $tipo");
        $tipoOk = true;
     }
     echo("<br>");

     if($zona != ""){
        echo("la zona solicitado es $zona");
        $zonaOk = true;
     }
     echo("<br>");

     if($numero != ""){
        echo("los nros de dormitorios son $numero");
        $nroOk = true;
     }else{
        echo("<span>No se ha indicado nro de dormitorio.</span>");
     }
     echo("<br>");

     if(isset($_POST['extras'])){
        $extras = $_POST['extras'];
        foreach($extras as $extra){
            $extra=recoge($extra);
            echo("la extra que solicitan es: $extra<br>");
        }
     }

    if($dirOk == true and $preOk == true and $obsOk == true and $tallaOk == true and $tipoOk == true and $zonaOk == true and $nroOk == true){
        echo("<h1>El piso Solicitado Sería:</h1>");
        echo("<img src='$nombreCompleto'>");
    }else{
        echo("<p><span>no se puede dar el fichero por los erroes visualizados, rellene bien el formulario</span></p>");
    }

    ?>
    
</body>

</html>