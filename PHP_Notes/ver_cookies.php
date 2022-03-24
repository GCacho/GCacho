<?php
if(isset($_COOKIE['micookie'])){
    echo "<h1>" . $_COOKIE['micookie'] . "</h1>";
}else{
    echo "No existe la cookie";
}
echo "<a href=\"index.php\">volver</a>";
?>