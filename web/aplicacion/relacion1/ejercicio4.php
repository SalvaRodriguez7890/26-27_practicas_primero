<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

$arrayPiramide =[];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 1", []);
cuerpo($arrayPiramide);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo($arrayPiramide)
{
 ?>
<!--4- Generar un array con los siguientes valores mostrándolos posteriormente con foreach. El array se
debe generar usando bucles for.
1
2 2
3 3 3
4 4 4 4
5 5 5 5 5
Declarar la constante FILAS que se rellenará con el número de filas que se deben crear. Repetir
lo anterior usando FILAS para crear el array y visualizarlo.
Los datos se definirán en el controlador y se visualizarán en la vista.-->

<?php

echo "Generando el array (reyenandolo)";

$fila=6;

//Uso dos bucles for
//El primer bucle marca el numero a escribir
for ($i=1; $i<=$fila; $i++){
    //inicializo primero la posicion donde en el segundo bucle vamos a meter los datos
    //ya que si no lo hacia la linea 55 (la concatenacion) me daba error.
    $arrayPiramide[$i]= "";
    //En el segundo marco las veces que se repite ese numero en cada hueco del array
    for($j=1; $j<=$i; $j++){

        //al hueco del array le concateno con el .= el valor de $i en ese momento
        $arrayPiramide[$i].= $i;
    };

};

echo "<br> Mostrando array:";


foreach ($arrayPiramide as $elementos) {
        echo "<br>".$elementos;
        }
     
}