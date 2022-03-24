<?php
$gestor = opendir('./img');
if($gestor){
    while(($image = readdir($gestor))!== false){
        if($image != '.' && $image != '..'){
            echo "<img src='img/$image' width='200px'><br>";
        }
    }
}
?>