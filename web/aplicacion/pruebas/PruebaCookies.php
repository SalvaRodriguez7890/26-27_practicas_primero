<?php
// Incluye el archivo cabecera.php (dos carpetas más arriba), que define RUTABASE y las funciones de plantilla
include_once(dirname(__FILE__) . "/../../cabecera.php");

// ---------- CONTROLADOR ----------

// Array con los elementos de la barra de navegación (migas de pan)
$barra = [
    [
        // Texto que se muestra en el primer enlace
        "TEXTO" => "inicio",
        // Dirección a la que apunta el enlace
        "ENLACE" => "/index.php",
    ],
    [
        // Texto del segundo enlace
        "TEXTO" => "pruebas",
        // Dirección del segundo enlace
        "ENLACE" => "/aplicacion/basicas.php",
    ],
    [
        // Último elemento: página actual, sin enlace
        "TEXTO" => "PruebaCookies"
    ]
];

//setcookie("numero", mt_rand(1,100), time()+60*60*24);

$valor = 0;
//$valor = $_COOKIE["numero"];

session_start();

//$_SESSION["nombre"] = "salva";



// Dibuja la plantilla de la vista

// Abre el <html> y el <head> con el título de la página
inicioCabecera("APLICACION PRIMER TRIMESTRE");
// Añade contenido extra dentro del <head> (función definida más abajo)
cabecera();
// Cierra el <head>
finCabecera();
// Abre el <body> con el título de la sección y la barra de navegación
inicioCuerpo("Pruebas Cookies");
// Dibuja el contenido principal: errores, tabla y formulario
cuerpo($valor);
// Cierra el <body> y el <html>
finCuerpo();

// **********************************************************

// ---------- VISTA ----------


function cabecera()
{
    
}

// Función que dibuja el contenido principal de la página

function cuerpo($valor)
{
    echo "<h1>Titulo</h1>";
   

}



