<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
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

    $nombre = $apellido = $direccion = $nombreFichero = $ficheroEr = $ficheroMensaje = "";
    $nombreEr = $apellidoEr = $direccionEr = "";
    $nombreCompleto = "";
    $max_file_size = "100000";
    $patron = '/^[a-zA-Z]+( [a-zA-Z]+)*$/';
    $dirSubida = "uploads/";
    $ficheroPermitidos = array("png","jpeg","jpg");



    if (isset($_REQUEST['enviar'])) {

        $nombre = recoge('nombre');
        $patron = '/^[a-zA-Z]+( [a-zA-Z0-9]+)*$/';


        if (preg_match($patron, $nombre) == 0 or strlen($nombre) > 10) {
            $nombreEr = "<span>$nombre no es una nombre correcta o es Vacia o es mayor que 10 caracteres.</span>";
        }

        $apellido = recoge('apellido');
        $patron = '/^[a-zA-Z]+(( |-)[a-zA-Z0-9]+)*$/';


        if (preg_match($patron, $apellido) == 0 or strlen($apellido) > 18) {
            $apellidoEr = "<span>$apellido no es una apellido correcta o es Vacia  o es mayor que 18 caracteres.</span>";
        }

        $direccion = recoge('direccion');
        $patron = '/^(calle)|(plaza)|(avenida)( [a-z0-9])$/i';


        if (preg_match($patron, $direccion) == 0) {
            $direccionEr = "<span>$direccion no es una direccion correcta o es Vacia.</span>";
        }

        
        if (isset($_FILES['imagenes'])) {

            $nombreFichero = $_FILES['imagenes']['name'];
            $tmp_name = $_FILES['imagenes']['tmp_name'];
            $size = $_FILES['imagenes']['size'];
            $type = $_FILES['imagenes']['type'];
          

            if (count($nombreFichero) > 1 ) {
                for ($i = 0; $i < count($nombreFichero); $i++) {

                    $pos = strpos($type[$i],"/");
                    $tipoFichero = substr($type[$i],$pos+1);

                    if (is_uploaded_file($tmp_name[$i]) and $size[$i] < $max_file_size and (in_array($tipoFichero,$ficheroPermitidos))  ) {

                        $id = date('d-m-y');
                        $nombreCompleto = $dirSubida . $id . "-" . $nombreFichero[$i];

                        move_uploaded_file($tmp_name[$i], $nombreCompleto);
                        $ficheroMensaje = $ficheroMensaje."<img src=' $nombreCompleto'> <br>";
                    } else {
                        $ficheroEr = $ficheroEr."No se ha podido subir el fichero ".$nombreFichero[$i]." <br>";
                    }
                }
            } else{
                $ficheroEr = "Los ficheros tienen que ser 2 como minimo";
            }
        }
    }

    ?>
    <h1>Formulario subida de archivos Multiple</h1>

    <form action="Ej1.php" method="post" enctype="multipart/form-data">
        Nombre <input type="text" name="nombre">
        Apellido <input type="text" name="apellido">
        <br>
        Direccion <input type="text" name="direccion">

        <h3>elige al menos dos fotos</h3>

        <input type="file" name="imagenes[]" multiple="multiple" />
        <input type="submit" value="Enviar archivos" name="enviar">
    </form>


    <?php
    echo "<pre> los datos son siguientes <br>";

    if ($nombreEr == "") {
        echo "el nombre es: $nombre";
    } else {
        echo $nombreEr;
    }
    echo "<br>";

    if ($apellidoEr == "") {
        echo "el apellido es: $apellido";
    } else {
        echo $apellidoEr;
    }
    echo "<br>";

    if ($direccionEr == "") {
        echo "la direccion es: $direccion";
    } else {
        echo $direccionEr;
    }
    echo "<br>";

    if($ficheroEr == "" and $ficheroMensaje != "" and $nombreEr == "" and $apellidoEr == "" and $direccionEr== ""){
        echo("<h1>los ficheros son siguientes:</h1>");
        echo("$ficheroMensaje"." ".$ficheroEr);
    }else{
      echo("<p><span>no se puede dar el fichero por los erroes visualizados, rellene bien el formulario</span></p>");
    }

    ?>
</body>

</html>