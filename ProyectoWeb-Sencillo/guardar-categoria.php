<?php
if(isset($_POST)){
    require_once 'php/conexion.php';

    $nombre= isset(($_POST['nombre'])) ? mysqli_real_escape_string($conexion,$_POST['nombre']) : false; //le quita la inyeccion sql y verifica si existe algo en el campo
    //Array de errores
    $errores = array();
    //Validar datos antes de de guardarlos en bd
    //Validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre)){
        $validar_nombre = true;
    } else{
        $validar_nombre = false;
        $errores['nombre'] = "Nombre NO Válido";
    }
    if(count($errores) == 0){ //Verificamos que no haya errores
        $sql = "INSERT INTO categorias VALUES(NULL, '$nombre');";
        $guardar = mysqli_query($conexion, $sql);
    }
}

header('Location: index.php');


?>