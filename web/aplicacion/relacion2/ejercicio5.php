<?php

use LDAP\Result;

include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$heredoc1 = <<<texto
    <h1>Nombre:</h1> Salvador Rodriguez Sojo 
    <h2>Edad:</h2> 26 años 
    <h3>correo1</h3> correo@gmail.com  
    <h3>correo2</h3> correo@email.com 
    texto;

$resultado = 0;

//Buscar nombre

//Empieza en S, luego que tenga a-z minus, con la bara \" " y un espacio los espacios y A-Z amyus
$exp = '/S[a-z\ A-Z]*o/';

preg_match($exp, $heredoc1, $resultado, PREG_OFFSET_CAPTURE);

$nombre = $resultado[0][0];

//Buscar numero

$exp = '/\d{2}/';

preg_match($exp, $heredoc1, $resultado, PREG_OFFSET_CAPTURE);

$numero = $resultado[0][0];


//buscar correo
$exp = '/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/';

preg_match_all($exp, $heredoc1, $resultado, PREG_OFFSET_CAPTURE);

$correo1 = $resultado[0][0][0];

$correo2 = $resultado[0][1][0];



$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 2", []);
cuerpo($nombre, $heredoc1, $numero, $correo1, $correo2);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo($nombre, $heredoc1, $numero, $correo1, $correo2)
{
 ?>
    <!-- Crea una cadena que ocupe varias líneas (usa nowdoc o heredoc). En líneas distintas debe
        aparecer: varias etiquetas html (<>), varios números (de 1 o varias cifras) y varias direcciones
        de correo electrónico (formato aaaa@aaaa.aa).
        Define expresiones regulares apropiadas para localizar los distintos elementos creados
        (etiqueta, numero y dirección de email) en la cadena.
        Muestra la posición/elemento encontrado usando las expresiones regulares definidas y la
        función preg_match.-->    
<?php
   
    //HEREDOC

    echo "<strong>Expresion HEREDOC usada:</strong><br>".PHP_EOL;    
    echo $heredoc1.PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;

    //Extracon del nombre
    echo "<strong>ETRACCION DEL NOMBRE: MEDIANTE LA EXPRESION REGULAR: \$exp = '/^[Sal][r]$/';<br>".PHP_EOL;      
    echo "<br>".PHP_EOL;
    echo "Nombre ->".$nombre.PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;

    //Extracon de la edad
    echo "<strong>ETRACCION DE LA EDAD: MEDIANTE LA EXPRESION REGULAR: \$exp = '/\d{2}/' <br>".PHP_EOL;      
    echo "<br>".PHP_EOL;
    echo "Edad ->".$numero.PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;
    
    //primer correo
    echo "<strong>ETRACCION DEL PRIMER CORREO: MEDIANTE LA EXPRESION REGULAR: \$exp = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/' <br>".PHP_EOL;      
    echo "<br>".PHP_EOL;
    echo "Correo1 ->".$correo1.PHP_EOL;
    echo "<br>".PHP_EOL;
    echo "<br>".PHP_EOL;

    //segundo correo
    echo "<strong>ETRACCION DEL SEGUNDO CORREO:  MEDIANTE LA EXPRESION REGULAR: \$exp = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/' <br>".PHP_EOL;    
    echo "<br>".PHP_EOL;
    echo "Correo2 ->".$correo2.PHP_EOL;
    echo "<br>".PHP_EOL;

 
}