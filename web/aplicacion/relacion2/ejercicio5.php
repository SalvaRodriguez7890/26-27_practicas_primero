<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

$vector =[];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 1", []);
cuerpo($vector);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo($vector)
{
 ?>
<!--5.- Rellenar un array con el siguiente contenido.
        $vector=array();
        $vector[1]="esto es una cadena";
        $vector["posi1"]=25.67;
        $vector[]=false;
        $vector["ultima"]=array(2,5,96);
        $vector[56]=23;
Mostrar mediante bucles foreach el contenido del array con la siguiente salida:
        - posicion XXX contenido (tipo) YYYYY
        - Según el tipo del contenido
        o Si es un array mostrarlo mediante un foreach.
        o Si es un entero poner Entero con valor DDD, en binario BBB
        o Si es un real DDD que al cuadrado es DDD
        o Si es una cadena -CCCCo Si es un booleano BBB y su opuesto XXX
        Las palabras en mayúscula representan un valor concreto de lo pedido
El array se definirá en el controlador y se visualizará en la vista.
-->

<?php

echo "Generando el array (reyenandolo)";

 $vector=array();
        $vector[1]="esto es una cadena";
        $vector["posi1"]=25.67;
        $vector[]=false;
        $vector["ultima"]=array(2,5,96);
        $vector[56]=23;
     
echo "Mostrando el array según las condiciones";

    //si es un array lo muestro
    if(is_array($vector)){

        //primero motramos el tipo y la posicion de cada cosa
        //count == .lenghs
        foreach($vector as $posicion => $elemento) {


           //Mostramos la posicion y el tipo de lo que hay dentro
            echo "<br><strong>Posicion: ".$posicion." Tipo: ".gettype($elemento)."</strong>";

            //Si es un array
            if(is_array($elemento) ){

            //muestro el elemento que hay dentro

                echo "<br>Mostrando array: ";
                foreach($elemento as $elem){
                    echo " ".$elem;
                }
            }

            //si es entero
            if(is_int($elemento)){

                 echo "<br>Numero entero con valor: ".$elemento." vale en binario: ".decbin($elemento);


            }

            //Si es una cadena Si es una cadena
            if(is_string($elemento)){

                echo "<br>".$elemento;
            }

            //Si es booleano
            if(is_bool($elemento)){

                echo "<br>Valor booleano con valor: ".($elemento?" True":" False");
            }

        }


    }





}