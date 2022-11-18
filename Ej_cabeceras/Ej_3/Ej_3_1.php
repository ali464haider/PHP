<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>

   


    <form action="ej_3_2.php" method="post">
        Escribe su nombre:
        <input type="text" name="nombre" id="nombre">
        <?php
        if (isset($_REQUEST['nombreIncorrecto'])) {
            echo "<span>" . $_REQUEST['nombreIncorrecto'] . "</span>";
        }
        ?>
        <br>
        <input type="submit" value="Comprobar">
        <input type="reset" value="Borrar">
    </form>


</body>

</html>