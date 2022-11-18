<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span{
            color:red;
        }
    </style>
</head>
<body>

    <?php 
        if(isset($_REQUEST['urlNoValido'])){
          echo "<span>".$_REQUEST['urlNoValido']."</span>";
        }
    ?>


    <form action="ej_1_2.php" method="post">
        <p>Intorducza una direccion de un sitio web</p>
        (ej http://www.google.com):
        <input type="text" name="url" id="url">
        <br>
        <input type="submit" value="Redirecccionar">
    </form>


</body>
</html>