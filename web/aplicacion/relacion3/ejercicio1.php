<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

include_once("./funcionesRelacion3.php");


//controlador

$vector = [];
$cadena = "";
$numero = 0;
$veces = 0;




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
        "TEXTO"=>"Ejercicio 1",
        "LINK" =>""
    ]
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Funciones", $barraUbi);
cuerpo($vector, $cadena, $numero, $veces);  //llamo a la vista
finCuerpo();
// **********************************************************






//vista
function cabecera() {}

//vista
function cuerpo($vector, $cadena, $numero, $veces)
{
    
//Le damos valor a la $cadena y al $numero para probarlo
$cadena = "PrimerAñadido";
$numero = 45;

echo "<strong>Se prueba a añadir 'PrimerAñadido' con '45'</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;

//añadimos la primera vez (debe estar correcto)
cuantasVeces($vector,$cadena,$numero,$veces);

//tras añadir mostramos que nos devuelve $veces

echo "<strong>A la funcion se le ha llamado: </strong>".$veces." vez <br>".PHP_EOL;
echo "<br>".PHP_EOL;

//ahora vamos a añadir 4 cosas mas y en medio vamos a meter los dos que deben dar error

echo "<strong>Ahora vamos a probar a meter 4 elementos que serán: 'SegundoAñadido'-'2daw'-'primera'-'Primera'</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;

//Se añade segunda vez
$cadena = "SegundoAñadido";
$numero = 123;

if(cuantasVeces($vector,$cadena,$numero,$veces)){
    echo "true<br>".PHP_EOL;

}else{
echo "false<br>".PHP_EOL;
}

//Se añade tercera vez
$cadena = "2daw";
$numero = 31;

if(cuantasVeces($vector,$cadena,$numero,$veces)){
    echo "true<br>".PHP_EOL;

}else{
echo "false<br>".PHP_EOL;
}

//Se añade cuerta vez
$cadena = "primera";
$numero = 41;

if(cuantasVeces($vector,$cadena,$numero,$veces)){
    echo "true<br>".PHP_EOL;

}else{
echo "false<br>".PHP_EOL;
}

//Se añade quita vez
$cadena = "Primera";
$numero = 461;

if(cuantasVeces($vector,$cadena,$numero,$veces)){
    echo "true<br>".PHP_EOL;

}else{
echo "false<br>".PHP_EOL;
}

echo "<br>".PHP_EOL;

echo "<strong>Se ha hecho la prueba de añadir 'SegundoAñadido'-'2daw'-'primera'-'Primera'</strong><br>".PHP_EOL;
echo "<br>".PHP_EOL;
echo "Ahora al comprobar el numero de veces que hemos llamado a la función solo debe mostrarnos 3.<br>".PHP_EOL;
echo "<br>".PHP_EOL;
echo "<strong>A la funcion se le ha llamado: </strong>".$veces." veces <br>".PHP_EOL;
echo "<br>".PHP_EOL;

}
