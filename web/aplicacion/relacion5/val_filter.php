<?php

namespace VALFILTER;

/**
 * Function validaEntero(int &$var, int $min, int $max, int $defecto):bool Esta función
 * comprueba que $var contiene un entero cuyo valor está entre $min y $max. En $var se
 * devuelve el entero saneado (en caso de no cumplir las condiciones asigna a $var el valor
 * $defecto). La función devuelve true si es correcto y false en caso contrario.
 *
 * @param integer $var
 * @param integer $min
 * @param integer $max
 * @param integer $defecto
 * @return boolean
 */
function validaEntero(int &$var, int $min, int $max, int $defecto):bool{
//meto el filtro dentro la variable "$ociones" con las variables de minimo y maximo quel e paso
    $opciones = [
        'options' => [
            'min_range' => $min,
            'max_range' => $max
        ]
    ];
    //Creo la variable $resultado metiendole el filro, si esa variable es false no entra en el siguiente IF
    //si la variable sale como un numero entero que a pasado el filtro pues si entra
    $resultado=filter_var($var,FILTER_VALIDATE_INT,$opciones);

    //si no es false
    if($resultado !== false){
        //si entra dentro del filtro es porque no es false y a salido bien
        //pues a la variable $var que es la que recibe el numero saneado le asigno el resultado
        $var = $resultado;
        return true;
    }else{
        //si no es un int, no pasa el filtro, por lo que $var toma el valor de la de $defecto
        //y devuelvo fallse;
        $var = $defecto;
        return false;
    }
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

    //meto el filtro dentro la variable "$ociones" con las variables de minimo y maximo quel e paso
    $opciones = [
        'options' => [
            'min_range' => $min,
            'max_range' => $max
        ]
    ];
    //Creo la variable $resultado metiendole el filro, si esa variable es false no entra en el siguiente IF
    //si la variable sale como un numero entero que a pasado el filtro pues si entra
    $resultado=filter_var($var,FILTER_VALIDATE_FLOAT,$opciones);

    //si no es false
    if($resultado !== false){
        //si entra dentro del filtro es porque no es false y a salido bien
        //pues a la variable $var que es la que recibe el numero saneado le asigno el resultado
        $var = $resultado;
        return true;
    }else{
        //si no es un float, no pasa el filtro, por lo que $var toma el valor de la de $defecto
        //y devuelvo false;
        $var = $defecto;
        return false;
    }
}


