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


    




}