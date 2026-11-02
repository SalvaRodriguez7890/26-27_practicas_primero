<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador

$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Index pruebas");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************






//vista
function cabecera() {}

//vista
function cuerpo()
{
?>
    <br><br>
    Hola, estás en Index.php

    <br>
  
                <lu>
                    <li><a href="/aplicacion/pruebas/basicas.php">Pruebas Básicas</a></li>
                    <li><a href="/aplicacion/pruebas/index_funciones.php">Pruebas Funciones</a></li>
                    <li><a href="/aplicacion/pruebas/Clases.php">Pruebas Clases</a></li>
                    
                  
                </lu>

<?php
}
