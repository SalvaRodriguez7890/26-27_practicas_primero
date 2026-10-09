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
    <a href="./ejercicio1.php">Ejercicio 1</a>
    <br>
    <a href="./ejercicio2.php">Ejercicio 2</a>
    <br>
    <a href="./ejercicio3.php">Ejercicio 3</a>
    <br>
<?php
    
     
}