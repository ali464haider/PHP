<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        background-color: lightblue;
    }

    span {
        color: red;
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

    $nombre = $apellido = $edad = $telefono = $correo = $nombreFichero = $ficheroMensaje = "";
    $nombreEr = $apellidoEr = $edadEr = $telefonoEr = $correoEr = $ficheroEr = "";
    $max_file_size = "51200";

    $dirSubida = "uploads/";




    if (isset($_REQUEST['enviar'])) {

        $nombre = recoge('nombre');
        $patron = '/^[a-zA-Z]+$/';


        if (preg_match($patron, $nombre) == 0) {
            $nombreEr = "<span>$nombre introducido no es correcto</span>";
        }


        $apellido = recoge('apellido');
        $patron = '/^[a-zA-Z]+$/';


        if (preg_match($patron, $apellido) == 0) {
            $apellidoEr = "<span>$apellido introducido no es correcto</span>";
        }


        $edad = recoge('edad');
        $patron = '/^[0-9]{2}+$/';


        if (preg_match($patron, $edad) == 0) {
            $edadEr = "<span>$edad introducido no es correcto</span>";
        }


        $telefono = recoge('tel');
        $patron = '/^[0-9]{9}+$/';


        if (preg_match($patron, $telefono) == 0) {
            $telefonoEr = "<span>$telefono introducido no es correcto</span>";
        }


        $correo = recoge('correo');


        if (filter_var($correo, FILTER_VALIDATE_EMAIL) == false) {
            $correoEr = "<span>$correo introducido no es correcto</span>";
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
    <h1>
        los Valores introducidos Son:
    </h1>

    <h4>Datos Personales</h4>
    <form action="Ej1.php" method="post" enctype="multipart/form-data">
        NOMBRE: <input type="text" name="nombre">
        APELLIDO: <input type="text" name="apellido"><br>
        EDAD: <input type="text" name="edad"><br>
        TELEFONO: <input type="number" name="tel"><br>
        EMAIL: <input type="email" name="correo"><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
        FOTO: <input type="file" name="imagen"><input type="submit" value="Enviar consulta" name="enviar">
    </form>

    <?php
    echo "<pre> los datos son siguientes <br>";

    if ($nombreEr == "") {
        echo "el dato es: $nombre";
    } else {
        echo $nombreEr;
    }
    echo "<br>";

    if ($apellidoEr == "") {
        echo "el dato es: $apellido";
    } else {
        echo $apellidoEr;
    }
    echo "<br>";

    if ($edadEr == "") {
        echo "el dato es: $edad";
    } else {
        echo $edadEr;
    }
    echo "<br>";

    if ($telefonoEr == "") {
        echo "el dato es: $telefono";
    } else {
        echo $telefonoEr;
    }
    echo "<br>";

    if ($correoEr == "") {
        echo "el dato es: $correo";
    } else {
        echo $correoEr;
    }
    echo "<br>";


    echo "</pre>";

    echo ("<h1>El Fichero Es: </h1>");

    echo ("<p>la foto en formulario:<p><br>");

    if ($ficheroEr == "") {
        if($nombreEr == "" and $apellidoEr == "" and $edadEr == "" and $telefonoEr == "" and $correoEr == ""){
            echo "<img src='$nombreCompleto'>";
        }else{
            echo("Corrige los errores en rojo para ver la imagen");
        }
        
    } else {
        echo $ficheroEr;
    }


    ?>
</body>

</html>