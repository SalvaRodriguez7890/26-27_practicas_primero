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
    <p> <strong>-La funcion round() sirve para redondear un numero decimal por ejemplo:</strong></p>
    
    <?php
    $var1= round(3.6);
    echo "<p> Si redondeamos 3.6 nos debe dar 4, por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    $var1= round(3.4);
    echo "<p> Si redondeamos 3.4 nos debe dar 3, ya que siendo menor que 0.5 redondea abajo por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    
    ?>
    <p> <strong>-La funcion floor() sirve para redondear un numero decima SIEMPRE hacia abajo </strong></p>
    <p> Sin importar si supera el 0.5 o no por ejemplo: </p>
    <?php
    $var1= floor(3.6);
    echo "<p> Si aplicamos floor a 3.6 nos debe dar 3, por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    $var1= floor(3.4);
    echo "<p> Si aplicamos floor a 3.4 nos debe dar 3, ya que siempre redondea hacia abajo por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    
    ?>
    <p> <strong>-La funcion sqrt() sirve para sacar la raiz cuadrada de un numero </strong></p>
    <p> Por ejemplo la raiz de 25 </p>
    <?php
    $var1= sqrt(25);
    echo "<p> Si aplicamos sqrt a 25 nos debe dar 5, por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    $var1= sqrt(20);
    echo "<p> Si aplicamos sqrt a 20 nos debe dar decimales, por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    
    ?>
    <p> <strong>-La funcion pow() sirve para elevar un numero a la potencia de otro numero que le pasemos </strong></p>
    <p> Por ejemplo:: </p>
    <?php
    $var1= pow(5,3);
    echo "<p> Si aplicamos pow a 5 con potencia de 3, si mostramos la variable \$var1 obtendremos: $var1</p>";
    $var1= pow(5,2);
    echo "<p> Si aplicamos pow a 5 con potenica de 2, nos debe dar 25 por lo tanto si mostramos la variable \$var1 obtendremos: $var1</p>";
    
    ?>
    <p> <strong>-De entero a hexadecimal, para ello se usa la funcion dechex()</strong></p>
    <p> Por ejemplo: </p>
    <?php
    $var1= 14;
    $var2= dechex($var1);
    echo "<p> Si al numero 14 dentro de \$var1 lo pasamos a hexadecimal usando \$var2, si mostramos la variable \$var2 obtendremos: $var2</p>";
    echo "<p> La letra 'e' en hexadecimal corresponde al 14</p>";
    
    $var1= 301;
    $var2= dechex($var1);
    echo "<p> Ahora \$var1 es 301 lo pasamos a hexadecimal usando \$var2, si mostramos la variable \$var2 obtendremos: $var2</p>";
    
    ?>
    <p> <strong>-De base 4 a base 8, para ello se usa base_convert(), dentro del parentesis debemos indicar primero el numero o variable, luego la base en al que está y por ultimo a cual base la pasamos</strong></p>
    <p> Por ejemplo: </p>
    <?php
    $var1= 1312;
    $var2= base_convert($var1,4,8);
    echo "<p> Si al numero 14 dentro de \$var1 lo pasamos de base 4 a base 8 en \$var2, si mostramos la variable \$var2 obtendremos: $var2</p>";
    
     
}