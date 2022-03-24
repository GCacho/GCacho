<?php require_once 'php/redireccion.php';?>
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
    <h1>Editar entrada</h1>
    <p>
        Edita tu entrada <?=$entrada_actual['titulo'];?>
    </p>
    <br/>
    <form action="guardar-entradas.php?editar=<?=$entrada_actual['id']?>" method="POST"> <!--Para reciclar la página y mandar a editar-->
        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>"/>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ; ?>

        <label for="titulo">Descripción: </label>
        <textarea name="descripcion"><?=$entrada_actual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ; ?>

        <label for="categoria">Categoría:</label>   
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : '' ; ?>
        <select name="categoria">
            <?php 
                $categorias = conseguirCategorias($conexion);
                if(!empty($categorias)) :
                    while($categoria = mysqli_fetch_assoc($categorias)) :
            ?>
                        <option value="<?=$categoria['id']?>" <?=($categoria['id'] == $entrada_actual['categorias_id']) ? 'selected="selected"' : ''?> > <!--------------------------------Para hacer lista con sql **Aqui hay cambio**-------------------------------->
                            <?= $categoria['nombre']?>
                        </option>
            <?php
                    endwhile;
                endif;
            ?>
        </select>
        <input type="submit" value="Guardar"/>
    </form>
    <?php borrarErrores(); ?>
</div>
<?php require_once 'php/pie.php'; ?>