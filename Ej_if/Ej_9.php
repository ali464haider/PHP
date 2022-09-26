<html>
    <body>
        <style>
            div{
                text-align: center;
               
            }
        </style>
       
    <?php
    print("<p>Actualiza la pagina para que dibuje entre 1 y 10 círculos negros (al
    azar) en una fila de tabla.</p><br>");
    $tirada=rand(1,10);
    $par=0;
    $impar=0;
    print("<strong>$tirada dados</strong><br>");

    for($i=0;$i<$tirada;$i++){
        $img=rand(1,6);
        if($img%2==0){
            $par++;
        }else{
            $impar++;
        }
        print("<img src='img/$img.svg'>");
    }

    print("<p>Han salido $par numero pares y $impar numero impares.</p>");

    
   

    ?>
    </body>
</html>