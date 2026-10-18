<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$cadena = "Prueba de una 25.313 años cadena";
$resultado = 0;

//Buscar numero

$exp = '/[0123456789]+/';
$exp = '/[0-9]+/';
$exp = '/\d+/';
$exp = '/\d{1,}/';
$exp = '/[[:digit:]]+/';

preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);


$usuario=getenv("MYSQL_USER");

//buscar un numero real

$exp = "/\d+\.\d+/";

preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);

//modificadores

$exp = '/años/';

preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);

//subpatrones
//Quiero encontrar en un numero real la parte decimal.


$exp = "/\d+\.(\d+)/";

preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);

//cuantificador, como hacer perezoso

$cadena = "/* primer comentario */ no comentado /* segundo comentario */";
$exp = "//\*.*\*//";
preg_match($exp, $cadena, $resultado, PREG_OFFSET_CAPTURE);



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

<?php




     
}