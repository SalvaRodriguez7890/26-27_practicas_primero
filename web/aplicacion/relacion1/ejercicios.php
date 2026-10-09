<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 1", []);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo()
{
 
    ?>
    
    Ejercicios:
    <br>
    <br>
    <a href="./ejercicio1.php">Ejercicio1</a>
    <br>
    <a href="./ejercicio2.php">Ejercicio2</a>
    <br>
<?php
    
     
}