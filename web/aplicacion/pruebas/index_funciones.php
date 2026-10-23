<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include_once("./mis_funciones.php");


//controlador
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Index Funciones",
        "LINK" =>""
    ]
];

$numero = doble(25);
//Comprobación

if($numero === false){
    //Hay un error, lo resuelvo
    $numero = 10;
}

if($numero = doble($numero)===false){
     exit;
 }

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Index pruebas", $barraUbi);
cuerpo($numero);  //llamo a la vista
finCuerpo();
// **********************************************************






//vista
function cabecera() {}

//vista
function cuerpo(int $n)
{
    echo "El doble del numero es $n <br>".PHP_EOL;
    echo "El numero $n es el doble de otro ".PHP_EOL;


}
