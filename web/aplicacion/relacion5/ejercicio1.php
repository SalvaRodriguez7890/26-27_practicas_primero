<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador



$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "ENLACE" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 5",
        "ENLACE" =>"/aplicacion/relacion5/ejercicios.php"
    ],
    [
        "TEXTO"=>"Ejercicios Relacion 5",
        "ENLACE" =>"/aplicacion/relacion5/ejercicios.php"
    ]
];



$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 5", $barraUbi);
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

//INCLUYO LAS LIBRERIAS
include "val_filter.php";
include "val_normal.php";


echo "<h2>FUNCION validaEntero()</h2>".PHP_EOL;
//Primero el val_noraml
echo "<h3>--- Librería VALNORMAL ---</h3>".PHP_EOL;

// le voy a pasar primero un un rango entre 10 y 36 y el numero a comprobar va aser el 13
//debe devolver true, y por defecto por ejemplo 21
$fecha = 13;

$resultado1 = VALNORMAL\validaEntero($fecha, 10, 36, 21);
echo "Se comprueba la variable \$fecha con valor 13 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//Ahor voy a pasar el mismo rango y el numero a comprobar va aser el 37
//debe devolver false, y por defecto por ejemplo 21, pues la variable debe pasar de 37 a 21
$fecha = 37;

$resultado1 = VALNORMAL\validaEntero($fecha, 10, 36, 21);
echo "Se comprueba la variable \$fecha con valor 37 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//ahora con val_filter
echo "<h3>--- Librería VALFILTER ---</h3>".PHP_EOL;

// le voy a pasar primero un un rango entre 10 y 36 y el numero a comprobar va aser el 13
//debe devolver true, y por defecto por ejemplo 21
$fecha = 13;

$resultado1 = VALFILTER\validaEntero($fecha, 10, 36, 21);
echo "Se comprueba la variable \$fecha con valor 13 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//Ahor voy a pasar el mismo rango y el numero a comprobar va aser el 37
//debe devolver false, y por defecto por ejemplo 21, pues la variable debe pasar de 37 a 21
$fecha = 37;

$resultado1 = VALFILTER\validaEntero($fecha, 10, 36, 21);
echo "Se comprueba la variable \$fecha con valor 37 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//
//
//

echo "<h2>FUNCION validaReal()</h2>".PHP_EOL;
//Primero el val_noraml
echo "<h3>--- Librería VALNORMAL ---</h3>".PHP_EOL;

// le voy a pasar primero un un rango entre 10.16 y 36.04 y el numero a comprobar va aser el 31.03
//debe devolver true, y por defecto por ejemplo 25.37
$fecha = 31.03;

$resultado1 = VALNORMAL\validaReal($fecha, 10.16, 36.04, 25.37);
echo "Se comprueba la variable \$fecha con valor 31.03 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//Ahor voy a pasar el mismo rango y el numero a comprobar va aser el 37.41
//debe devolver false, y por defecto por ejemplo 21, pues la variable debe pasar de 37 a 21
$fecha = 37.41;

$resultado1 = VALNORMAL\validaReal($fecha, 10.16, 36.04, 25.37);
echo "Se comprueba la variable \$fecha con valor 37.41 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//ahora con val_filter
echo "<h3>--- Librería VALFILTER ---</h3>".PHP_EOL;

// le voy a pasar primero un un rango entre 10.16 y 36.04 y el numero a comprobar va aser el 31.03
//debe devolver true, y por defecto por ejemplo 25.37
$fecha = 31.03;

$resultado1 = VALFILTER\validaReal($fecha, 10.16, 36.04, 25.37);
echo "Se comprueba la variable \$fecha con valor 31.03 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//Ahor voy a pasar el mismo rango y el numero a comprobar va aser el 37.41
//debe devolver false, y por defecto por ejemplo 21, pues la variable debe pasar de 37 a 21
$fecha = 37.41;

$resultado1 = VALFILTER\validaReal($fecha, 10.16, 36.04, 25.37);
echo "Se comprueba la variable \$fecha con valor 37.41 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//
//
//

echo "<h2>FUNCION validaFecha()</h2>".PHP_EOL;
//Primero el val_noraml
echo "<h3>--- Librería VALNORMAL ---</h3>".PHP_EOL;

//Le paso una fecha corecta, debe devolve true y el valor que le pase
$fecha = "21/12/2021";

$resultado1 = VALNORMAL\validaFecha($fecha, "01/01/2000");
echo "Se comprueba la variable \$fecha con valor 21/12/2021 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//Ahora le voy a pasr una fecha con formato correcto pero con el mes 14 por ejemplo,
//Debe devolver false y el valor por defecto
$fecha = "21/14/2021";

$resultado1 = VALNORMAL\validaFecha($fecha, "01/01/2000");
echo "Se comprueba la variable \$fecha con valor 21/14/2021 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//Ahora voy a pasarle un valor correcto pero con formato incorrecto
$fecha = "1/4/21";

