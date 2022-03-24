<?php require_once 'php/conexion.php';?>
<?php require_once 'php/helpers.php';?> <!--Va hasta arriba para heredar la hoja de helpers y pueda trabajar la 'función'-->
<?php 
    $categoria_actual=conseguirCategoria($conexion,$_GET['id']);
    if(!isset($categoria_actual['id'])){
        header("Location: index.php");
    }
?>
<?php require_once 'php/header.php';?>
<?php require_once 'php/lateral.php';?>  

<div id="principal">

    <h1>Entradas de <?=$categoria_actual['nombre']?></h1> 

    <?php
        $entradas = conseguirEntradas($conexion, NULL, $_GET['id']); //$conexion = conecta la base de datos --- NULL, se refiere al limite de categorias a mostrar NULL=SinLimite --- $_GET para obtener el id de la barra de navegación 
        if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
            while($entrada = mysqli_fetch_assoc($entradas)):
    ?>
                <article id="entrada">
                    <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h3><?= $entrada['titulo'] ?></h3> 
                        <span class="fecha"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
                        <p>
                            <?= substr($entrada['descripcion'], 0, 100) ?> ... <!--substr($entrada['titulo'], 0, 90) Limita el número de caractéres en este caso a 90-->
                        </p>
                    </a>
                </article>
    <?php
            endwhile;
        else:  
    ?>
    <div class="alerta">No hay entradas en esta categoría</div>
    <?php endif; ?>
</div>

<?php require_once 'php/pie.php'; ?>
