<?php
    session_start(); //Inicia la sesión de usuario
    $_SESSION['Variable_Presistente'] = "SESION ACTIVA";
    echo $_SESSION['Variable_Presistente'] . "<br>";
    echo "<a href=\"logout.php\">LogOut</a> <br>";
    echo "<a href=\"cookies.php\">Cookies</a> <br>";
    echo "<a href=\"index.php\">Volver</a>";
?>