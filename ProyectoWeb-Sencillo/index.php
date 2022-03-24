<?php require_once 'php/header.php';?>
<?php require_once 'php/lateral.php';?>  

<div id="principal">
    <h1>Últimas Entradas</h1>

    <?php
        $entradas = conseguirEntradas($conexion, true); //Para obtener todas las entradas
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
    <div id="ver-todas">
        <a href="entradas.php">Ver todas las entradas </a>
    </div>
</div>

<?php require_once 'php/pie.php'; ?>