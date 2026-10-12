<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
    "TEXTO"=>"inicio",
    "ENLACE"=>"/index.php",
        ],
    [
    "TEXTO"=>"pruebas",
    "ENLACE"=>"/aplicacion/pruebas/basicas.php",
    ]
];
$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Pruebas Basicas", $barra);        
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************



//vista
function cabecera() {}

//vista
function cuerpo()
{


?>
  Pruebas en Basicas
  
<?php

//   $var1=25;
//   $cadena = 'esto es una cadena ';

//   $var1+=12;
//   echo $var1;

//   $unaCadena = "Adios";
//   echo $unaCadena;

//   $var1-=17;

//   echo "$var1";

//  // $real=12/0;

//   echo "<br>El numero es $var1<br>".PHP_EOL;
//   echo '<br>El numero es $var1<br>'.PHP_EOL;

//   $var=125;
//   $tipo= gettype($var);
//   $var=(string)$var;
//   $tipo= gettype($var);
//   $var= settype($var, "double");
//   $tipo=gettype($var);
//   $var=intval($var);
//   $tipo= gettype($var);

//   $var="0";
  
//   if($var)
//       $cadena="var no vale false";

//   $var="0";
//   if("0000")
//       $cadena="var no vale false";
  
//   $var="";
//   if($var)
//       $cadena="var no vale false";

//   $var=0;
//   if($var)
//       $cadena="var no vale false";

//   $var=1;
//   if($var)
//       $cadena="var no vale false";

//   $var=1+true;
//   $var=1+1.5;
//   $var=1+"1hola";
//   $var=1+"1.5hola";
//   //$var=1+"hola";
//   $var=1+[];

$aux=124;
$var="hola".$aux;
$aux=true;
$var="hola".$aux;
$aux=[];
//$var="hola".$aux;
$aux="adios";
$var="hola".$aux;


//referencias
$var1=100;
$var2=$var1;
$var3=&$var1;
$var2=150;
$var3=200;

//solo borra el puntero de la variable a la zona de 
//memoria donde se guardaba.
unset($var3);

define("NUME", 25);
$var1+=NUME;


$var1+=NUME;

//Operadores
$var=15/2;

if("25"==25){
    $var="iguales";
}
if("25"===25){
    $var="iguales";
}
if("25"!=25){
    $var="distintos";
}
if("25"!==25){
    $var="distintos";
}
$var=15>25;
$var=14<25;
$var=14<=>25;

if(isset($var3)){
    $var=$var3;
}elseif(isset($mivar)){
    $var=$mivar;
}else{
    $var=27;
}

$var=$var3??$mivar??27;

$var=0b11111;
$var=$var>>1;
$var=$var<<1;

$var=0b1010 & 0b0101;
$var=0b1010 | 0b0101;

$var=7;

if($var==1){
    $cadena="uno";
}elseif ($var==2){
    $cadena="dos";
}else{
    $cadena="otro";

}

switch($var){

    case 1: $cadena="uno"; break;
    case 1: $cadena="uno"; break;
    defautl: $cadena = "otro";

}

?>


<?php
}
?>
<!-- Comentario HTML--> 