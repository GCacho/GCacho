<?php
//Fichero que se almacena en el ordenador del usuario que visita la web, con el fin de recordar datos o rastrear el comportamiento del mismo en la web
//Crear cookie
//setcookie("nombre", "valor que solo puede ser texto", "caducidad", "ruta", "dominio");
//Cookie Normal
setcookie("micookie", "valor de mi cookie");
//Cookie con expiracion
setcookie("oneyear","valor de mi cookie en 365 días", time()+(60*60*24*365));
echo "<a href=\"ver_cookies.php\">ver cookies</a>";
?>
