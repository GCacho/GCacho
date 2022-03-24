<?php
//------------------------------------------Recibir Formulario de INDEX-------------------------------------------
echo "<h1> El nombre es: " . $_POST['nombre'] ."<br> El apellido es: " . $_POST['apellidos'] ."</h1>";
//------------------------------------------Recibir Formulario de INDEX-------------------------------------------
//------------------------------------------Operadores de Comparación-------------------------------------------
// == Igual
// === Identico
// != Diferente
// <> Diferente (no tan buena)
// !== No identico
// < Menor que
// > Mayor que
// <= Menor Igual que
// >= Mayor Igual que
//------------------------------------------Operadores de Comparación-------------------------------------------
//------------------------------------------Operadores Lógico-------------------------------------------
// && AND Y
// || OR Ó 
// ! NOT False
//------------------------------------------Operadores Lógico-------------------------------------------
//------------------------------------------Condicionales Función IF-------------------------------------------
//If Normal
echo "<h3>Esto es Condicion IF</h3>";
$color="rojo";
if($color == "rojo"){
    echo 'El color es rojo';
}else{
    echo 'El color NO es rojo';
}
//If Normal
echo "<br>";
//If - ElseIf
$dia=5;
if($dia==1){
    echo "Lunes";
}elseif($dia==2){
    echo "Martes";
}elseif($dia==3){
    echo "Miercoles";
}elseif($dia==4){
    echo "Jueves";
}elseif($dia==5){
    echo "Viernes";
}
//If - ElseIf
echo "<br>";
//IF con varias condiciones
echo "<h3>Esto es Condicion IF-Else</h3>";
$EdadMin=18;
$EdadMax=64;
$EdadOficial=35;
if($EdadOficial >= $EdadMin && $EdadOficial <= $EdadMax){
    echo "Está en edad de trabajar";
}else{
    echo "NO está en edad de trabajar";
}
//IF con varias condiciones
echo "<br>";
//Switch
echo "<h3>Esto es el Switch</h3>";
$dia1=1;
switch ($dia1){
    case 1:
        echo 'Lunes';
        break;
    case 2:
        echo 'Martes';
        break;
    case 3:
        echo 'Miercoles';
        break;
    case 4:
        echo 'Jueves';
        break;
    case 5:
        echo 'Viernes';
        break;
    default :
        echo 'Es Fin de Semana';
}
//Switch
echo "<br>";
//------------------------------------------Bucles-------------------------------------------
//While (Mientras)
echo "<h3>Esto es el While</h3>";
$contador=0;
$constante=3;
$variable=0;
$res=0;
while($contador < 10){
    $variable++;
    echo "<p>$constante x $variable = ";
    $res=$constante*$variable;
    echo " $res</p>";
    $contador++;
}
//While (Mientras)
//Do While (Mientras) Hace lo mismo pero forzosamente ejecuta las instrucciones una vez
$contador1=20;
$constante1=3;
$variable1=0;
$res1=0;
do{
    $variable1++;
    echo "<h3>Esto es el do while</h3>";
    echo "<p>$constante1 x $variable1 = ";
    $res1=$constante1*$variable1;
    echo " $res1</p>";
    $contador1++;
} while($contador1 < 10);
//While (Mientras)
//Bucle FOR (Es el más popular de todos)
$resfor=0;
for ($x = 0; $x <= 10; $x++){
    $resfor= $resfor+$x; //$resfor += $x; (Es lo mismo pero más barato)
}
echo "<h3>Esto es el FOR</h3>";
echo "<p>$resfor </p>";
//While (Mientras)
//------------------------------------------Bucles-------------------------------------------
//------------------------------------------Matrices & Bucles-------------------------------------------
echo "<h1>Matriz con bucle FOR</h1>";
echo "<table border='1'> <tr>";//Inicio de Tabla
    echo "<tr>";//Inicio Fila 1 celda
        for($cabecera=1; $cabecera <= 10; $cabecera++){
            echo "<td> Tabla del $cabecera </td>";
        }
        echo "</tr>";//Cierre fila 1 celda
        echo "</tr>"; //Inicio Fila 2 de celdas
        for($i=1; $i<=10; $i++){
            echo "<td>";
                for($x=1; $x<=10; $x++){
                    echo "$i x $x= ". ($i*$x)."<br>";
                }
                echo "</td>";
        }
        echo "</td>";
