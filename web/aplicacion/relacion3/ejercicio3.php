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
        "TEXTO"=>"Ejercicio 3",
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
//Vamos a probar a elegir la suma y como valores le voy a psar 1 / 1-1-1-1 nos deberia dar 4
echo "<strong>Vamos a probar a elegir la suma y como valores le voy a psar 1 / 1-1-1-1 nos deberia dar 4</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;
$resultado = operaciones(1,1,1,1,1);

echo "El resultado de la funcion a sido: ".$resultado.PHP_EOL;
echo "<br>".PHP_EOL;
echo "<br>".PHP_EOL;

//Vamos a probar a elegir la resta y como valores le voy a psar 1 / 7-1-3-7 nos deberia dar -4
echo "<strong>Vamos a probar a elegir la multiplicacion y como valores le voy a pasarle 2 / 20-1-31-80 nos deberia dar -92</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;
$resultado = operaciones(2,20,1,31,80);

echo "El resultado de la funcion a sido: ".$resultado.PHP_EOL;
echo "<br>".PHP_EOL;
echo "<br>".PHP_EOL;

//Vamos a probar a elegir la 3 la que se multiplican todos los valores
echo "<strong>Vamos a probar a elegir la multiplicacion y como valores le voy a pasarle 3 / 5-7-2-8 nos deberia dar 560</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;
$resultado = operaciones(3,5,7,2,8);

echo "El resultado de la funcion a sido: ".$resultado.PHP_EOL;
echo "<br>".PHP_EOL;
echo "<br>".PHP_EOL;

//Vamos a probar la opcion que no es ni 1 2 y 3. Donde se suman los valores de las posiciones parse y se les restan las posiciones impares
//para ello he sumado las posiciones pares entre si y las posiciones en pares entres i también, al resultado de ambas las he restado

echo "<strong>Vamos a probar la otra opcion como valores le voy a pasar 51 / 5-7-2-8-3-5-8 nos deberia dar -2</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;
$resultado = operaciones(51,5,7,2,8,3,5,8);

echo "El resultado de la funcion a sido: ".$resultado.PHP_EOL;


}
