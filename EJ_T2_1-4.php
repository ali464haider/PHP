<html>
    <body>
       <div style="border:1px solid;border-radius:50%;width:100px;height: 100px;"></div>
       <div style="border:1px solid;border-radius:50%;width:100px;height: 100px;"></div>
       <div style="border:1px solid;border-radius:50%;width:100px;height: 100px;"></div>
       
    <?php
    echo("<h4>Ejericio 1</h4>");
    $numero1=rand(0,10);
    $numero2=rand(0,10);
    $res=$numero1+$numero2;
    echo("$numero1 + $numero2 = $res");


    echo("</br><h4>Ejericio 2</h4>");
    $font_num=rand(10,50);
    $px="px";
    $font_Size_value=$font_num.$px;
    echo("estilo a aplicar($font_Size_value)");
    echo("<div style='border:1px solid;text-align:center;width:".($font_num*3)."px;'>");
    echo("<p style='font-size:$font_Size_value'>¡Hola!</p></div>");
    
    echo("</br><h4>Ejericio 3</h4>");
    $num_random=rand(0,10);
    $font_Size_value="30px";
    echo("<div style='border:1px solid;text-align:center;width:50px;'>");
    echo("<p style='font-size:$font_Size_value'>$num_random</p></div>");

    echo("</br><h4>Ejericio 4</h4>");
    
    ?>
    </body>
</html>