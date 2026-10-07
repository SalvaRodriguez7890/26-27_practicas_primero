<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 1", []);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo()
{
 ?>
    <!--1.- Mostrar el funcionamiento de diversas funciones Matemáticas 
    (round, floor, pow, sqrt, entero a hexadecimal, de base 4 a base 8 y al 
    menos dos funciones mas distintas de las anteriores) (buscar la información 
    sobre las funciones matemáticas en http://php.net/manual/es/book.math.php). 
    Definir variables inicializadas con valores en binario, octal y hexadecimal. 
    Mostrar el valor de esas variables tanto en decimal como en la base en la que se 
    han definido.
    Hacer este ejercicio directamente en la vista (definiciones de las variables y 
    visualización de las mismas)-->
    <br>
    <H1>Ejer1.Ejemplo de Funciones matemáticas</H1>
    <p>-La funcion round() sirve para redondear un numero decimal por ejemplo:</p>
    
    <?php
    $var1= round(3.6);
    echo "<p> Si redondeamos 3.6 nos debe dar 4, por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    $var1= round(3.4);
    echo "<p> Si redondeamos 3.4 nos debe dar 3, ya que siendo menor que 0.5 redondea abajo por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    
    ?>
    <p> -La funcion floor() sirve para redondear un numero decima SIEMPRE hacia abajo</p>
    <p> Sin importar si supera el 0.5 o no por ejemplo: </p>
    <?php
    $var1= floor(3.6);
    echo "<p> Si aplicamos floor a 3.6 nos debe dar 3, por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    $var1= floor(3.4);
    echo "<p> Si aplicamos floor a 3.4 nos debe dar 3, ya que siempre redondea hacia abajo por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    
}
