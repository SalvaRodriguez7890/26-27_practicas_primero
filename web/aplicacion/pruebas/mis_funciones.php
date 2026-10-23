<?php

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