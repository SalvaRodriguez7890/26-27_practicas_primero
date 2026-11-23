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
        "TEXTO" => "eje. Imagen"
    ]
];

// Ruta completa del fichero donde se guarda la imagen (carpeta del servidor + nombre del fichero)
$nombreFichero = RUTABASE . "/imagenes/pruebaImagen.jpg";

// Solo se crea la imagen si todavía no existe en el disco (así no se regenera en cada carga)
$crear = !file_exists($nombreFichero);

if ($crear) {
    // Crea una imagen en blanco de 250x250 píxeles; por defecto el fondo es negro
    $imagen = imagecreatetruecolor(250, 250);

    // Reserva el color azul (R=0, G=0, B=255) en la imagen
    $color = imagecolorallocate($imagen, 0, 0, 255);

    // Dibuja un rectángulo relleno azul: esquina superior izquierda (10,10) y esquina inferior derecha (190,190)
    imagefilledrectangle($imagen, 10, 10, 190, 190, $color);

    // Reserva el color blanco (255,255,255), reutilizando la variable $color
    $color = imagecolorallocate($imagen, 255, 255, 255);

    // Dibuja un rectángulo blanco muy fino (de 10,10 a 100,15) que simula una línea
    imagefilledrectangle($imagen, 10, 10, 100, 15, $color);

    // Guarda la imagen como JPEG en la ruta indicada
    imagejpeg($imagen, $nombreFichero);

    // Libera la memoria que ocupaba la imagen
    imagedestroy($imagen);
}

// ---------- ZONA DE DESCARGA ----------

// Si en la URL viene el parámetro "descargar" (?descargar), se envía la imagen al navegador
if (isset($_GET["descargar"])) {

    // Carga la imagen ya guardada en disco (antes apuntaba a un fichero inexistente)
    $imagen = imagecreatefromjpeg($nombreFichero);

    // Reserva un color morado para la marca de agua
    $color = imagecolorallocate($imagen, 255, 255, 255);

    // Escribe el texto "MarcaAgua" en la posición (10,150), fuente interna número 2
    // (imagestring escribe una cadena completa; imagechar solo escribiría la "M")
    imagestring($imagen, 2, 10, 150, "MarcaAgua", $color);

    // Indica al navegador que lo que recibe es una imagen JPEG
    header('Content-Type: image/jpeg');

    // Fuerza la descarga (en vez de mostrarla) y le pone el nombre "imagen.jpg"
    header('Content-Disposition: attachment; filename="imagen.jpg"');

    // Envía la imagen directamente al cliente (sin segundo parámetro va a la salida estándar)
    imagejpeg($imagen);

   
    // Detiene el script para que no se añada el HTML de la plantilla a la imagen (si no, queda corrupta)
    exit;
}

// ---------- DIBUJO DE LA PLANTILLA ----------

// Abre el <html> y el <head> con el título de la página
inicioCabecera("APLICACION PRIMER TRIMESTRE");
// Añade contenido extra dentro del <head> (función definida más abajo)
cabecera();
// Cierra el <head>
finCabecera();
// Abre el <body> con el título de la sección y la barra de navegación
inicioCuerpo("Pruebas Imagen", $barra);
// Dibuja el contenido principal de la página (imagen y enlace de descarga)
cuerpo();
// Cierra el <body> y el <html>
finCuerpo();

// **********************************************************

// ---------- VISTA ----------

// Función para añadir etiquetas extra al <head>
function cabecera()
{
    // Aquí puedes añadir etiquetas del <head> (css, scripts...)
}

// Función que dibuja el contenido principal de la página
function cuerpo()
{
    // Cierro PHP para escribir HTML directamente
    ?>
        <br>
        <br>
        <!-- Muestra la imagen guardada; la ruta es la URL pública (relativa a la raíz web), no la ruta del servidor -->
        <img src="/imagenes/pruebaImagen.jpg" alt="Imagen">
        <!-- Enlace que recarga esta misma página con ?descargar para activar la zona de descarga -->
        <a href="?descargar">Descargar</a>
    <?php
}