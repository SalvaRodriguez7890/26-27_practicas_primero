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

/**
 * Funcion cuantasVeces
 *
 * @param array $vector se le pasa un array
 * @param string $cadena le metemos una posicion asociativa (cadena)
 * @param float $numero le metemos el valor a guardar, un numero real
 * @param integer $numLlamada las veces que hemos llamado a la funcion
 * @return bool
 */


//El ampersan (&) delante de cada variable (array y numero de veces) hará que lo que modifiquemos dentro de la funcion se guarde.
function cuantasVeces(array &$vector, string $cadena, float $numero, int &$numLlamada):bool{
    //la variable "cuentaVeces" al ser estatica dentro de la funcion, esta recuerda siempre su valor, al principio la se inicializa en 0
    //para darle una valor, pero luego conforme la vayamos llamando se irá incrementando.
    static $cuentaVeces=0;

    //si se le pasa como posicion asociativa primera o 2daw devolvemos error.
    if($cadena == "2daw" || $cadena == "primera"){
        return false;
    }else{//si no da error lo añadimos al array
        $vector[$cadena]=$numero;
        $cuentaVeces++; 
        $numLlamada = $cuentaVeces;
        return true;
    }
}

/**
 * 2.- Función generarCadena(). A esta función se le pasa un parámetro con valor por defecto 10 y se encarga de devolver una cadena de 
 * longitud la indicada cuyos caracteres son generados de forma aleatoria (caracteres válidos: letras mayúsculas, minúsculas y números). 
 * Devolverá false si se ha indicado un número negativo o igual a 0. 
 */

/**
 * Genera Cadena/Contraseñas
 * Devuelve una cadena y si se le pasa una longitud de 0 o negativo devuelve false
 * @param [int] $longitud
 * @return string|bool
 */
function generarCadena(int $longitud = 10):string|bool{
 $cadena = "";

    if($longitud <= 0){
        return false;
    }else{

        $i = 0;
            //Se dan las tantas vueltas como longitud de cadena queramos
            while ($i < $longitud){
                
            //Generamos el numero aleatorio entre 49 y 122
                $numAleatorio = rand(48,122);

                //si ese número generado NO esta dentro del rango de los caracteres no permitidos
                //se añade a la cadena y la $i se incrementa, si no se vuelve a generar un numero
                if(($numAleatorio >= 48 && $numAleatorio <= 57) || 
                   ($numAleatorio >= 65 && $numAleatorio <= 90) || 
                   ($numAleatorio >= 97 && $numAleatorio <= 122)){
                    $cadena .= chr($numAleatorio);
                    $i++;
                }
            }

            return $cadena;
    }
}


/**
 * 3.- Función operaciones(). Esta función recibe al menos tres parámetros. El primero (entero) es el 
 * tipo de operación. Los demás son valores numéricos (los operandos). El tipo de operación puede ser 
 *      1, suma todos los operandos 
 *      2, al primer operando se restan el resto 
 *      3, multiplicación de todos los operandos. 
 * 
 *      En cualquier otro caso se suman los operandos que ocupan las posiciones pares y se restan los de las posiciones impares 
 *      (el primer operando es 1). 
 *      
 *      Operaciones(1,2,5,7,3,4); //haría la suma de 2+5+7+3+4 
 *      Operaciones(5,2,5,7,3,4); //Sumaria suma las posiciones pares (5+3), las posiciones impares (2+7+4),  y se restan los dos. 
 */

/**
 * Funcion de operaciones
 *
 * @param integer $tipo
 * @param float $valor2
 * @param float $valor3
 * @param array ...$demas
 * @return int
 */
function operaciones(int $tipo, float $valor2, float $valor3, ...$demas) {
    $resultado=0;
    //voy a usar un switch para realizarlo
    switch($tipo){

    //si $tipo es 1 sumamos con un foreach iterando con $demas;
        case 1:         
            $resultado = $valor2 + $valor3;

            foreach ($demas as $num) {
                $resultado += $num;            
            }
    
        break;
    //si $tipo es 2 restamos uno a uno y con un foreach iterando con $demas;
        case 2:        
            //a resultado le doy el valor del primero
            $resultado = $valor2 - $valor3;
            foreach ($demas as $num) {
                $resultado -= $num;            
            }
            
        break;

    //si $tipo es 3 multiplicamos todo
        case 3:    
            $resultado = $valor2 * $valor3;

            foreach ($demas as $num) {
                $resultado *= $num;            
            }    
            
        break;
    //Si se le pasa un tipo que no sea ni 1 2 o 3 pues hacemos lo que nos dice de los pares
    //se suma las posiciones pares entre si, las posiciones impares entre si y se restan entre ellos
        default: 
        $sumaPar = 0;
        $sumaImp = 0;
        //recorro el array de argumentos

        //El bucle empieza en 1 porque la posicion 0 es el tipo (no se tiene en cuenta en este caso)
        for($i = 1; $i<func_num_args(); $i++){

            //si el valor que hay en la posicion % 2 == 0 es par
            //sumo a la variable de pares
            if(func_get_arg($i)%2==0){
                $sumaPar += func_get_arg($i);
            }else{//Si no significa que es impar, lo sumo a la variable de impares
                $sumaImp += func_get_arg($i);
            }

        }
            $resultado = $sumaPar - $sumaImp;
        ;
        
            

    }//fin del swtich

            return $resultado;


}