echo "</table>"; //Fin de Tabla
//------------------------------------------Matrices & Bucles-------------------------------------------
//------------------------------------------Funciones-------------------------------------------
//Funcion normal
echo "<h1>Funciones:</h1>";
function tabla(){ //Crear Función
    echo "1 , 2 , 3 <br> 4, 5, 6 <br> 7, 8, 9 <br>";
}
tabla(); //Mandar a llamar la función
tabla(); //Se manda a llamar 2 veces
//Fin Función normal
//Función con parametro
echo "<h2>Función con parámetro</h2>";
function tabla1($number1, $text1){
    echo "<h3>Número que se ingresa: $number1 <br>
            Texto que se ingresa: $text1 <br></h3>"; 
}
tabla1(25,"hola");
tabla1(155, "Como estás?");
tabla1(888, "hola ya es viernes");
//Fin Funcion con parámetro
//------------------------------------------Funciones-------------------------------------------
//------------------------------------------Funcion dentro de función-------------------------------------------
function getNombre($nombre){
    $texto = "El nombre es: $nombre <br>";
    return $texto;
}
//------------------------------------------Funcion dentro de función-------------------------------------------
//------------------------------------------Return-------------------------------------------
function darnombre($nombre, $apellido){ //Mejores prácticas del uso de funciones - haces buena librería de funciones
    $texto = getNombre($nombre) ."Los apellidos son: $apellido"; //-------------------Obtiene en nombre de la función "getNombre"----------------------
    return $texto;
}
echo darnombre("Guillermo123", "Cacho");
//------------------------------------------Return-------------------------------------------
//------------------------------------------Variables globales (Fuera de función)-------------------------------------------
$frase="Hellows amigows";
function holafrase(){
    global $frase; //Hay que mandarla a llamar de las variables globales
    return "<h1>$frase</h1>";
}
echo holafrase(); //Manda a llamar la función
//------------------------------------------Variables globales (Fuera de función)-------------------------------------------
//------------------------------------------Funciones Predefinidas-------------------------------------------
echo "<h1>Funciones mas populares predefinidas:</h1>";
echo "<br>";
echo "Obtiene la fecha=  " . date('d-m-y'); //Fecha (dia-mes-año)
echo "<br>";
echo "Fecha en formato UNIX=  " . time(); // Fecha en formato unix
echo "<br>";
echo "Obtiene la raíz cuadrada=  " .sqrt(500); //Sacar Raíz cuadrada
echo "<br>";
echo "Obtiene un numero aleatorio entre X y Y=  " . rand(1,10); //Crear número aleatorio
echo "<br>";
echo "Obtiene el número pi=  " . pi(); //Obtiene el número pi
echo "<br>";
echo "Redonde un número=  " . round(9.96589); //Redondea un número
echo "<br>";
echo "Obtiene el tipo de dato de una variable=  " . gettype(60); //Obtiene tipo de dato
echo "<br>";
//--------------------------------------------Funciones para IF---------------------------------------------
$x="hola"; //Cambiar tipo de dato para ejemplo
if (is_string($x)){ //Si es string (Existen muchas más funciones como está para el if)
    echo "Esto si era string= " . $x;;
} else{
    echo "Esto no era string= " . $x;
}
echo "<br>";
if (isset($VarQueNOExiste)){ //isset identifica si esta variable Existe
    echo "Si existe la variable";
} else {
    echo "No existe la variable";
}
echo "<br>";
//--------------------------------------------Funciones para IF---------------------------------------------
$frase1="             hola aqui estoy     escribiendo con            muchas separaciones           "; //Funciona para limpiar Datos del usuario que van a base de datos
echo $frase1;
echo "<br>";
echo trim($frase1);
echo "<br>";
//--------------------- Borra variables
$BorrarVariable="Muchos datos que tengo que limpiar";
unset($BorrarVariable);
//echo $BorrarVariable; //Activar línea para probar
echo "<br>";
//------------- ignora las variables vacías 
$txt=NULL; //Deja la variable vacía
if (empty($txt)){
    echo "La variable txt está vacía";
} else{
    echo "Todo bien, podemos continuar"; 
}
echo "<br>";
//------------- Descompone cadena y numera
$cadena="543210"; //Descompone los datos y los cuenta
echo strlen($cadena);
echo "<br>";
//------------- Encuentra contenido
$frase2="La vida es Cool";
echo strpos($frase2,"es"); //Encuentra en que posición está almacenada la palabra (Cool)
echo "<br>";
//--------------Remplaza palabras
$frase2=str_replace("Cool","Genial",$frase2);
echo $frase2;
echo "<br>";
//--------------Lo hace minúsculas
echo strtolower($frase2);
echo "<br>";
//--------------Lo hace mayusculas
echo strtoupper($frase2);
echo "<br>";
//------------------------------------------Funciones Predefinidas-------------------------------------------
//------------------------------------------Arreglos "Array"-------------------------------------------------------
//------------------------Funciones populares en arrays--------------------------------
echo "<h1>Funciones populares en arrays</h1>";
$coches=['Audi','Ford','Mazda','Nissan','Kia'];
$numeros=['6','5','1','3','2','4'];
echo $coches[3];
echo "<h3>Ordenar alfabéticamente y de menor a mayor</h3>";
sort($coches); //acomodar alfab - menor a mayor
var_dump($coches);
sort($numeros);
var_dump($numeros);
echo "<h3>Añadir elementos</h3>";
$coches[]="Otro Coche"; //Añade otro coche al array
array_push($coches, "otro coche 2.0");
var_dump($coches);
echo "<h3>Quitar elementos</h3>";
array_pop($coches); //Quita el último dato dentro del array
unset($coches[0]); //Borrara el primer dato [0] del arreglo
var_dump($coches);
echo "<h3>Buscar dentro de un Array</h3>";
$resultado= array_search('Mazda',$coches);
var_dump($resultado); //Mostrará en que indice se encuentra Mazda
echo "<h3>Contar los datos dentro de un array</h3>";
echo count($coches);
//------------------------Funciones populares en arrays--------------------------------
//Se utilizan mucho para extraer e ingresar datos en las bases de datos
echo "<h2>Arrays o Arreglos</h2>";
$peliculas = ['Batman','Spiderman','Superman'];
echo $peliculas[0]; //Cero es Batman, 1 Spiderman, 2 Superman. (Inicia el conteo en 0)
echo "<br>";
//---------Matrices 1D------------
echo "<h2>Mostraremos una matriz de datos</h2>";
for ($i=0; $i < count($peliculas); $i++){ //muestra todos los datos del arreglo de una dimensión
    echo ($i+1). "= " . $peliculas[$i] . "<br>";
}
echo "<h2>ForEach para Arreglos</h2>";
foreach ($peliculas as $peliculas){ //Lo mismo de arriba pero más barato
    echo $peliculas . "<br>";
}
//Arreglo Asosiativo 
echo "<h2>Arreglos asosiativos</h2>";
$usuario = array(
    'nombre' => 'Paola',
    'apellido' => 'Perez',
    'nacionalidad' => 'Mexicana'
);
echo $usuario['nombre']; //Manda a llamar la asosiación a nombre
//---------Matrices 1D------------ 
echo "<br>";
//---------Matrices 2D------------ 
echo "<h2>Arreglos asosiativos Bidimensional</h2>";
$contactos = array(
    array(
        'nombre' => 'Guillermo',
        'email' => 'gcacho@gmail.com'
    ),
    array(
        'nombre' => 'Luis',
        'email' => 'Luis@gmail.com'
    ),
    array(
        'nombre' => 'Pepe',
        'email' => 'pepe@gmail.com'
    ),
);
echo $contactos[1]['nombre']; //Manda a llamar del segundo array "[1]" y extrae el 'nombre' 
//-----------
echo "<h2>Crear Array Normal</h2>";
$recopilacion=array();
for($i=0;$i<25;$i++){
    array_push($recopilacion, ($i+1) . ", ");
    echo $recopilacion[$i];
}
echo "<h2>Crear Array 2D</h2>";
$rec1= array(
    array('1','2','3','4','5'),
    array('A','B','C','D','E')
);
echo "Va a mostrar 1 que esta en la posicion 0,0= " . $rec1[0][0]; //Va a mostrar 1 que esta en la posicion 0,0
echo "<br>";
for($i=0;$i<=4;$i++){
    for($x=0;$x<=1;$x++){
        echo $rec1[$x][$i] . "<br>"; //Va a mostrar toda la matriz
    }
}
//---------Matrices 2D------------ 
//------------------------------------------Arreglos "Array"-------------------------------------------------------
//------------------------------------------Ejercicio-------------------------------------------------------
echo "<h1>Inicia HTML</h1>";
$tabla = array(
    "SHOOTER" => array('GTAV','Fortnite','CoD','PUBG'),
    "AVENTURA" => array('Zelda','Mario','Minecraft','Sonic'),
    "SPORT" => array('FIFA','MADDEN','NBA','FORZA')
);
$categorias = array_keys($tabla);
var_dump($categorias);
echo "<a href=\"sesion.php\">Ir a sesión</a>";
//------------------------------------------Ejercicio-------------------------------------------------------
?>

