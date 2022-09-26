<html>
    <body>
        <style>
            div{
            
            }
        </style>
       
    <?php
    print("<p>Actualiza la pagina para que dibuje entre 1 y 10 círculos negros (al
    azar) en una fila de tabla.</p><br>");

    $circulos=rand(1,10);
    
    print("<strong>$circulos Ciruclos</strong><br>");

    print("<table border=1><tr>");

    for($i=0;$i<$circulos;$i++){
        print("<td><div style='border:1px solid black;width:80px;height:80px;border-radius:50%;background-color:black;margin:10px;'></div></td>");
    }

    print("</tr></table>");

    
   

    ?>
    </body>
</html>