$resultado1 = VALNORMAL\validaFecha($fecha, "01/01/2000");
echo "Se comprueba la variable \$fecha con valor 1/4/21 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//ahora con val_filter
echo "<h3>--- Librería VALFILTER ---</h3>".PHP_EOL;

//Le paso una fecha corecta, debe devolve true y el valor que le pase
$fecha = "21/12/2021";

$resultado1 = VALFILTER\validaFecha($fecha, "01/01/2000");
echo "Se comprueba la variable \$fecha con valor 21/12/2021 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//Ahora le voy a pasr una fecha con formato correcto pero con el mes 14 por ejemplo,
//Debe devolver false y el valor por defecto
$fecha = "21/14/2021";

$resultado1 = VALFILTER\validaFecha($fecha, "01/01/2000");
echo "Se comprueba la variable \$fecha con valor 21/14/2021 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//Ahora voy a pasarle un valor correcto pero con formato incorrecto
$fecha = "1/4/21";

$resultado1 = VALFILTER\validaFecha($fecha, "01/01/2000");
echo "Se comprueba la variable \$fecha con valor 1/4/21 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $fecha<br>".PHP_EOL;

//
//
//

echo "<h2>FUNCION validaHora()</h2>".PHP_EOL;
//Primero el val_noraml
echo "<h3>--- Librería VALNORMAL ---</h3>".PHP_EOL;

//Le paso una hora corecta, debe devolve true y el valor que le pase
$hora = "16:31:57";

$resultado1 = VALNORMAL\validaHora($hora, "00:00:00");
echo "Se comprueba la variable \$hora con valor 16:31:57 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $hora<br>".PHP_EOL;

//Ahora le voy a pasr una hora con formato correcto pero con los minutos 70 por ejemplo,
//Debe devolver false y el valor por defecto
$hora = "16:70:57";

$resultado1 = VALNORMAL\validahora($hora, "00:00:00");
echo "Se comprueba la variable \$hora con valor 16:70:57 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $hora<br>".PHP_EOL;

//Por ultimo le paso una hora correcta pero con solo 1 digito
$hora = "6:1:7";

$resultado1 = VALNORMAL\validaHora($hora, "00:00:00");
echo "Se comprueba la variable \$hora con valor 6:1:7 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $hora<br>".PHP_EOL;

//ahora con var_filter
echo "<h3>--- Librería VALFILTER ---</h3>".PHP_EOL;

//Le paso una hora corecta, debe devolve true y el valor que le pase
$hora = "16:31:57";

$resultado1 = VALFILTER\validaHora($hora, "00:00:00");
echo "Se comprueba la variable \$hora con valor 16:31:57 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $hora<br>".PHP_EOL;

//Ahora le voy a pasr una hora con formato correcto pero con los minutos 70 por ejemplo,
//Debe devolver false y el valor por defecto
$hora = "16:70:57";

$resultado1 = VALFILTER\validahora($hora, "00:00:00");
echo "Se comprueba la variable \$hora con valor 16:70:57 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $hora<br>".PHP_EOL;

//Por ultimo le paso una hora correcta pero con solo 1 digito
$hora = "6:1:7";

$resultado1 = VALFILTER\validaHora($hora, "00:00:00");
echo "Se comprueba la variable \$hora con valor 6:1:7 => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $hora<br>".PHP_EOL;

//
//
//

echo "<h2>FUNCION validaEmail()</h2>".PHP_EOL;
//Primero el val_noraml
echo "<h3>--- Librería VALNORMAL ---</h3>".PHP_EOL;

//Le paso un mail corecto, debe devolve true y el valor que le pase
$mail = "ejemplo3123correcto@mail.com";

$resultado1 = VALNORMAL\validaEmail($mail, "ejemploCorrecto@emial.com");
echo "Se comprueba la variable \$mail con valor 'ejemplo3123correcto@mail.com' => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $mail<br>".PHP_EOL;

//Le paso un mail incorrecto, debe devolve false y el valor por defecto
$mail = "esto no es un email";

$resultado1 = VALNORMAL\validaEmail($mail, "ejemploCorrecto@emial.com");
echo "Se comprueba la variable \$mail con valor 'esto no es un email' => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $mail<br>".PHP_EOL;

//Ahora con valfilter
echo "<h3>--- Librería VALFILTER ---</h3>".PHP_EOL;

//Le paso un mail corecto, debe devolve true y el valor que le pase
$mail = "ejemplo3123correcto@mail.com";

$resultado1 = VALFILTER\validaEmail($mail, "ejemploCorrecto@emial.com");
echo "Se comprueba la variable \$mail con valor 'ejemplo3123correcto@mail.com' => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $mail<br>".PHP_EOL;

//Le paso un mail incorrecto, debe devolve false y el valor por defecto
$mail = "esto no es un email";

$resultado1 = VALFILTER\validaEmail($mail, "ejemploCorrecto@emial.com");
echo "Se comprueba la variable \$mail con valor 'esto no es un email' => ".($resultado1?"TRUE":"FALSE") . " | Valor final: $mail<br>".PHP_EOL;


}