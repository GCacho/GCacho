<?php require_once 'conexion.php';?>
<?php require_once 'php/helpers.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>Proyecto Ejemplo</title>
</head>
<body>
    <header id="cabecera">
        <h1 id="logo"><a href="index.php">Blog Baloos</a></h1>
        <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php 
                    $categorias = conseguirCategorias($conexion); 
                    if(!empty($categorias)) :
                        while($categoria = mysqli_fetch_assoc($categorias)) : 
                ?>
                            <li>
                                <a href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a> <!--Insertar categorias por sql a los indices de navegación y manda el id por $_GET a la url-->
                            </li>
                <?php 
                        endwhile; 
                    endif;
                ?>
                <li>
                    <a href="index.php">Sobre mi</a>
                </li>
                <li>
                    <a href="index.php">Contacto</a>
                </li>
            </ul>
        </nav>
        <div class="clearfix"></div>
    </header>
    <main id="contenedor">