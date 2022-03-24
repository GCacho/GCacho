<?php
if(isset($_POST)){
    require_once 'php/conexion.php';
    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($conexion, $_POST['titulo']) : false; //Real_escape en para evitar la inyeccion en la base de datos
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion,$_POST['descripcion']) : false;;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false; //lo convertimos a entero ya que es el numero de id_categoria
    $usuario = $_SESSION['usuario']['id']; //Para obtener la llave foranea del usuario elegido (usuario_id) --- $categoría ya estaba capturado para el <select> caja de selección.
    //var_dump($usuario); //Para ver errores
    //die();

    //validacion
    $errores = array();
    if(empty($titulo)){
        $errores['titulo'] = "El título no es válido";
        //var_dump($errores); //Para ver errores
        //die();
    }
    if(empty($descripcion)){
        $errores['descripcion'] = "La descripción no es válida";
    }
    if(empty($categoria) && !is_numeric($categoria)){
        $errores['categoria'] = "La categoria no es válida";
    }
    //var_dump($titulo); //Para leer errores que se pudieran presentar en las validaciones
    //die();

    if(count($errores) == 0){
        if(isset($_GET['editar'])){
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql =  "UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', categorias_id=$categoria " .
                    " WHERE id= $entrada_id AND usuario_id = $usuario_id;";
        }else{
            $sql = "INSERT INTO entradas VALUES(NULL, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        }
        $guardar = mysqli_query($conexion, $sql);
        //var_dump(mysql_error()); //Para leer errores al insertar los datos (podemos ir subiendolo de if )
        //die();
        header("Location: index.php");
    }else{
        $_SESSION['errores_entrada'] = $errores;
        if(isset($_GET['editar'])){
            header("Location: editar-entrada.php?id=".$_GET['editar']);
        }else{
            header("Location: crear-entradas.php");
        }
    }
}


?>