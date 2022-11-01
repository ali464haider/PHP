<?php
$directorio = "img";

$dirPtr=opendir($directorio);

// $directorioNuevo = "img3";

// mkdir(dirname($directorioNuevo),0777,true);
// copy(getcwd()."/img",getcwd()."/".$directorioNuevo);




while($archivo=readdir($dirPtr)){

    if(!is_dir($directorio."/".$archivo)){
        echo("Nombre: ".$archivo."<br>".filesize($directorio."/".$archivo)."<br>");
    }

}


closedir();




?>