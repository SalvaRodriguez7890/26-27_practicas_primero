<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador



$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "ENLACE" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 5",
        "ENLACE" =>"/aplicacion/relacion5/ejercicios.php"
    ]
   
];



$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 5", $barraUbi);
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
    
    <ul>
        <li>
            <a href="./ejercicio1.php">Ejercicio 1</a>
        </li>
        <li>
            <a href="./ejercicio2.php">Ejercicio 2</a>
        </li>
   
    </ul>
   
    
<?php


}

