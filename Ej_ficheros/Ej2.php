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

    input[type=text],
    textarea {
        width: 400px;
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

    $titulo = $texto = $categoria = $ficheroMensaje = "";
    $tituloEr = $textoEr = $ficheroEr = "";
    $nombreCompleto="";
    $max_file_size = "51200";

    $dirSubida = "uploads/";


    if (isset($_REQUEST['enviar'])) {

        $titulo = recoge('titulo');
        $patron = '/^[a-zA-Z]+( [a-zA-Z]+)*$/';


        if (preg_match($patron, $titulo) == 0) {
            $tituloEr = "<span>$nombre no es un titulo correcto o es Vacio.</span>";
        }

        $texto = recoge('texto');
        $patron= '/^[a-zA-Z]+( [a-zA-Z]+){5,}$/';


        if (preg_match($patron, $texto) == 0) {
            $textoEr = "<span>$texto no es una descripcion correcta o es Vacia.</span>";
        }

        $categoria = recoge('categoria');



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
        Subida FIcheros 1
    </h1>
    <h3>Subida De Ficheros</h3>

    <h5>Insertar Nueva Noticia</h5>

    <form action="Ej2.php" enctype="multipart/form-data" method="post">

        Titulo: *<input type="text" name="titulo"><br><br>
        Texto: * <textarea name="texto" cols="60" rows="6"></textarea>
        <br><br>

        Categoria: <select name="categoria">
            <option value="">...</option>
            <option value="las costas">costas</option>
            <option value="las Montañas">Montaña</option>
            <option value="las playas">playa</option>
        </select><br><br>

        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size ?>">
        Imagen: <input type="file" name="imagen">

        <br><br>

        <input type="submit" value="Insertar noticia" name="enviar">
        <br><br>
        <p>NOTA: los datos marcados con (*) deben ser rellenados obligatoriamente</p>


    </form>



    <br>

    <h3>Resultado de la insercion de Nueva Noticia</h3>

    <?php
   if ($tituloEr == "" and $textoEr == "" and $titulo != "") {
        echo ("<p>La noticia ha sido recibida correctamente:</p>");
        echo ("<ul>
            <li>Titulo: $titulo</li>
            <li>Texto: $texto</li>
            <li>Categoria: $categoria </li>
            <li>Imagen: <a href='$nombreCompleto'>$nombreFichero</a></li>
        </ul>");
    }else{
      echo ("<p>La noticia no ha sido recibida correctamente:</p>");
    }

    ?>



</body>

</html>