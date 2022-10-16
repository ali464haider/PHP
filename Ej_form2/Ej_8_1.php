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
        width: 80px;
    }

    span {
        color: red;
    }
</style>

<body>
    <?php
    $nameEr = "";
    $telEr = "";
    $correoEr = "";
    $name = "";
    $tel = "";
    $correo = "";

    $patron_nombre = '/^[[:alpha:]]+( [[:alpha:]]+)*$/';
    $patron_tel = '/^[0-9]{9}$/';
    $patron_correo = '/^[^0-9][[:alnum:]\._-]+( [[:alnum:]\.-_]+)*[@]{1}[[:alpha:]]+([.][[:alpha:]]{2,4}){1,2}$/';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['nombre'])) {
            $nameEr = "Name is Required";
        } else {
            if (preg_match($patron_nombre, test_input($_POST['nombre']))) {
                $name = test_input($_POST['nombre']);
            } else {
                $nameEr = "Name is not correct";
            }
        }

        if (empty($_POST['tel'])) {
            $telEr = "Tel is Required";
        } else {
            if (preg_match($patron_tel, test_input($_POST['tel']))) {
                $tel = test_input($_POST['tel']);
            } else {
                $telEr = "Telephone is not correct";
            }
        }

        if (empty($_POST['correo'])) {
            $correoEr = "Email is Required";
        } else {
            if (preg_match($patron_correo, test_input($_POST['correo']))) {
                $correo = test_input($_POST['correo']);
            } else {
                $correoEr = "Email is not correct";
            }
        }
    }

    function test_input($texto)
    {
        $texto = trim($texto);
        $texto = stripslashes($texto);
        $texto = htmlspecialchars($texto);
        return $texto;
    }


    ?>

    <p>Escirbe los siguientes datos</p>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre"><span>*<?php echo $nameEr; ?></span><br><br>
        </div>

        <div>
            <label for="tel">Telefono</label>
            <input type="tel" name="tel" id="tel"><span>*<?php echo $telEr; ?></span><br><br>
        </div>

        <div>
            <label for="correo">Email</label>
            <input type="text" name="correo" id="correo"><span>*<?php echo $correoEr; ?></span><br><br>
        </div>
        <input type="submit" value="Enviar">
    </form>
    <?php

    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $correo;
    echo "<br>";
    echo $tel;


    ?>
</body>

</html>