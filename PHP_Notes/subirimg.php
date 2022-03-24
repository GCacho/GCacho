<?php
$archivo=$_FILES['archivo'];
$nombre=$archivo['name']; //Captura el nombre del archivo
$tipo=$archivo['type']; //Captura el tipo de archivo
$server=$_SERVER['SERVER_NAME'];
//var_dump($tipo); Muestra de tipo de dato
var_dump($server);
if($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png" || $tipo == "image/git"){
    if(!is_dir('img')){ //Crea la carpeta si esta no existe 'img'
        mkdir('img',0777); //0777 se refiere a todos los permisos para subir archivos en PHP (rmdir('lacarpeta') se utiliza para borrar la capreta)
    }
    move_uploaded_file($archivo['tmp_name'], 'img/'.$nombre); //Inserta el archivo en la carpeta de img que recien creamos
    header("Refresh:10; URL=index.php"); //El tiempo que va a tomar regresar al index
    echo "<h2>Imágen subida correctamente</h2>";
    }else{
        header("Refresh:5; URL=index.php");
        echo "<h2>Sube la imágen en formato correcto (jpg, jpeg, png, git)</h2>";
        }
//Borrar


?>