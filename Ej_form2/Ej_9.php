<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    label {
        display: inline-block;
        width: 120px;
    }
</style>

<body>
    <p>Escirbe los siguientes datos</p>

    <form action="Ej_9.php" method="post">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre"><br><br>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="text" name="password" id="password"><br><br>
        </div>

        <div>
            <label for="estudio">Estudios:</label>
            <select name="estudio" id="estudio">
                <option value="">...</option>
                <option value="Sin Estudio">Sin Estudio</option>
                <option value="Eso">Eso</option>
                <option value="Bachillerato">Bachillerato</option>
                <option value="Universitario">Universitario</option>
                <option value="otros">otros</option>
            </select>
            <br><br>

        </div>

        <div>
            <label for="Nacionalidad">Nacionalidad:</label><br><br>
            <input type="radio" name="Nacionalidad" id="Nacionalidad" value="Hispana">Hispana<br>
            <input type="radio" name="Nacionalidad" id="Nacionalidad" value="Sajona">Sajona<br>
            <input type="radio" name="Nacionalidad" id="Nacionalidad" value="otras">otras<br><br>
        </div>

        <div>
            <label for="idiomas">Marcar idiomas:</label><br><br>
            <input type="checkbox" name="idiomas[]" id="idiomas" value="Inglés">Inglés<br>
            <input type="checkbox" name="idiomas[]" id="Castellano" value="Castellano">Eso<br>
            <input type="checkbox" name="idiomas[]" id="idiomas" value="Alemán">Alemán<br>
            <input type="checkbox" name="idiomas[]" id="idiomas" value="Urdu">Urdu<br><br>
        </div>


        <div>
            <label for="correo">Email</label>
            <input type="text" name="correo" id="correo"><br><br>
        </div>

        <div>
            <label for="Sitio">Sitio Web:</label>
            <input type="text" name="Sitio" id="Sitio"><br><br>
        </div>



        <input type="submit" value="Enviar">
    </form>

</body>

</html>

<?php

print("<h1 align=left>Los datos introducidos son los siguientes</h1>");

$patron = '/^[[:alpha:]]+( [[:alpha:]]+)*$/';

$nombre = $_POST['nombre'];

if (preg_match($patron, $nombre)) {
    print("El nombre es: $nombre <br>");
} else {
    print("El nombre no es correcto<br>");
}

$patron = '/^[[:alnum:]]{5,}$/';

$password = $_POST['password'];

if (isset($_POST['password'])) {

    if (preg_match($patron, $password)) {
        print("El password es: $password <br>");
    } else {
        print("El password tiene que ser minimo de 5 caracteres<br>");
    }
} else {
    print("No se ha escrito la contraseña<br>");
}


$estudio = $_POST['estudio'];

if ($estudio == "") {
    print("No se ha indicado el estudio <br>");
} else {
    print("El estudio seleccionada es " . $estudio . "<br>");
}

if (empty($_POST['Nacionalidad'])) {
    print("No se ha indicado su Nacionalidad</br>");
} else {
    print("Su sexo es " . $_POST['Nacionalidad'] . " <br>");
}

if (empty($_POST['idiomas'])) {
    print("No se ha indicado sus idiomas<br>");
} else {
    $idiomas = $_POST['idiomas'];

    foreach ($idiomas as $idiomas) {
        print("Le gusta: $idiomas <br>");
    }
}

$patron = '/^[^0-9][[:alnum:]\._-]+( [[:alnum:]\.-_]+)*[@]{1}[[:alpha:]]+([.][[:alpha:]]{2,4}){1,2}$/';

$correo = $_POST['correo'];

if (preg_match($patron, $correo)) {
    print("El correo es: $correo");
} else {
    print("El correo no coincide con el formato");
}


?>