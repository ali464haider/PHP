<html>

<body>
   
   <?php
    echo("<h4>Ejericio 1</h4>");
    $numero1=rand(0,10);
    $numero2=rand(0,10);
    $res=$numero1+$numero2;
    echo("$numero1 + $numero2 = $res");


    echo("</br><h4>Ejericio 2</h4>");
    $font_num=rand(10,20);
    $px="px";
    $font_Size_value=$font_num.$px;
    echo("estilo a aplicar($font_Size_value)");
    echo("<p style='font-size:$font_Size_value'>Hola Mundo</p>");
    
    echo("</br><h4>Ejericio 3</h4>");
    $num_random=rand(5,20);
    $num_random_fuente=rand(5,20);
    $px="px";
    $font_Size_value=$num_random_fuente.$px;
    echo("estilo a aplicar($font_Size_value)");
    echo("<p style='font-size:$font_Size_value'>$num_random</p>");

    echo("</br><h4>Ejericio 4</h4>");
    $par1=rand(1,255);
    $par2=rand(1,255);
    $par3=rand(1,255);
    echo("<div style='border: 1px solid white;
  height: 50px;
  width: 400px;
  display: grid;
  grid-template-columns:auto auto;'>
    <div style=' border: 1px solid white;
    background-color: rgb($par1,$par3,$par1)'></div>
    <div style='border: 1px solid white;
    background-color: rgb($par1,$par2,$par3)'></div>
  </div>")
    ?>

   

</body>
</html>
