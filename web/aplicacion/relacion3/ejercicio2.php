<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include_once("./funcionesRelacion3.php");



//controlador

$longitud = 0;
$cadena = "";

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
        "TEXTO"=>"Ejercicio 2",
        "LINK" =>""
    ]
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Funciones", $barraUbi);
cuerpo($longitud, $cadena);  //llamo a la vista
finCuerpo();
// **********************************************************






//vista
function cabecera() {}

//vista
function cuerpo($longitud, $cadena)
{
    //generamos una cadena de 10 elementos
    echo "<strong>Vamos a probar a generar una cadena de valor 10 y objservamos que nos devuelve</strong><br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    //asigno el valor de longitud
    $longitud = 10;
//meto el valor de $cadena en un if igualandolo a la funcion, de forma que si sale bien le da valor a la cadena y si no sale bien será porque devuelve
//false y entrara el mensaje de error
    if($cadena = generarCadena($longitud)){

     echo "RESULTADO :<br>".PHP_EOL;
     echo 'La $cadena toma el valor de <br>'.$cadena.PHP_EOL;

    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    }else{
     echo "ERROR<br>".PHP_EOL;
    }
    echo "<strong>Vamos a probar a generar una cadena de valor de 0 y otra de -5 y observamos que nos devuelve</strong><br>".PHP_EOL;
    echo "<br>".PHP_EOL;

    //ahora voy a probar con una cadena de por ejemplo 50 caracteres
    echo "<strong>Vamos a probar a generar una cadena de valor 50 y observamos que nos devuelve</strong><br>".PHP_EOL;
    echo "<br>".PHP_EOL;

    //Cambiamos el valor de longitud
    $longitud = 50;

    if($cadena = generarCadena($longitud)){

     echo "RESULTADO :<br>".PHP_EOL;
     echo 'La $cadena toma el valor de <br>'.$cadena.PHP_EOL;

    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    }else{
     echo "ERROR<br>".PHP_EOL;
    }
    echo "<strong>Vamos a probar a generar una cadena de valor de 0 y otra de -5 y observamos que nos devuelve</strong><br>".PHP_EOL;
    echo "<br>".PHP_EOL;


    //Creamos una de longitud 0 y -5

    echo "<strong>Generamos de Longitud  0</strong><br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    $longitud = 0;

    if($cadena = generarCadena($longitud)){

     echo "RESULTADO :<br>".PHP_EOL;
     echo 'La $cadena toma el valor de <br>'.$cadena.PHP_EOL;

        echo "<br>".PHP_EOL;
        echo "<br>".PHP_EOL;
    }else{
     echo "ERROR al generar <br>".PHP_EOL;
    }

    echo "<br>".PHP_EOL;
    echo "<strong>Generamos de Longitud -5</strong><br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    $longitud = -5;

    if($cadena = generarCadena($longitud)){

     echo "RESULTADO :<br>".PHP_EOL;
     echo 'La $cadena toma el valor de <br>'.$cadena.PHP_EOL;

        echo "<br>".PHP_EOL;
        echo "<br>".PHP_EOL;
    }else{
     echo "ERROR al generar <br>".PHP_EOL;
    }


}
