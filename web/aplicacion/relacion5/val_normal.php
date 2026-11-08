<?php

namespace VALNORMAL;

/**
 * Function validaEntero(int &$var, int $min, int $max, int $defecto):bool Esta función
 * comprueba que $var contiene un entero cuyo valor está entre $min y $max. En $var se
 * devuelve el entero saneado (en caso de no cumplir las condiciones asigna a $var el valor
 * $defecto). La función devuelve true si es correcto y false en caso contrario.
 *
 * @param mixed $var
 * @param integer $min
 * @param integer $max
 * @param integer $defecto
 * @return boolean
 */
function validaEntero(int &$var, int $min, int $max, int $defecto): bool {
    
    //el primer if comprueba que sea un numero entero
    if(is_int($var)){
            //este segundo if que este dentro del rrango que el ponesmos, si entra en este segundo if
            //el numero es correcto y devuelvo true
            if ($var >= $min && $var <= $max) {
            return true;
            }
        }
    
    //si en el if no entra, ssignifica que no es un numero entero o que no está dentro del rango
    //pues devuelvo false y el valor por defecto
    $var = $defecto;

    return false;
}

/**
 * Function validaReal(float &$var, float $min, float $max, float $defecto):bool Esta función
 * comprueba que $var contiene un real cuyo valor está entre $min y $max. En $var se devuelve
 * el real saneado (en caso de no cumplir las condiciones asigna a $var el valor $defecto). La
 * función devuelve true si es correcto y false en caso contrario. 
 *
 * @param float $var
 * @param float $min
 * @param float $max
 * @param float $defecto
 * @return boolean
 */
function validaReal(float &$var, float $min, float $max, float $defecto):bool {

    //el primer if comprueba que sea un numero real
    if(is_float($var)){
            //este segundo if que este dentro del rrango que el ponesmos, si entra en este segundo if
            //el numero es correcto y devuelvo true
            if ($var >= $min && $var <= $max) {
            return true;
            }
        }
    
    //si en el if no entra, ssignifica que no es un numero real o que no está dentro del rango
    //pues devuelvo false y el valor por defecto
    $var = $defecto;

    return false;
}