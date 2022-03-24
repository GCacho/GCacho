<?php //Esta página es para redireccionar al index a los usuarios que no estén loggeados 
if(!isset($_SESSION)){
    session_start();
}


if (!isset($_SESSION['usuario'])){
    header("Location: index.php");
}

?>