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
//Le paso directamente a la funcion un array
echo "<strong>Vamos a probar la funcion ordenar() la cual mediante una funcion anonima y usort ordenará el array</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;

//Primero creo el array
$arrayString = ["choches","uno","bicicleta", "Juan","choche"]; 

//lo muestro
echo "\$arrayString sin ordenar: ".PHP_EOL;
echo "<br>".PHP_EOL;
//metodo print_r() muestra el array sin necesidad de echo
print_r($arrayString);
echo "<br>".PHP_EOL;

//Ordeno el array con la funcion
ordenar($arrayString);

echo "<br>".PHP_EOL;
echo "El resultado tras ordenar \$arrayString: ".PHP_EOL;
echo "<br>".PHP_EOL;

//metodo print_r() muestra el array sin necesidad de echo
print_r($arrayString); 


}
