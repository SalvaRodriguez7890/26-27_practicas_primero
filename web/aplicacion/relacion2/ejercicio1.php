<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 1", []);
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
    <!--1.- Escribe distintas cadenas usando “, ‘, HEREDOC y NOWDOC incluyendo variables,
    etiquetas html y caracteres especiales como ‘, “, á, é, ñ. Muestra las cadenas y comprueba que
    el código fuente es legible (no se tiene una sola línea con todo seguido). Haz que se muestren
    las etiquetas html (no se ejecuten)-->    
    <?php

    //Variables
    $nombre = "Hola me llamo Salva";
    $edad = "y tengo 26";

    //Cadenas Con "" y ''

    $cadena1 = "Nombre: $nombre \n";
    $cadena2 = 'Mi edad es: '.$edad."\n";

    //Usando heredoc

    $heredoc1 = <<<texto
    <h1>Nombre:</h1> $nombre <br />
    <h1>Edad:</h1> $edad <br />
    Demás -> $cadena1   <br />
    Demás2 -> $cadena2  <br />
    texto;

    //Usando NOWDOC

    $heredoc2 = <<<'texto'
    <h1>Nombre:</h1> $nombre <br />
    <h1>Edad:</h1> $edad <br />
    Demás -> $cadena1   <br />
    Demás2 -> $cadena2  <br />
    texto;




    echo "<strong>Variables </strong><br>".PHP_EOL;
    echo "$nombre <br>".PHP_EOL;
    echo "$edad <br>".PHP_EOL;

    echo "<strong>Cadenas con \"\" y '' </strong><br>".PHP_EOL;
    echo "$cadena1 <br>".PHP_EOL;
    echo "$cadena2 <br>".PHP_EOL;

    echo "<strong>Cadenas HEREDOC </strong><br>".PHP_EOL;
    echo "$heredoc1 <br>".PHP_EOL;
    echo "<strong>Cadenas NOWDOC </strong><br>".PHP_EOL;
    echo "$heredoc2 <br>".PHP_EOL;

}