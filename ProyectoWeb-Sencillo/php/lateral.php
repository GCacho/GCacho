<!--Barra Lateral-->
<aside id="sidebar">

    <!--------------------Barra de busqueda--------------------------->

    <div id="buscador" class="bloque">
        <h3>Buscar</h3>
        <form action="buscar.php" method="POST">
            <input type="text" name="busqueda"/>

            <input type="submit" value="Buscar"/>
        </form>
    </div>

    <!--------------------Barra de busqueda--------------------------->

    <?php if(isset($_SESSION['usuario'])) :  ?> <!---------------------Muestra el nombre y apellido del usuario que inicio sesión-------------------------->
    <div id="usuario-logueado" class="bloque">
        <h3>Bienvenido: <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></h3>
        <!--Botones-->
        <a href="crear-entradas.php" class="boton boton-naranja">Crear entradas</a>
        <a href="mis-datos.php" class="boton boton-verde">Editar datos</a>
        <a href="crear-categoria.php" class="boton">Crear categoría</a>
        <a href="cerrarsesion.php" class="boton boton-rojo">Cerrar Sesion</a>
    </div>
    <?php endif; ?>

    <?php if(!isset($_SESSION['usuario'])) :  ?>  <!---------------------Cierra casi hasta abajo, es para ocultar los paneles de registro e ingreso cuando la sesion está iniciada-------------------------->
        <div id="login" class="bloque">
            <h3>Identificate</h3>

            <?php if(isset($_SESSION['error_login'])) :  ?> <!--------------------Muestra el error al iniciar la sesión--------------------------->
                <div class="alerta alerta-error">
                    <?= $_SESSION['error_login']; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <label id="email">Email: </label>
                <input type="email" name="email"/>

                <label id="password">Password: </label>
                <input type="password" name="password"/>

                <input type="submit" value="Entrar"/>
            </form>
        </div>

        <div id="register" class="bloque">
            <h3>Registrate</h3>
            <!-----------------Mostrar Errores------------------>
            <?php if(isset($_SESSION['completado'])) : ?>
                    <div class="alerta alerta-exito">
                        <?= $_SESSION['completado']; ?>
                    </div>
            <?php elseif(isset($_SESSION['errores']['general'])): ?>
                    <div class="alerta alerta-error">
                        <?= $_SESSION['errores']['general']; ?>
                    </div>
            <?php endif; ?>
            <form action="registro.php" method="POST">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre"/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ; ?>

                <label for="apellidos">Apellidos: </label>
                <input type="text" name="apellidos"/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '' ; ?>

                <label for="email">Email: </label>
                <input type="email" name="email"/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ; ?>

                <label for="password">Password: </label>
                <input type="password" name="password"/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : '' ; ?>

                <input type="submit" value="Registrar"/>
            </form>
            <?php borrarErrores(); ?>
        </div>
    <?php endif; ?>
</aside>