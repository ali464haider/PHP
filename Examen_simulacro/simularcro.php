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
    form{
        background-color: lightblue;
        margin-top: 5%;
        padding: 20px;}
    span{
        color:red;
    }
</style>
<body>
    <?php
    $max_file_size = 51000;
    $directorio = "images/";

    $nombre = $apellidos = $edad = $telefono = $correo = "";
    $nombreEr = $apellidosEr = $edadEr = $telefonoEr = $correoEr = "";
    $imagenes = "";$nombreCompleto="";
    function recoge($var){
        $var = (isset($_REQUEST[$var])) ? htmlspecialchars(trim(strip_tags($_REQUEST[$var])),ENT_QUOTES,'UTF-8') : "";
        return $var;
    }

    $nombre = recoge('nombre');
    $patron = '/^[a-z]+( [a-z]+)*$/i';

    if(preg_match($patron,$nombre)==0){
        $nombreEr = "<span> El dato nombre: $nombre no es correcto</span>";
    }

    $apellidos = recoge('apellidos');
    $patron = '/^[a-z]+( [a-z]+)*$/i';

    if(preg_match($patron,$apellidos)==0){
        $apellidosEr = "<span> El dato apellidos: $apellidos no es correcto</span>";
    }

    $edad = recoge('edad');
    $patron = '/^[0-9]{2}$/';

    if(preg_match($patron,$edad)==0){
        $edadEr = "<span> El dato edad: $edad no es correcto</span>";
    }

    $telefono = recoge('tel');
    $patron = '/^[0-9]{9}$/';

    if(preg_match($patron,$telefono)==0){
        $telefonoEr = "<span> El dato telefono: $telefono no es correcto</span>";
    }


    $correo = recoge('correo');

    if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
        $correoEr = "<span> El dato correo: $correo no es correcto</span>";
    }

    if($nombreEr == "" and $edadEr == "" and $apellidosEr == "" and $telefonoEr == "" and $correoEr == ""){

    if(isset($_FILES['imagen'])){
        $nomb_f=$_FILES['imagen']['name'];
        $nomb_temp=$_FILES['imagen']['tmp_name'];
        $size=$_FILES['imagen']['size'];
        $type=$_FILES['imagen']['type'];

            if(is_uploaded_file($nomb_temp)){

                $id = date('d-m-y');
                $nomb_pre= $id . "-" . $nomb_f;
                 $nombreCompleto = $directorio .$nomb_pre;

                move_uploaded_file($nomb_temp, $nombreCompleto);
                
                $fptr = fopen('txt_imagen.txt','a');

                $fptr2 = fopen('auxiliar.txt','w');

                fwrite($fptr,"Nombre:".$nomb_f."\n");
                fwrite($fptr,"Size:".$size."\n");

                fwrite($fptr2,"Nombre:".$nomb_f."\n");
                fwrite($fptr2,"Size:".$size."\n");
        
                fclose($fptr);
                fclose($fptr2);



            }else{

                $imaEr =  "<span>No se ha subido algun Imagen</span>";
            }

    }}






    ?>
    <form action="simularcro.php" method="post" enctype="multipart/form-data">
    <h1>Datos Personales</h1>
    Nombre: <input type="text" name="nombre">
    Apellidos: <input type="text" name="apellidos"><br>
    Edad: <input type="text" name="edad"><br>
    Telefono: <input type="number" name="tel"><br>
    Email: <input type="text" name="correo"><br>
    <input type="hidden" name="MAX_FIE_SIZE" value="<?php echo $max_file_size;?>">
    Foto:<input type="file" name="imagen">
    <input type="submit" value="Enviar consulta">
    </form>

    <?php

    if($nombreEr==""){
        echo "el dato nombre es: $nombre";
    }else{
        echo $nombreEr;
    }
    echo "<br>";

    if($apellidosEr==""){
        echo "el dato apellidos es: $apellidos";
    }else{
        echo $apellidosEr;
    }
    echo "<br>";


    if($edadEr==""){
        echo "el dato edad es: $edad";
    }else{
        echo $edadEr;
    }
    echo "<br>";

    if($telefonoEr==""){
        echo "el dato telefono es: $telefono";
    }else{
        echo $telefonoEr;
    }
    echo "<br>";

    if($correoEr==""){
        echo "el dato correo es: $correo";
    }else{
        echo $correoEr;
    }
    echo "<br>";

    if($nombreEr == "" and $edadEr == "" and $apellidosEr == "" and $telefonoEr == "" and $correoEr == ""){

        $fptr = fopen("datos_Insertados.txt","a");

        fwrite($fptr,"Nombre:".$nombre."\n");
        fwrite($fptr,"Apelldios:".$apellidos."\n");
        fwrite($fptr,"Edad:".$edad."\n");
        fwrite($fptr,"Telefono:".$telefono."\n");
        fwrite($fptr,"Correo:".$correo."\n");
        fwrite($fptr,"----------------------------"."\n");

        fclose($fptr);

        echo("<h3>Los ficheros generados Por este Documento Son:</h3>");
        echo("El foto que se excede a travéz del enlace: <a href='$nombreCompleto'> $nomb_f</a><br>");
        echo("El txt cuyo nombre es txt_imagen y su tamaño es :".filesize('txt_imagen.txt').'bytes<br> y los bytes transferido es esta
        linea son :'.filesize('auxiliar.txt').'<br>');
    
        echo("El fichero de imagen cuyo nombre es $nomb_f. y tiene un tamaño de ".filesize($nombreCompleto)."<br>
        $nomb_f es el que voy a copiar al directorio archivo");

       if(!is_dir('archivo')){
        $archivo = mkdir('archivo');
       }

        copy('images/'.$nomb_pre,'archivo/'.$nomb_pre);


    }else{
        echo("<h3><span>Hay algun Error en el formulario por lo tanto no se ha subido el fichero</span></h3>");
    }

    
    ?>
</body>
</html>