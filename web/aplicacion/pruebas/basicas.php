<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Pruebas Basicas");
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

  $var1=25;
  $cadena = 'esto es una cadena ';

  $var1+=12;
  echo $var1;

  $unaCadena = "Adios";
  echo $unaCadena;

  $var1-=17;

  echo "$var1";

 // $real=12/0;

  echo "<br>El numero es $var1<br>".PHP_EOL;
  echo '<br>El numero es $var1<br>'.PHP_EOL;



  
?>

<?php
}
?>
<!-- Comentario HTML--> 