<?php require_once 'php/redireccion.php';?>
<?php require_once 'php/header.php';?>
<?php require_once 'php/lateral.php';?> 

<div id="principal">
    <h1>Crear entradas</h1>
    <p>
        Añade nuevas entradas al blog para que 
        los usuarios puedan leerlas y disfrutar de nuestro contenido.
    </p>
    <br/>
    <form action="guardar-entradas.php" method="POST">
        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo"/>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ; ?>

        <label for="titulo">Descripción: </label>
        <textarea name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ; ?>

        <label for="categoria">Categoría:</label>   
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : '' ; ?>
        <select name="categoria">
            <?php 
                $categorias = conseguirCategorias($conexion);
                if(!empty($categorias)) :
                    while($categoria = mysqli_fetch_assoc($categorias)) :
            ?>
                        <option value="<?=$categoria['id']?>"> <!--------------------------------Para hacer lista con sql-------------------------------->
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