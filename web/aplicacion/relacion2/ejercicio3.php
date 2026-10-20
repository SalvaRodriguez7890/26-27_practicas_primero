<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

 $arrayCaracteres = [
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
                    ];
//$arrayCaracteres = str_split('abcdefghijklmnopqrstuvwxyzABCDEFJHIJKLMNOPQRSTVWXYZ');

 $cadena = "";
 $longitudCadena = 20;
 $numAleatorio = 0;

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 1", []);
cuerpo($cadena, $longitudCadena, $arrayCaracteres, $numAleatorio);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo($cadena, $longitudCadena, $arrayCaracteres,$numAleatorio)
{
 ?>
    <!-- 3.- Genera una cadena aleatoria de 20 caracteres (los caracteres permitidos son letras
            minúsculas, letras mayúsculas y números)
            
            a) A partir de un array en el que están todos los caracteres posibles que cumplen la
            condición. (tienes que rellenar el array con todos los caracteres validos)
            
            b) A partir del código ASCII (se puede indicar un rango mayor y eliminar aquellos
            caracteres que no lo cumplan).-->    
<?php
   
    //Con un array

    echo "<strong>A) Usando un array con los valores de los caracteres</strong><br>".PHP_EOL;

    //Se dan las 20 vueltas que queremos de cadena
    for ($i = 0; $i < $longitudCadena; $i++){
        
        $numAleatorio = mt_rand(0,(count($arrayCaracteres)-1));
        $cadena .= $arrayCaracteres[$numAleatorio];
    }
    echo "<br>".PHP_EOL;
    echo "<strong>Cadena Generada: </strong><br>".$cadena.PHP_EOL;
    echo "<strong><br>Logintud: </strong>".strlen($cadena).PHP_EOL;
    echo "<br>".PHP_EOL;


    //Con tabla ascic usando chr()
    //Se reinicia la cadena
    //el rango de caracteres es -> A = 65 y Z = 90
    //el rango de caracteres es -> a = 97 y z = 122

    $cadena = "";
    echo "<br><strong>B) Usando los valores de la tabla ASCIC</strong><br>".PHP_EOL;
   

    $i = 0;
    //Se dan las 20 vueltas que queremos de cadena
    while ($i < $longitudCadena){
        
    //Generamos el numero aleatorio entre 65 y 122
        $numAleatorio = rand(65,122);

        //si ese número generado NO esta dentro del rango de los caracteres no permitidos
        //se añade a la cadena y la $i se incrementa, si no se vuelve a generar un numero
        if( ($numAleatorio >= 48 && $numAleatorio <= 57) || 
            ($numAleatorio >= 65 && $numAleatorio <= 90) || 
            ($numAleatorio >= 97 && $numAleatorio <= 122)){
            $cadena .= chr($numAleatorio);
            $i++;
        }
    }
    echo "<br>".PHP_EOL;
    echo "<strong>Cadena Generada: </strong><br>".$cadena.PHP_EOL;
    echo "<br><strong>Logintud: </strong>".strlen($cadena).PHP_EOL;

   
}