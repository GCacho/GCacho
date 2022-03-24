<?php
//Iniciar conexión
require_once 'php/conexion.php';
// recoger datos del formulario
if(isset($_POST)){
    //Borrar error de sesión anterior
    if(isset($_SESSION['error_login'])){ //Borra el error de login en caso de existir
        session_unset($_SESSION['error_login']);
    }
    //Recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    //Consulta para comprobar las claves del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($conexion, $sql);

    if($login && mysqli_num_rows($login) == 1){ //se hace todo este kgadero para poder obtener los datos de la BD y poder comparar las contraseñas cifradas
        $usuario = mysqli_fetch_assoc($login);
        //var_dump($usuario); //para ver lo que se absorve de la consulta de usuarios
        //die();
        $verify = password_verify($password, $usuario['password']); //Verifica la contraseña cifrada con la nueva ingresada
        //var_dump($verify); //ver si funciona el verify
        //die();
        if($verify==true){
            //Utiliza una sesión para guardar los datos del usuario logeado
            $_SESSION['usuario'] = $usuario;

        }else{
            //En caso de error enviar $_SESION con fallo
            $_SESSION['error_login'] = "Login incorrecto";
        }
    }else{
        //mensaje de error
        $_SESSION['error_login'] = "Login incorrecto";
    }
}

header('Location: index.php');

?>