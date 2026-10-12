<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");
$arrayDado = [
    "Numero 1" => 0,
    "Numero 2" => 0,
    "Numero 3" => 0,
    "Numero 4" => 0,
    "Numero 5" => 0,
    "Numero 6" => 0
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 1", []);
cuerpo($arrayDado);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo(array $arrayDado)
{
 ?>
    <!--2.- Simular el lanzamiento de un dado (6 veces) (usar un bucle for, mt_rand con parametros). Además
        contar el número de veces que aparece cada lado si se hicieran N lanzamientos al estilo (N lo
        definiremos como constante) (usar un bucle while, mt_rand sin parametros).
        Se deben usar arrays para almacenar los datos de las tiradas. Los arrays deben obtenerse en la
        parte del controlador y visualizarse los resultados en la vista. Los arrays se pasarán como parámetros a la
        vista (nunca como variables globales)-->
    <br>
    <H1>Ejer2.Lanzamiento de dado usando el mt_rand()</H1>
    <p> <strong>-La funcion mt_rand() saca numeros aleatorios, de forma que podemos indicar el rando de esos numeros aleatorios. </strong></p>
    <p>Por ejemplo, en este caso queremos numeros entre 1 y 6 porque vamos a simular un dado, para ello ponesmo mt_rand(1,6)</p>
    <p>Vamos a crear una variable llamada $var1, y dentro de un bucle le vamos a dar cada valos usando mt_rand(1,6) y lo vamos a mostar, de forma que 
        cada vuelta es una tirada del dado, podremos elegir cuantas veces queremos tirar el dado
    </p>
       
    <?php

    
    

    lanzamientoDado($arrayDado);


}

/**
 * Undocumented function
 *
 * @param [type] Number
 * @return void
 */
function lanzamientoDado(array $arrayDado){

    $cont = 1;


    echo "<p> Hemos tirado el dado 6 veces";
    $var2 = 0;
 

    do{

    $var2 = mt_rand(1,6);

    echo "<p>Lanzamiento $cont: Ha salido el numero $var2</p>";

    switch($var2){

    case 1: $arrayDado["Numero 1"] +=1; break;
    case 2: $arrayDado["Numero 2"] +=1; break;
    case 3: $arrayDado["Numero 3"] +=1; break;
    case 4: $arrayDado["Numero 4"] +=1; break;
    case 5: $arrayDado["Numero 5"] +=1; break;
    default : $arrayDado["Numero 6"] +=1;
    }
    $cont += 1;
    }while($cont <= 6);


    
    echo "<p><strong>El 1 ha salido {$arrayDado['Numero 1']} veces</strong></p>";
    echo "<p><strong>El 2 ha salido {$arrayDado['Numero 2']} veces</strong></p>";
    echo "<p><strong>El 3 ha salido {$arrayDado['Numero 3']} veces</strong></p>";
    echo "<p><strong>El 4 ha salido {$arrayDado['Numero 4']} veces</strong></p>";
    echo "<p><strong>El 5 ha salido {$arrayDado['Numero 5']} veces</strong></p>";
    echo "<p><strong>El 6 ha salido {$arrayDado['Numero 6']} veces</strong></p>";

}