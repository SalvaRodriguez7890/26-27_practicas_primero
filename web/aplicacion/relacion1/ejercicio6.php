<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

$vector =array("primera" =>12.56, 24=>true, 67 =>23.76);;

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
<!--
6.- Con el array $vector=array("primera" =>12.56, 24=>true, 67 =>23.76);
- Simular el funcionamiento de foreach ($array as $indice => $valor) usando las funciones de
recorrido para mostrar tanto los índices como los valores del array anterior.

- Simular el funcionamiento de foreach usando las funciones array_keys y array_values para
mostrar tanto los índices como los valores del array anterior.
El array se definirá en el controlador y se realizarán las operaciones en la vista.

-->

<?php

    echo "Mostrando indices y valores del array \$vector con el foreach(\$array as \$indice => \$valor)";
        foreach ($vector as $indice => $valor){

            echo "<br>Valor: <strong>".$valor."</strong> cuyo indice es: <strong>".$indice."</strong>";

        }

    echo "<br><br>Funcionamiento de foreach usando array_keys y array_values";
        //Las funciones array_keys y array_value te sacan un array con las "keys" quen o indices del array a elegir
        //y array_value te saca el valor que hay dentro de cada index por lo que creamos dos array a partir de estos
        $claves = array_keys($vector);
        $valores = array_values($vector);

        //Simulamos el funcionamiento del foreach usando un for normal para sacar los indices y las claves
        for ($i = 0; $i < count($vector); $i++) {
            // Obtenemos la clave y el valor usando la misma posición numérica $i
            $indice = $claves[$i];
            $valor = $valores[$i];
            
            echo "<br>Valor: <strong>".$valor."</strong> cuyo indice es: <strong>".$indice."</strong>";
        }

}