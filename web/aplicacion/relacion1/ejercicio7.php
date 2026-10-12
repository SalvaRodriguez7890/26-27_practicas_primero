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
7.- Mostrar el funcionamiento de las fechas. Se harán todos los apartados usando la serie de funciones
para gestión de fecha. Se repetirán todos los ejercicios usando la clase DateTime.
        - Mostrar la fecha actual en el formato “d/m/Y”
        - Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”.
        - Mostrar la hora actual en el formato “hh:mm:ss”
        - Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45.
        - Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas
Se definirán las fechas y se visualizarán directamente en la vista. ( no se definirán en el
controlador)

-->

<?php

    echo "<strong>Fecha en formato 'd/m/y'</strong>";
    echo "<br>".date("d/m/y");
    echo "<br><strong>Fecha en largo </strong>";
    $fechaLarga = new IntlDateFormatter(
    'es_ES',  
    "'Dia' d, 'mes' MMMM, 'año' yyyy, 'dia de la semana' EEEE"
);  echo "<br>".$fechaLarga->format(time());
}