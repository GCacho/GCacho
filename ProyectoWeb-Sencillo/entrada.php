<?php require_once 'php/conexion.php';?>
<?php require_once 'php/helpers.php';?> <!--Va hasta arriba para heredar la hoja de helpers y pueda trabajar la 'función'-->
<?php 
    $entrada_actual=conseguirEntrada($conexion,$_GET['id']);
    if(!isset($entrada_actual['id'])){
        header("Location: index.php");
    }
?>
<?php require_once 'php/header.php';?>
<?php require_once 'php/lateral.php';?>  

<div id="principal">

    <h1>Entrada de <?=$entrada_actual['titulo']?></h1> 
    <a href="categoria.php?id=<?=$entrada_actual['categorias_id']?>">
        <h3><?=$entrada_actual['categoria']?></h3>
    </a>
    <h4 class="fecha"><?=$entrada_actual['fecha']?> | <?=$entrada_actual['usuario']?></h4>
    <p><?=$entrada_actual['descripcion']?></p>

    <!--Para la edicion de las entradas-->

    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) : ?>
        <br/>
        <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-naranja">Editar Entrada</a>
        <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class="boton boton-rojo">Eliminar Entrada</a>
    <?php endif; ?>
</div>

<?php require_once 'php/pie.php'; ?>