<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$var1 = 17.5 ;
$var2 = 379987.24;

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 2", []);
cuerpo($var1, $var2);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo($var1, $var2)
{
 ?>
    <!-- 4.- Tengo unas variables con valores 17.5 (float), 379987.24 (float)
            Mostrarlas de forma que resulte "el primer valor -0000000000017,5-, el segundo valor -
            379.987,24-" (usar number format para obtener el formateo de los números, los números se
            muestran con 15 caracteres en total, el primero relleno con 0 y el segundo con espacios-debe
            aparecer el espacio))-->    
<?php
   
    //Con un array

    echo "<strong>Formateando los valores 17.5 y 379987.24.</strong><br>".PHP_EOL;    
    echo "<br>".PHP_EOL;
    $num1_formateado = number_format($var1, 1, ',', '.'); //nos da 17,5
    $num2_formateado = number_format($var2, 2, ',', '.'); //Nos da 379.987,24   
    echo "<strong>Formato nuevo: </strong> $num1_formateado y $num2_formateado<br>".PHP_EOL;    
    echo "<br>".PHP_EOL;

    echo "<strong>Formateando los valores 17,5 y 379.987,24 .</strong><br>".PHP_EOL;    
    echo "<br>".PHP_EOL;
    $num1_final= "-".str_pad($num1_formateado, 15, '0', STR_PAD_LEFT)."-";
    $num2_final = "-".str_pad($num2_formateado, 15, ' ', STR_PAD_LEFT)."-";  
    echo "<strong>Formato nuevo: </strong> $num1_final y $num2_final<br>".PHP_EOL;    

   
}