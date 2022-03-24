<?php require_once 'php/redireccion.php';?>
<?php require_once 'php/header.php';?>
<?php require_once 'php/lateral.php';?> 

<div id="principal"> <!--Se roba el contenedor principal de crear entradas-->
    <h1>Mis Datos</h1>
    <?php if(isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado']; ?>
            </div>
    <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general']; ?>
            </div>
    <?php endif; ?>
    <form action="actualizar-usuario.php" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value="<?= $_SESSION['usuario']['nombre']; ?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ; ?>

        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" value="<?= $_SESSION['usuario']['apellidos']; ?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '' ; ?>

        <label for="email">Email: </label>
        <input type="email" name="email" value="<?= $_SESSION['usuario']['email']; ?>"/>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ; ?>

        <input type="submit" value="Actualizar"/>
    </form>
    <?php borrarErrores(); ?>
</div>
<?php require_once 'php/pie.php'; ?>