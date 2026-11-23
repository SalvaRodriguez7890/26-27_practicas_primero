<?php
//en este archivo voy a crear la imagen aparte

include_once(dirname(__FILE__) . "/../../cabecera.php");

//Creo la imagen con la funcion crearImagenGD de mi nueva biblioteca
$imagen = crearImagenGD($arrayPuntos);

//si la imagen por lo que sea no se muestra por algun erro con el metodo PaginaError muestro un mensaje
if ($imagen === false) {
    paginaError("No se ha podido crear la imagen (GD no esta disponible)");
    exit;
}

//Creo la variable del nombre de la imagen
$nombreSalida = basename(rutaImagenPuntos());

header('Content-Type: image/jpeg');
header('Content-Disposition: attachment; filename="' . $nombreSalida . '"');

//le paso null para descargar la imagen cuando se pida
imagejpeg($imagen, null, 90);

//termino la ejecucion
exit;