<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario=getenv("MYSQL_USER");

// Barra de ubicación

/**
 * Cada elemento es un array de dos posiciones asociativas
 * TEXTO: testo a mostrar en el elemento
 * LINK: Enlace a la pagina. Si esta vaciono tiene enlace
 */
$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 1",
        "LINK" =>""
    ]
];

//dibuja la plantilla de vista
inicioCabecera("RELACIÓN 1");
cabecera();
finCabecera();

inicioCuerpo("RELACIÓN 1",$barraUbi);
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
    <a href="./ejercicio4.php">Ejercicio 4</a>
    <br>
    <a href="./ejercicio5.php">Ejercicio 5</a>
    <br>
    <a href="./ejercicio6.php">Ejercicio 6</a>
    <br>
    <a href="./ejercicio7.php">Ejercicio 7</a>
    <br>
<?php
    
     
}