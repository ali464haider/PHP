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
        width: 160px;
        margin-right: 10px;
        font-weight: bold;
        }
        label[for=comentario]{
            position: relative;
            bottom: 140px;
        }
        form{
            border: 1px solid blue;
            padding: 0px 5px 10px 5px;
        }
</style>
<body>
    <form action="pagina2.php" method="post">
        <h1>Surgerencias para nuestra pagina Web</h1>
        <label for="nombre">Introduzca su nombre</label>
        <input type="text" name="nombre" id="nombre"><br><br>
        <label for="comentario">Comentarios sobre esta pagina</label>
        <textarea name="comentario" id="comentario" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>