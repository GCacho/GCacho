<!doctype html>
<html lang="es">
    <head><!-- comment -->
        <meta charset="utf-8"/><!-- comment -->
        <title>Curso Master PHP</title>
    </head>
    <body>
        <?php
        //-------------Incremento y decremento------------
        $año=2019;
        $año=$año++; //--
        echo"<h1>$año</h1>";
        //-------------Incremento y decremento------------
        //------------------SuperGlobales-----------------
        echo $_SERVER['SERVER_ADDR'] . ":  Dirección IP del Servidor". "<BR>";
        echo $_SERVER['SERVER_NAME'] . ":  Nombre del Dominio" . "<BR>";
        echo $_SERVER['SERVER_SOFTWARE'] . ":  Software del Servidor" . "<BR>";
        echo $_SERVER['HTTP_USER_AGENT'] . ":  Navegador del servidor" . "<BR>";
        //------------------SuperGlobales-----------------
        ?>
        <!-----------------------Formulario----------------------------->
        <h1>Formulario Común</h1>
        <form method="POST" action="recibir.php"> <!--Importante agregar action-->
            <p>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre"/>
            </p>
            <p>
               <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos"/> 
            </p>
            Peliculas:
            <select name="peliculas">
                <option>Spiderman</option>
                <option>Batman</option>
                <option>IronMan</option>
                <option>Hulk</option>
            </select>
            <br><br>
            <input type="submit" value="Enviar Datos"/>
        </form>
        <!-----------------------Subir Imágenes con PHP----------------------------->
        <h1>Subir imágenes con PHP</h1>
        <form action="subirimg.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="archivo"/><br>
            <input type="submit" value="Enviar"/>
        </form>
        <h2><a href="mostrarimg.php">Mostrar imágenes subidas</a></h2>
        <!-----------------------Subir Imágenes con PHP----------------------------->
        
        <!-----------------------Calculadora----------------------------->
        <?php
        //Lógica
        $resultado = false; //Si existe un resultado continua en el siguiente php de lo contrario se cancela el proceso 2
        if(isset($_POST['n1']) && isset($_POST['n2'])){
            if(isset($_POST['sumar'])){
                $resultado = "El resultado es: ".($_POST['n1']+$_POST['n2']);
            }
            if(isset($_POST['restar'])){
                $resultado = "El resultado es: ".($_POST['n1']-$_POST['n2']);
            }
            if(isset($_POST['multiplicar'])){
                $resultado = "El resultado es: ".($_POST['n1']*$_POST['n2']);
            }
            if(isset($_POST['dividir'])){
                $resultado = "El resultado es: ".($_POST['n1']/$_POST['n2']);
            }
        }
        ?>
        <h1>Calculadora</h1>
        <form action="index.php" method="POST">
            <label for="n1">Numero 1:</label><br>
            <input type="number" name="n1" value="0"/><br><br>

            <label for="n2">Numero 2:</label><br>
            <input type="number" name="n2" value="0"/><br><br>

            <input type="submit" value="sumar" name="sumar"/>
            <input type="submit" value="restar" name="restar"/>
            <input type="submit" value="multiplicar" name="multiplicar"/>
            <input type="submit" value="dividir" name="dividir"/>
        </form>
        <?php
            //Resultado Calculadora Proceso 2
            if($resultado != false){
            echo "<h3>$resultado</h3>";
            }
        ?>
        <!-----------------------Calculadora----------------------------->
        <!-----------------------Bases de Datos----------------------------->
        <a href="conectarbd.php"><h1>Base de Datos (Checar código en la hoja BaseDatos.sql)</h1></a>
        <!-----------------------Bases de Datos----------------------------->
    </body>
</html>