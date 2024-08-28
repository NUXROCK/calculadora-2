<?php

//$nueva = mkdir("fotos/admin", 0777);

//$eliminar = rmdir("fotos/admin");


//$nombre = rename("fotos/a.txt","fotos/nuevo_archivo.txt");

//$eliminar_archivo = unlink("fotos/nuevo_archivo.txt");

foreach(glob("fotos/*.*") as $archivo){
    unlink($archivo);
}

?>