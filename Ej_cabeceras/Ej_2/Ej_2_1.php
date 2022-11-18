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
        if(isset($_REQUEST['claveNoValida'])){
          echo "<span>".$_REQUEST['claveNoValida']."</span>";
        }
    ?>


    <form action="ej_2_2.php" method="post">
        Intorducza una clave (z80)
        <input type="text" name="clave" id="clave">
        <br>
        <input type="submit" value="confirmar">
    </form>


</body>
</html>