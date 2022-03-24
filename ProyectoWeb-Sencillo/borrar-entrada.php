<?php
require_once 'php/conexion.php';

if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    $entrada_id = $_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];
    $sql = "DELETE FROM entradas WHERE usuario_id = $usuario_id AND id = $entrada_id";
    $borrar = mysqli_query($conexion,$sql);
    //echo mysqli_error($conexion); //Checar errores en la consulta
    //die();
}

header("Location: index.php")
?>