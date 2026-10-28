<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 4",
        "LINK" =>""
    ],
    [
        "TEXTO"=>"Ejercicios Clases",
        "LINK" =>"/aplicacion/relacion4"
    ]
];

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 4", $barraUbi);
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


echo "<hr>".PHP_EOL;

echo "<b>EJERCICIO 1:</b> <br><br>".PHP_EOL;
//Para probar el ejercicio 1 creo 3 objetos, metiendoles edad y sin meterle
//para comprobar el atributo por defecto 10 de edad
$trompeta = new InstrumentoBase("Trompeta", 5);

$guitarra = new InstrumentoBase("Guitarra", 40);

$saxofon = new InstrumentoBase("Saxofon");

//ahora simplemente los muestro pero de forma distinta a como se crearon
//para comprobar que aunque guitarra la muestre la ultima me diga que fue
//la segunda en crearse (instacia 2)
    echo "<b>".$trompeta."</b>".PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<b>".$saxofon."</b>".PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<b>".$guitarra."</b>".PHP_EOL;

//ahora vamos a probar a aumentar la edad de los 3

    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<b>Le sumamos un año a cada instrumento y ahora tienen:</b>".PHP_EOL;

$guitarra->envejecer();
$saxofon->envejecer();
$trompeta->envejecer();

//Ahora vamos a llamar a la edad directamente para saber si han envejecido
    
    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "El instrumento: ".$trompeta->getDesripcion()." tiene <b>".$trompeta->getEdad()."</b> años".PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "El instrumento: ".$saxofon->getDesripcion()." tiene <b>".$saxofon->getEdad()."</b> años".PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "El instrumento: ".$guitarra->getDesripcion()." tiene <b>".$guitarra->getEdad()."</b> años".PHP_EOL;
    
 
 



}