/**
* 4.- Función devuelve(). Esta función recibe como parámetros tres números (enteros) y devuelve la suma de los tres valores en el primer parámetro y 
*     como resultado de la función el producto de los tres valores. Los dos últimos parámetros tendrán definidos valor por defecto (el que queráis).
*        $valor=7;
*        devuelve($valor,4) //$valor valdrá 7+4+10 y se devuelve 7*4*10 (10 es el valor por defecto que le he puesto al tercer parámetro.
*        Hacer varias llamadas a la función indicando:
*        - Los tres parámetros
*        - El primer parámetro únicamente
*        - El primer y el segundo parámetro
*        - El primer y el tercer parámetro (ojo, el segundo parámetro no se indica)
*/

//le ponemos & al valor1 que será el que se lleve el resultado
/**
 * Funcion devuelve ejer4
 *
 * @param integer $valor1
 * @param integer $valor2 tendra valor por defecto por jeemplo 23
 * @param integer $valor3 su valor por defecto será 10
 * @return integer|boolean
 */
function devuelve(int &$valor1, int $valor2=23, int $valor3 = 10):int|bool{
   
    if(is_integer($valor1)||is_integer($valor2)||is_integer($valor3)){

    //Hacemos la suma del producto
    $sumaValor1= $valor1+$valor2+$valor3;
    //hacemos la multiplicacion
    $producto = $valor1*$valor2*$valor3;

    // el valor1 lo igualamos a la suma
    $valor1 = $sumaValor1;

    //devolvemos el producto
    return $producto;

    //si alguno de los tres valores introducidos no son integer le devolvemos false
    }else{
        return false;
    }
    
}

//Funcion arrow de prueba
fn(int $a, int $b , ...$resto)=> ($a<100)?$a+$b:$a-$b;

/**
* 5.- Se tienen las funciones suma, resta y multiplicacion que reciben cada una dos parámetros numéricos (entero) y que 
*devuelven el resultado de la operación que indica su nombre sobre los parámetros.
*
*Tenemos la Función hacerOperacion que recibe tres parámetros. El primero es una cadena que puede ser suma, resta o multiplicacion. 
*Los otros dos son los operandos. Esta función se encargará de devolver el resultado de ejecutar la “cadena” con los operandos usando 
*una variable-función para llamar a la operación. Hay que comprobar indicando una operación correcta (devuelve false si la operación no es válida).
*
*hacerOperacion(“resta”,3,1) //devuelve 3-1. No se llama directamente a la función resta, se tiene una variable función para ello
*/

//funcuiones muy simples que usara hacerOperacion()
function suma(int $valor1, int $valor2):int{return $valor1+$valor2;}
function resta(int $valor1, int $valor2):int{return $valor1-$valor2;}
function multiplicacion(int $valor1, int $valor2):int{return $valor1*$valor2;}

/**
 * Funcion hacerOperacion
 *
 * @param string $cadena
 * @param integer $valor1
 * @param integer $valor2
 * @return integer
 */
function hacerOperacion(string $cadena, int $valor1, int $valor2):int {
    switch ($cadena) {
        case "suma": 
        case "resta": 
        case "multiplicacion": 
            //Con las $cadena hacemos referencia a la funcion de sumar restar o multiplicar
            return $cadena($valor1, $valor2);
        break;

            //si no es ninguna devuelvo 0
        default: 
            return 0;
        break;
    }
}


/**
 * 6.- Crear la función llamadaAFuncion que recibe tres operandos (entero, entero y callable) y que
 *       devuelve un entero que es el resultado de llamar al parámetro callback con los otros parámetros.
 *       Llamar a la función llamadaAFuncion 3 veces pasando como parámetro de callback funciones de
 *       flecha distintas que tu definas
 *       llamadaAFuncion(1,2,fn($a,$b)=>$a+$b)
 *       Repetir las llamadas, definiendo las 3 funciones como anónimas (se asignan a variables)
 */

/**
 * funcion callback
 *Esta fuicnion la usaremos con las funciones simples de suma-resta-multiplicacion por ejemplo
 * @param integer $valor1
 * @param integer $valor2
 * @param callable $funCallback
 * @return integer
 */
function llamadaAFuncion(int $valor1, int $valor2, callable $funCallback):int{
            return $funCallback($valor1,$valor2);
}


/**
 *7.- Función ordenar(): A esta función se le pasa un array y lo ordena mediante una llamada a usort,
 *   al que se indicará como función callback una función anónima que ordenará en orden descendente
 *   según el número de caracteres de cada elemento.
 *   $vector=array((“uno”,“grande”,“caminos”,”a”)
 *   Ordenar($vector);//el vector debe quedar (“caminos”,”grande”,”uno”,”a”)
 */

 /**
  * Funcion para ordenar
  *
  * @param array $array
  * @return void
  */
//Le pongo el & al array para que le cambie su valor y lo ordene, la funcion en si no devuelve nada
function ordenar(array &$array):void{

            //a la funcion usort le meto el $array y una funcion el cual con m_strlen ordenará
    usort($array, function($a, $b) {
        return mb_strlen($b) - mb_strlen($a); //orden descendente de mayor a menor cantidad de caracteres
    });
}


