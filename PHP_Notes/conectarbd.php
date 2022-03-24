<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectar la base de datos</title> <!--Importar PrimerBD de la hoja BaseDatos.sql a php (base de datos de escuela)-->
    <?php 
        $conexion = mysqli_connect("localhost","root","","primerdb"); /*Orden a poner los datos= ($DondeSeEncuentraLaBaseDeDatos,$Usuario_GeneralmenteAdminoRoot,$Contraseña_NoTenemos,$NombreBaseDeDatos)*/
        if(mysqli_connect_error()){
            echo "La conexión a la base de datos a fallado: ".mysqli_connect_error();
        }else{
            echo "Conexión exitosa";
        }
        mysqli_query($conexion,"SET NAMES 'utf8'");/*Agrega tildes y caracteristicas de la escritura en español*/
        /*----------------Hacer una consulta con php a mysql------------------------*/
        $primerconsulta = mysqli_query($conexion,"SELECT * FROM usuarios");
        while($notas = mysqli_fetch_assoc($primerconsulta)){ //-- mysqli_fetch_assoc($primerconsulta) --> Recorre todas las filas de la tabla
            var_dump($notas); //Checa cuantas filas datos hay en la consulta
        }
        /*----------------Insertar datos en la base de datos------------------------*/
        $sql = "INSERT INTO usuarios VALUES (NULL, 'Persona', 'Insertada con php', 'otrocorreo@gmail.com', 'password', CURDATE());";
        $insert = mysqli_query($conexion,$sql);
        if($insert){
            echo "Dato Ingresado correctamente";
        } else {
            echo "Error:". mysqli_error($conexion);
        }
    ?> 
</head>
<body>
    
</body>
</html>