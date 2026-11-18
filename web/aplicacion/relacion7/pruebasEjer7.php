<?php


include_once(dirname(__FILE__) . "/../../cabecera.php");
require_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
require_once(dirname(__FILE__) . "/../../scripts/clases/Punto.php");

//controlador



$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "ENLACE" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 7 - Pruebas",
        "ENLACE" =>"/aplicacion/relacion7/pruebasEjer7.php"
    ]
   
];



$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 7", $barraUbi);
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
    
    <h1>PRUEBAS EJER 7</h1>
    <hr>
    
<?php

try{
$punto1 = new Punto(64, 200, "pink", 2);

$punto2 = new Punto(-12, 200, "pink", 2);



}catch(Exception $e){
    echo $e->getMessage().PHP_EOL;
}

}

