<?php 
define("RUTABASE", dirname(__FILE__));
//define("MODO_TRABAJO","produccion"); //en "produccion o en desarrollo
define("MODO_TRABAJO","desarrollo"); //en "produccion o en desarrollo

if (MODO_TRABAJO=="produccion"){
    error_reporting(0);
    date_default_timezone_get('Europe/Berlin');
}
    else 
        error_reporting(E_ALL);  

spl_autoload_register(function ($clase){
    $ruta=RUTABASE."/scripts/clases/";
    $fichero=$ruta."$clase.php";
    
    if (file_exists($fichero))
        {
            require_once($fichero);
        }
      else
        {
            throw new Exception("La clase $clase no se ha encontrado.");
        }
});


include(RUTABASE."/aplicacion/plantilla/plantilla.php");

//creo todos los objetos que necesita mi aplicación

//Cargo mi libreria en la cabecera para que sea accesible desde todos lados
include_once(RUTABASE."/scripts/librerias/puntos.php");

//Cargo el array con la funcion
$arrayPuntos = cargarPuntos();

if (!file_exists(rutaImagenPuntos())) {
    guardarImagenPuntos($arrayPuntos);
}
