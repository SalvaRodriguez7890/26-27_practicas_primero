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
        "TEXTO"=>"Ejercicio 4",
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
//Primero para probar la funcion solo le pasamos el primer valor, ya que los otros dos estan definidos por defecto
//23 y 10

echo "<strong>Vamos a probar la funcion devuelve(), al \$valor1 le voy a dar 20 </strong><br>".PHP_EOL;
echo "Dicho entonces la funcion deberia devolvernos en la variable \$valor1 el resultado de 53 y como return 20*23*10 = 4600 <br>".PHP_EOL;

$valor1=20;

$resultado = devuelve($valor1);

echo "<b>El return de la funcion a sido:</b> ".$resultado.PHP_EOL;
echo "<br>".PHP_EOL;
echo "<b>El valor ahora de  \$valor1 es:</b> ".$valor1.PHP_EOL;
echo "<br>".PHP_EOL;
echo "<br>".PHP_EOL;


//Tras probar los valores por defecto ahora le vamos a meter 3 valores
//para ello por ejemplo le voy a meter que $valor1 = 3, y los otros dos valores van a ser 7 y 5

echo "<strong>Ahora probaremos la funcion devuelve() otra vez, al \$valor1 le voy a dar 3 y los otros dos seran 7 y 5 </strong><br>".PHP_EOL;
echo "Dicho entonces la funcion deberia devolvernos en la variable \$valor1 el resultado de 15 y como return 3*7*5= 105 <br>".PHP_EOL;

$valor1=3;

$resultado = devuelve($valor1,7,5);

echo "<b>El return de la funcion a sido:</b> ".$resultado.PHP_EOL;
echo "<br>".PHP_EOL;
echo "<b>El valor ahora de  \$valor1 es:</b> ".$valor1.PHP_EOL;
echo "<br>".PHP_EOL;
echo "<br>".PHP_EOL;

}
