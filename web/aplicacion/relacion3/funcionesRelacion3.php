<?php
//Funcion de ejemplo

const MIA = 56;

/**
 * Funcion que devuelve un numero
 *
 * @param integer $num Numero al que aplicar el doble
 * @return integer|false devuelve el doble del argumento o false en caso de error.
 */
function doble(int $num): int|false { 
    
//$num es menor de 10, consideramos que hay un error 
if ($num<10) {
    return false; 
}
    return 2*$num; 
}

/**
 * 1.- Función cuentaVeces(). A esta función se le pasan cuatro parámetros: un array, una cadena y dos números. 
 *  La función se encargará de añadir en el array el primer número a la posición asociativa indicada por la cadena. 
 *  Hay que tener en cuenta que el array debe quedar actualizado cuando se salga de la función. Además, cada vez que se llama a la 
 * función, se devuelve en el segundo número un valor que corresponde con el número de llamada actual (1 para la primera, 2 para la segunda llamada, etc). 
 * Se devolverá true si todo ha ido bien y false si se ha detectado algún error. (se debe dar error si se indica como posición“2daw”o “primera”)
 *  $vector=array();//el vector vacio
 * $numero=0;
 * cuentaVeces($vector,”1osición”,7,$numero); //$vector (“1osición”=>7). En numero se de vuelve 1 porque es la primera llamada…
 * cuentaVeces($vector,”otra”,2,$numero);//$vector(“otra”=>9).En numero se devuelve 2 porque es la segunda llamada…
 */

