<?php
    session_start();
    
    //Cerrar la sesión
    session_destroy();
    echo "Sesion Cerrada <br> <a href=\"sesion.php\">LogIn</a>";

?>