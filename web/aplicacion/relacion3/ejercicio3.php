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
    
//Vamos a probar a elegir la suma y como valores le voy a psar 1 / 1-1-1-1 nos deberia dar 4
echo "<strong>Vamos a probar a elegir la suma y como valores le voy a psar 1 / 1-1-1-1 nos deberia dar 4</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;
$resultado = operaciones(1,1,1,1,1);

echo "<br>El resultado de la funcion a sido: ".$resultado;




}
