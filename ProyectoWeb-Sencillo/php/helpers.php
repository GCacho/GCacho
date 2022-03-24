<?php
function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class=\"alerta alerta-error\">" . $errores[$campo] . "</div>";
    }
    return $alerta;
}

function borrarErrores(){
    $res = false;
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = NULL;
        $res = $_SESSION['errores'];
    }
    if(isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = NULL;
        $res = $_SESSION['errores_entrada'];
    }
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = NULL;
        $res = $_SESSION['completado'];
    }
    
    return $res;
}

function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);  //-------------------No recibe nada-
    
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }

    return $resultado;
}
function conseguirCategoria($conexion, $id){ //Solo consigue una categoría
    $sql = "SELECT * FROM categorias WHERE id = $id;"; //aqui hay cambio respecto arriba
    $categorias = mysqli_query($conexion, $sql);  
    
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = mysqli_fetch_assoc($categorias); //Aquí también
    }

    return $resultado;
}

function conseguirEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario ". 
            "FROM entradas e ". //Ojo con el último espacio
            "INNER JOIN categorias c ON e.categorias_id = c.id ". 
            "INNER JOIN usuarios u ON e.usuario_id = u.id ". 
            "WHERE e.id= $id";
    $entrada = mysqli_query($conexion,$sql);

    $resultado = array();
    if($entrada && mysqli_num_rows($entrada) >=1){
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
}

function conseguirEntradas($conexion, $limit = null, $categoria=NULL, $busqueda = NULL){
    $sql = " SELECT e.*, c.nombre AS 'categoria' FROM entradas e INNER JOIN categorias c ON e.categorias_id = c.id ";

    if(!empty($categoria)){
        $sql .= " WHERE e.categorias_id = $categoria "; //Ojo con el espacio
    }

    if(!empty($busqueda)){
        $sql .= " WHERE e.titulo LIKE '%$busqueda%'"; //Ojo con el espacio
    }

    $sql .=" ORDER BY e.id DESC ";

    if($limit){
        //$sql = $sql. " Limit 4";
        $sql .=" LIMIT 4 "; //Ojo en el espacio en blanco que si no se concatena y revienta
    }
    //echo $sql; //Para ver la consulta que se está llevando a cabo
    //die();
    $entradas = mysqli_query($conexion, $sql);
    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }
        return $resultado;
}
?>

