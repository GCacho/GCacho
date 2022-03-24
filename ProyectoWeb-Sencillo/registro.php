<?php
//var_dump($_POST); // Para ver registro
//die();
//----------------------INICIO Recoger valores de registro--------------------------
if(isset($_POST)){
    require_once 'php/conexion.php';
    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_POST['nombre'])){
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']); //mysqli_real_escape_string($basedatos, el post); es para evitar inyecciones en sql
    }else{
        $nombre = false;
    }
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion, $_POST['apellidos']) : false ; //Es lo mismo que el if de arriba -- mysqli_real_escape_string(); es para evitar inyecciones en sql
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, trim($_POST['email'])) : false ; //La funcion trim se utiliza para que se guarde sin espacios
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conexion, $_POST['password']) : false ;
    //var_dump($_POST);
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

    if(!empty($password)){
        $validar_password = true;
    } else{
        $validar_password = false;
        $errores['password'] = "Password NO Válida";
    }
//----------------------FIN Validar Datos--------------------------
    //var_dump($errores); //Para revisar validaciones
    //die();
//----------------------Insertar usuarios a BD o Retorno a index por validación-------------------
    $guardarusuario = false;
    if(count($errores) == 0){ //Verificamos que no haya errores
        $guardarusuario = true;
        //Cifrar password
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]); //-----------------------Cifra la contraseña 4 veces------------------------------------ 
        //var_dump($password);
        //var_dump($password_segura); //---Muestra los valores viejos y nuevos de la password
        //die();
        //var_dump(password_verify($password,$password_segura)); //compara las contraseñas cifrada con la normal si son la misma devuelve TRUE si son diferentes FALSE
        $sql = "INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($conexion, $sql);

        //var_dump(mysqli_error($conexion)); //para ver errores en la base de datos
        //die();

        if($guardar){
            $_SESSION['completado'] = "El registro se ha completado con éxito";
        }else{
            $_SESSION['errores']['general'] = "Fallo al guardar al usuario";
        }

    }else{
        $_SESSION['errores'] = $errores;
    }
}
header('Location: index.php');
?>