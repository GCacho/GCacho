<?php
//var_dump($_POST); // Para ver registro
//die();
//----------------------INICIO Recoger valores de registro--------------------------
if(isset($_POST)){
    require_once 'php/conexion.php';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : false ;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion, $_POST['apellidos']) : false ; //Es lo mismo que el if de arriba -- mysqli_real_escape_string(); es para evitar inyecciones en sql
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, trim($_POST['email'])) : false ; //La funcion trim se utiliza para que se guarde sin espacios
    //var_dump($_POST);
    //die();
//----------------------FIN Recoger valores de registro--------------------------
//----------------------INICIO Validar Datos--------------------------
    //Array de errores
    $errores = array();
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $validar_nombre = true;
    } else{
        $validar_nombre = false;
        $errores['nombre'] = "Nombre NO Válido";
    }

    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $validar_apellidos = true;
    } else{
        $validar_apellidos = false;
        $errores['apellidos'] = "Apellidos NO Válidos";
    }

    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){ //Valida los emails
        $validar_email = true;
    } else{
        $validar_email = false;
        $errores['email'] = "Email NO Válido";
    }
    //var_dump($errores); //Para revisar validaciones
    //die();
//----------------------FIN Validar Datos--------------------------
//----------------Comprobar si el email ya existe--------------------
    $guardarusuario = false;
    if(count($errores) == 0){
        $usuario = $_SESSION['usuario'];
        $guardarusuario = true;

        //Comprobar si el email ya existe
        $sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($conexion, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        //----------------------Actualizar usuario-------------------
        if($isset_user['id'] == $usuario['id'] || empty(isset($isset_user))){ //Se agrega para que no se puedan repetir los correos de los usuarios ya existentes 
            $sql = "UPDATE usuarios SET " . 
            "nombre = '$nombre', " . 
            "apellidos = '$apellidos', " . 
            "email = '$email' " . 
            "WHERE id = " . $usuario['id'];
            $guardar = mysqli_query($conexion, $sql);

            //var_dump(mysqli_error($conexion)); //para ver errores en la base de datos
            //die();

            if($guardar){
                $_SESSION['usuario']['nombre'] =  $nombre;
                $_SESSION['usuario']['apellidos'] =  $apellidos;
                $_SESSION['usuario']['email'] =  $email;

                $_SESSION['completado'] = "Sus datos se han actualizado con éxito";
            }else{
                $_SESSION['errores']['general'] = "Fallo al actualizar tus datos";
            }
        }else{//
            $_SESSION['errores']['general'] = "El usuario ya existe";
        }
    }else{
        $_SESSION['errores'] = "Valió madre compa";
    }
}else{
    $_SESSION['errores'] = "Valió doble madre compa";
}
header('Location: mis-datos.php');
?>