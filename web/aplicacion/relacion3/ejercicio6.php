<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include_once("./funcionesRelacion3.php");


//controlador
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Index Funciones",
        "LINK" =>""
    ],
    [
        "TEXTO"=>"Ejercicio 6",
        "LINK" =>""
    ]
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Funciones", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************






//vista
function cabecera() {}

//vista
function cuerpo()
{
echo "<br>".PHP_EOL;
//Primero voy a pasandole las fuciones de suma-resta-multiplicacion
echo "<strong>Vamos a probar la funcion llamaAFuncion() con funciones anonimas metidas en variables de suma-resta-multiplicacion directamente</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;

//creo tres variables con sus funciones
$suma = function($a,$b){return$a+$b;};
$resta = function($a,$b){return$a-$b;};
$multi = function($a,$b){return$a*$b;};
$resultadoSuma = llamadaAFuncion(5, 5, $suma);
$resultadoResta = llamadaAFuncion(5, 5, $resta);
$resultadoMulti = llamadaAFuncion(5, 5, $multi);

echo "El resultado suma con callback: ".$resultadoSuma.PHP_EOL;
echo "<br>".PHP_EOL;
echo "El resultado resta con callback: ".$resultadoResta.PHP_EOL;
echo "<br>".PHP_EOL;
echo "El resultado multiplicacion con callback: ".$resultadoMulti.PHP_EOL;

echo "<br>".PHP_EOL;
echo "<br>".PHP_EOL;
//Segundo voy a pasandole las fuciones de directamente
echo "<strong>Vamos a probar la funcion llamaAFuncion() con funciones arrow metidas directamente</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;

//creo tres variables con sus funciones
$suma = function($a,$b){return$a+$b;};
$resta = function($a,$b){return$a-$b;};
$multi = function($a,$b){return$a*$b;};
$resultadoSuma = llamadaAFuncion(5, 5, fn ($a,$b) => $a+$b);
$resultadoResta = llamadaAFuncion(5, 5, fn ($a,$b) => $a-$b);
$resultadoMulti = llamadaAFuncion(5, 5, fn ($a,$b) => $a*$b);

echo "El resultado suma con arrow callback: ".$resultadoSuma.PHP_EOL;
echo "<br>".PHP_EOL;
echo "El resultado resta con arrow callback: ".$resultadoResta.PHP_EOL;
echo "<br>".PHP_EOL;
echo "El resultado multiplicacion con arrow callback: ".$resultadoMulti.PHP_EOL;


}
