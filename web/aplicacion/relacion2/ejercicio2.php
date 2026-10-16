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
    <!--2.- Dada la cadena "Está la niña en casa" se pide:
- Mostrar cada carácter en una línea separada y con tantos espacios en blanco como me
indica la posición del carácter mostrado. (quedaría algo así)
NOTA: prueba si puedes hacerlo con [] para obtener los caracteres correctos. Prueba si
puedes hacerlo con substr para obtener los caracteres correctos. Prueba si puedes
hacerlo con mb_substr para obtener los caracteres correctos. Comenta las formas no
válidas para que pueda comprobar que lo has hecho.
E
s
 t
 á

 l
 a

 n
 i
 ñ
 a

 e
 n

 c
 a
 s
 a
- Mostrar la cadena en orden inverso, (usar índices negativos, no invertir la cadena)
con cada carácter en una línea distinta y con los espacios en blanco
correspondientes (desde 0 hasta n espacios en blanco), los caracteres pares en
mayúscula (0, 2, …) y los impares en minúscula (1, 3, 5, …), y extrayendo los
caracteres con mb_substr.
- Separa la cadena en partes usando el carácter a, y mostrar cada parte en una línea
distinta
- Localiza en la cadena la palabra niña y cambia el siguiente carácter a niña (el
espacio en blanco) por "/mujer "-->    
    <?php
   

    //Recorremos la cadena dos veces con un bucle for y vamos mostrando

    echo "<strong>Con []</strong><br>".PHP_EOL;
    for ($i = 0; $i < $longitudCadena; $i++){
        
        for($j=0 ; $j <= $i; $j++ ){
            echo  "&nbsp;&nbsp;".PHP_EOL;

        }
        echo $cadena[$i]." <br>".PHP_EOL;
    }

    //Recorremos la cadena igual que antes pero con substr()

    echo "<strong>Con substring</strong><br>".PHP_EOL;
    for ($i = 0; $i < $longitudCadena; $i++){
            
        for($j=0 ; $j <= $i; $j++ ){
            echo  "&nbsp;&nbsp;".PHP_EOL;

        }
        echo substr($cadena, $i,1)." <br>".PHP_EOL;
    }

     //Recorremos la cadena igual que antes pero con substr()

    echo "<strong>Con mb_substring</strong><br>".PHP_EOL;
    for ($i = 0; $i < $longitudCadena; $i++){
            
        for($j=0 ; $j <= $i; $j++ ){
            echo  "&nbsp;&nbsp;".PHP_EOL;

        }
        echo mb_substr($cadena, $i,1)." <br>".PHP_EOL;
    }




   
}