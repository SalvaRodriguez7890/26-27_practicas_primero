<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador



$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "ENLACE" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 5",
        "ENLACE" =>"/aplicacion/relacion5/ejercicios.php"
    ],
    [
        "TEXTO"=>"Ejercicios Relacion 5",
        "ENLACE" =>"/aplicacion/relacion5/ejercicios.php"
    ]
];



$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 5", $barraUbi);
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

//INCLUYO LAS LIBRERIAS
include "val_filter.php";
include "val_normal.php";

echo "<h2>FUNCION validaEntero()</h2>".PHP_EOL;
//Primero el val_noraml
echo "<h3>--- Librería VALNORMAL ---</h3>".PHP_EOL;

// le voy a pasar primero un un rango entre 10 y 36 y el numero a comprobar va aser el 13
//debe devolver true, y por defecto por ejemplo 21
$num1 = 13;

$resultado1 = VALNORMAL\validaEntero($num1, 10, 36, 21);
echo "Se comprueba la variable \$num1 con valor 13 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $num1<br>".PHP_EOL;

//Ahor voy a pasar el mismo rango y el numero a comprobar va aser el 37
//debe devolver false, y por defecto por ejemplo 21, pues la variable debe pasar de 37 a 21
$num1 = 37;

$resultado1 = VALNORMAL\validaEntero($num1, 10, 36, 21);
echo "Se comprueba la variable \$num1 con valor 37 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $num1<br>".PHP_EOL;

//ahora con val_filter
echo "<h3>--- Librería VALFILTER ---</h3>".PHP_EOL;

// le voy a pasar primero un un rango entre 10 y 36 y el numero a comprobar va aser el 13
//debe devolver true, y por defecto por ejemplo 21
$num1 = 13;

$resultado1 = VALFILTER\validaEntero($num1, 10, 36, 21);
echo "Se comprueba la variable \$num1 con valor 13 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $num1<br>".PHP_EOL;

//Ahor voy a pasar el mismo rango y el numero a comprobar va aser el 37
//debe devolver false, y por defecto por ejemplo 21, pues la variable debe pasar de 37 a 21
$num1 = 37;

$resultado1 = VALFILTER\validaEntero($num1, 10, 36, 21);
echo "Se comprueba la variable \$num1 con valor 37 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $num1<br>".PHP_EOL;

//
//
//

echo "<h2>FUNCION validaReal()</h2>".PHP_EOL;
//Primero el val_noraml
echo "<h3>--- Librería VALNORMAL ---</h3>".PHP_EOL;

// le voy a pasar primero un un rango entre 10.16 y 36.04 y el numero a comprobar va aser el 31.03
//debe devolver true, y por defecto por ejemplo 25.37
$num1 = 31.03;

$resultado1 = VALNORMAL\validaReal($num1, 10.16, 36.04, 25.37);
echo "Se comprueba la variable \$num1 con valor 31.03 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $num1<br>".PHP_EOL;

//Ahor voy a pasar el mismo rango y el numero a comprobar va aser el 37.41
//debe devolver false, y por defecto por ejemplo 21, pues la variable debe pasar de 37 a 21
$num1 = 37.41;

$resultado1 = VALNORMAL\validaReal($num1, 10.16, 36.04, 25.37);
echo "Se comprueba la variable \$num1 con valor 37.41 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $num1<br>".PHP_EOL;

//ahora con val_filter
echo "<h3>--- Librería VALFILTER ---</h3>".PHP_EOL;

// le voy a pasar primero un un rango entre 10.16 y 36.04 y el numero a comprobar va aser el 31.03
//debe devolver true, y por defecto por ejemplo 25.37
$num1 = 31.03;

$resultado1 = VALFILTER\validaReal($num1, 10.16, 36.04, 25.37);
echo "Se comprueba la variable \$num1 con valor 31.03 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $num1<br>".PHP_EOL;

//Ahor voy a pasar el mismo rango y el numero a comprobar va aser el 37.41
//debe devolver false, y por defecto por ejemplo 21, pues la variable debe pasar de 37 a 21
$num1 = 37.41;

$resultado1 = VALFILTER\validaReal($num1, 10.16, 36.04, 25.37);
echo "Se comprueba la variable \$num1 con valor 37.41 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $num1<br>".PHP_EOL;







}

