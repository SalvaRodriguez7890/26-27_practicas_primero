<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

 $cadena = "Está la niña en casa";
 $longitudCadena = strlen($cadena);

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 1", []);
cuerpo($cadena, $longitudCadena);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo($cadena, $longitudCadena)
{
 ?>
    <!-- 3.- Genera una cadena aleatoria de 20 caracteres (los caracteres permitidos son letras
            minúsculas, letras mayúsculas y números)
            
            a) A partir de un array en el que están todos los caracteres posibles que cumplen la
            condición. (tienes que rellenar el array con todos los caracteres validos)
            
            b) A partir del código ASCII (se puede indicar un rango mayor y eliminar aquellos
            caracteres que no lo cumplan).-->    
<?php
   

   
}