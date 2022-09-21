<html>
    <body>
        <style>
            div{
                display: flex;
            }
        </style>
    <?php
    print("<p>Actualiza la pagina para mostrar una nueva tirada.</p>");
    $img1=rand(1,6);
    $img2=rand(1,6);
    $img3=rand(1,6);
    $mayordado=max($img1,$img2,$img3);
    print("<div><img src='img/$img1.svg'>");
    print("<img src='img/$img2.svg'>");
    print("<img src='img/$img3.svg'></div><br>");
    
    if($img1==$img2 and $img2==$img3){
        print("Ha sacado un trio");
    }else if($img1==$img2 or $img2==$img3 or $img1==$img3){
        print("Ha sacado una pareja");
    }else{
        print("El mayor del valor es $mayordado");
    }

    ?>
    </body>
</html>