<?php
$server = "localhost:3307";
$user = "root";
$password = "";
$db = "dbproyecto";
$conexion = mysqli_connect($server,$user,$password,$db);

mysqli_query($conexion, "SELECT * FROM usuarios");
//Iniciar Sesión
if(!isset($_SESSION)){
    session_start();
}
?>