<?php require_once 'php/header.php';?>
<?php require_once 'php/lateral.php';?>  

<div id="principal">
    <h1>Todas las Entradas</h1>

    <?php
        $entradas = conseguirEntradas($conexion);
        if(!empty($entradas)):
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
        endif;  
    ?>
</div>

<?php require_once 'php/pie.php'; ?>