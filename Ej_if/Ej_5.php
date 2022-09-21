<html>
    <body>
        <style>
            div{
                display: inline-flex;
            }
            .jugador1{
                border: 10px solid red;
                width: 420px;
            }
            .jugador2{
                border: 10px solid blue;
                width: 420px;
            }
        </style>
    <?php
    print("<p>Actualiza la pagina para mostrar una nueva tirada.</p>");
    $img1=rand(1,6);
    $img2=rand(1,6);
    $img3=rand(1,6);
    $img4=rand(1,6);
    $img5=rand(1,6);
    $img6=rand(1,6);
    $mayordado=max($img1,$img2,$img3);
    print("<div class='jugador1'><img src='img/$img1.svg'>");
    print("<img src='img/$img2.svg'>");
    print("<img src='img/$img3.svg'></div>");
    print("<div class='jugador2'><img src='img/$img4.svg'>");
    print("<img src='img/$img5.svg'>");
    print("<img src='img/$img6.svg'></div><br>");
    print("<p>El jugador 1 es rojo y El Jugador 2 es azul</p></br>");

    if(($img1==$img2 and $img2==$img3)>($img4==$img5 and $img5==$img6)){
        print("El jugador 1 ha ganado.");
    }elseif(($img1==$img2 or $img2==$img3 or $img1==$img3)>($img4==$img5 or $img5==$img6 or $img4==$img6)){
        print("El jugador 1 ha ganado.");
    }elseif(($img1==$img2 or $img2==$img3 or $img1==$img3)<($img4==$img5 or $img5==$img6 or $img4==$img6)){
        print("El jugador 2 ha ganado.");
    }elseif((($img1==$img2 and $img2==$img3)or($img3==$img1 and $img2==$img3))and(($img4==$img5 and $img5==$img6)or($img4==$img6 and $img5==$img3))){
        if(($img1==$img2 or $img2==$img3 or $img1==$img3)==($img4==$img5 or $img5==$img6 or $img4==$img6)){
        print("Se empate por tener una pareja igual o un trio igual");
        }elseif(($img1==$img2 and $img2==$img3)<($img4==$img5 and $img5==$img6)){
            print("El jugador 2 ha ganado.");
        }
    }elseif(($img1+$img2+$img3)>($img4+$img5+$img6)){
        print("El jugador 1 ha ganado.");
    }elseif(($img1+$img2+$img3)==($img4+$img5+$img6)){
        print("Se empate por tener igual numeros.");
    }else{
        print("El jugador 2 ha ganado.");
    }
    


    ?>
    </body>
</html>