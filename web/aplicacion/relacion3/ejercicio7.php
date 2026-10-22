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
        "TEXTO"=>"Ejercicio 7",
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
//Primero voy a probar que pasa si no le paso cadena
echo "<strong>Vamos a probar la funcion hacerOperacion() la cual usa la variable-funcion dentro de la funcion hacerOperacion</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;

//Para ello llamo a la funcion hacerOperacion 3 veces con 3 fvariables y le paso las variables
$resultadoSuma = hacerOperacion("suma", 10, 1);
$resultadoResta = hacerOperacion("resta", 10, 1);
$resultadoMulti = hacerOperacion("multiplicacion", 10, 10);

echo "El resultado suma: ".$resultadoSuma.PHP_EOL;
echo "<br>".PHP_EOL;
echo "El resultado resta: ".$resultadoResta.PHP_EOL;
echo "<br>".PHP_EOL;
echo "El resultado multiplicacion: ".$resultadoMulti.PHP_EOL;

//Ademas ahora vamos a probar a usar la varibles-funcion directamente con las fuinciones de suma, resta y multiplicacion

$suma = "suma";
$resta = "resta";
$multi = "multiplicacion";

$vfSuma = $suma(2,2);
$vfReta = $resta(5,2);
$vfMulti = $multi(3,7);

echo "<br>".PHP_EOL;
echo "<br>".PHP_EOL;
echo "<strong>Ahora vamos a probar directamente las variables-funcion con tres variables con las funciones simples de suma-resta-multiplicacion:</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;

echo "El resultado de \$vfSuma = \$suma(2,2): ".$vfSuma.PHP_EOL;
echo "<br>".PHP_EOL;
echo "El resultado de \$vfResta = \$resta(5,2): ".$vfReta.PHP_EOL;
echo "<br>".PHP_EOL;
echo "El resultado de \$vfMulti = \$multi(3,7): ".$vfMulti.PHP_EOL;


}
