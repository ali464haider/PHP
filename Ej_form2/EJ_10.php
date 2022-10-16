<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2 {
            color: blue;
        }

        fieldset {
            height: 300px;
            width: 100%;
        }

        div {
            display: flex;
        }

        .main {
            display: block;
            border: 3px lightblue dashed;
            height: 48%;
            padding: 8px 10px;


        }

        label {
            font-weight: bold;
            width: 130px;
        }

        .resultado {
            display: block;
            border: 2px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php

    function recoger_Dato($var)
    {
        $var = (isset($_REQUEST[$var])) ?
            htmlspecialchars(trim(strip_tags($_REQUEST[$var])), ENT_QUOTES, "UTF-8")
            : "";
        return $var;
    }

    
    $buscado = recoger_Dato('buscar');
    $tipo_busqueda = recoger_Dato('tipo_busqueda');
    $Genero = recoger_Dato('genero_musical');

    ?>

    <fieldset>
        <h2>Formulario simple</h2>
        <h3><i> Busqueda de canciones</i></h3>
        <form action="EJ_10.php">

            <div class="main">
                <div>
                    <label for="buscar">Texto a buscar:</label>
                    <input type="text" name="buscar" id="buscar">
                </div>
                <br>
                <div>
                    <label for="tipo_busqueda">Buscar en:</label>
                    <input type="radio" name="tipo_busqueda" id="tipo_busqueda" value="Titulos de cancion">Titulos de cancion
                    <input type="radio" name="tipo_busqueda" id="tipo_busqueda" value="Nombres de Album">Nombres de Album
                    <input type="radio" name="tipo_busqueda" id="tipo_busqueda" value="Ambos campos">Ambos campos

                </div>
                <br>
                <div>
                    <label for="genero_musical">Genero musical:</label>
                    <select name="genero_musical" id="genero_musical">
                        <option value="Todos">Todos</option>
                        <option value="Acustica">Acustica</option>
                        <option value="Banda Sonora">Banda Sonora</option>
                        <option value="Blues">Blues</option>
                        <option value="Electronica">Electronica</option>
                        <option value="Fok">Fok</option>
                        <option value="Jazz">Jazz</option>
                        <option value="New Age">New Age</option>
                        <option value="Pop">Pop</option>
                        <option value="Rock">Rock</option>
                    </select>
                </div>
                <br>
                <div>
                    <input type="submit" value="enviar">
                </div>
            </div>

        </form>
    </fieldset>
    <br><br><br>
    <div class="resultado">
        <h2>Formulario simple. Resultados del Formulario</h2>
        <p>Estos son los datos introducidos:</p>

        <ul>
            <?php

            
            echo ("<li>Texto de busqueda: $buscado</li>");
            echo ("<li>Buscar en: $tipo_busqueda</li>");
            echo ("<li>Genero: $Genero</li>")




            ?>
        </ul>



        <span>[</span><a href=".main">Nueva busqueda</a><span>]</span>
    </div>
</body>

</html>