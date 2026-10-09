<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

$array1 = [];
$array2 = [];
$array3 = [];

$array = [
    1,
    34,
    "nueva"
];

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 1", []);
cuerpo($array1, $array2, $array3, $array);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo($array1, $array2, $array3, $array)
{
 ?>
    <!--3.- Se quiere:
        a) Crear una variable de tipo array.
        b) Rellenar las posiciones 1, 16, 54 con valores cualquiera.
        c) Añadir el valor 34 al final
        d) Añadir los valores “cadena”, true, 1.345 en las posiciones “uno”, “dos” y “tres”
        e) Rellenar la posición “ultima” con el array (1,34,”nueva”);
        - Hacer lo anterior creando y rellenando el array usando varias sentencias.
        - Hacer lo anterior usando una sola sentencia con array;
        - Hacer lo anterior usando una sola sentencia con []
        - Recorrer los tres arrays usando foreach mostrando todos los valores de los arrays creados
        Los arrays se definirán en el controlador y se visualizarán en la vista.-->


<?php

    echo "<p>Rellenando con varias sentencias</p>";

   //Añadir a los index 1, 16 y 54
   $array1[1] = "Pera";
   $array1[16] = "Salva";
   $array1[54] = true;
   //para la posicioon final no le indico index
   $array1[] = 34;
    
   //añadimos "cadena", true, 1.345 en las posciiones que nos indica
   $array1["uno"] = "cadena";
   $array1["dos"]= true;
   $array1["tres"] = 1.345;

   //añadimos el ultimo array
   $array1["ultima"] = $array;

   echo "<p>Rellenando con una sentencia</p>";
    $array2 = array(
                    1 => "Pera",
                    16 => "Manzana",
                    54 => "Plátano",
                    "uno" => "cadena",
                    "dos" => true,
                    "tres" => 1.345,
                    "ultima" => array(1, 34, "nueva")
                );

    //Una sola sentencia con []
    $array3 = [
                1 => "Pera",
                16 => "Manzana",
                54 => "Plátano",
                "uno" => "cadena",
                "dos" => true,
                "tres" => 1.345,
                "ultima" => [1, 34, "nueva"]
            ];


}