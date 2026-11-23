<?php
//libreria de validacion para poder validar cuando creo un punto
include_once(dirname(__FILE__) . "/validacion.php");

//libreria para crear puntos.

//valores para las coordenadas y la imagen
const COORD_MAX = 500;

const ANCHO_IMAGEN = 501;
const ALTO_IMAGEN = 501;

/**
 * Funcion que saco el navegaDOR
 *
 * @return string
 */
function sufijoCliente(): string {

    //la ip del cliente la da el servidor en $_SERVER["REMOTE_ADDR"]. Si por lo que sea no
    //existe pongo "desconocida" para que el nombre del fichero nunca quede vacio
    $ip = $_SERVER["REMOTE_ADDR"] ?? "desconocida";

    //dejo la ip solo con letras y numeros: los puntos de una ip v4 (192.168.2.1) y los dos
    //puntos de una ip v6 pasan a ser "_". Asi evito caracteres raros en un nombre de fichero
    $ip = preg_replace('/[^A-Za-z0-9]/', "_", $ip);

    //el navegador lo saco del User-Agent que envia el cliente (puede venir vacio)
    $agente = $_SERVER["HTTP_USER_AGENT"] ?? "";

    //Con stripos busco la primera ocurrencia para sacar el navegador, algunos navegadores usan chrome, por lo que lo dejo para el final
    if (stripos($agente, "Edg") !== false) {
        $navegador = "edge";
    } elseif (stripos($agente, "OPR") !== false || stripos($agente, "Opera") !== false) {
        $navegador = "opera";
    } elseif (stripos($agente, "Firefox") !== false) {
        $navegador = "firefox";
    } elseif (stripos($agente, "Chrome") !== false) {
        $navegador = "chrome";
    } elseif (stripos($agente, "Safari") !== false) {
        $navegador = "safari";
    } else {
        //si no reconozco el navegador le meto "otro"
        $navegador = "otro";
    }

    return $ip . "_" . $navegador;
}

/**
 * Funcion para sacar la ruta completa del fichero de puntos
 *
 * @return string
 */
function rutaFicheroPuntos(): string {
    return RUTABASE . "/ficheros/puntos_" . sufijoCliente() . ".dat";
}

/**
 * ruta para la imagen jpg
 *
 * @return string
 */
function rutaImagenPuntos(): string {
    return RUTABASE . "/imagenes/puntos/imagen_" . sufijoCliente() . ".jpg";
}

/**
 * Ruta para el src de la etiqueta de la imgane
 *
 * @return string
 */
function urlImagenPuntos(): string {
    return "/imagenes/puntos/imagen_" . sufijoCliente() . ".jpg";
}

/**
 * Funcion que escribe los datos del punto (como el toString dentro de punto)
 *
 * @param Punto $punto
 * @return string
 */
function puntoALinea(Punto $punto): string {
    return $punto->getX() . " ; " . $punto->getY() . " ; " . $punto->getColor() . " ; " . $punto->getGrosor();
}

/**
 * Funcion que a partir de una linea con el formato " ejex ; ejey ; color ; grosor " devuelve un punto (si es que los datos son correctos)
 * es la que uso al leer el fichero
 *
 * @param string $linea
 * @return Punto|null
 */
function lineaAPunto(string $linea): ?Punto {

    //con explode separo la linea por los ";" . Tienen que salir exactamente 4: x, y, color y grosor
    $partes = explode(";", $linea);
    if (count($partes) != 4) {//compruebo que ssea si o si 4 si es diferente devuevl nulo
        return null;
    }

    //quito los espacios (y el posible \r de los ficheros de windows) de cada trozo,
    //porque el formato es "x ; y ; color ; grosor" con espacios alrededor de los ;
    $partes = array_map("trim", $partes);

    //las coordenadas y el grosor llegan como texto, asi que los paso a entero con filter_var
    $x = filter_var($partes[0], FILTER_VALIDATE_INT);
    $y = filter_var($partes[1], FILTER_VALIDATE_INT);
    $grosor = filter_var($partes[3], FILTER_VALIDATE_INT);

    if ($x === false || $y === false || $grosor === false) {
        return null;
    }//Devuelvo nulo si alguno falla

    //compruebo con mi libreria de validacion que x e y estan entre 0 y 500, igual que en el
    //formulario (si no lo estan la funcion devuelve false)
    if (!\VALFINAL\validaEntero($x, 0, COORD_MAX, 0) || !\VALFINAL\validaEntero($y, 0, COORD_MAX, 0)) {
        return null;
    }

    //creo el Punto. El constructor de la clase Punto comprueba que el color exista en
    //Punto::COLORES y el grosor en Punto::GROSORES, y lanza una excepcion si no es asi.
    //La capturo y devuelvo null para tratar "linea mala" siempre de la misma forma
    try {
        return new Punto($x, $y, $partes[2], $grosor);
    } catch (Exception $e) {
        return null;
    }
}

/**
 * Fuincion que a partir del fichero rellena el arrayPuntos en la cabecera, si es la primera vez el array queda 
 * vacio y si el fichero no existe todavia tambien
 *
 * @return array
 */
function cargarPuntos(): array {

    $ruta = rutaFicheroPuntos();

    //si el cliente no tiene todavia fichero, no tiene puntos
    if (!file_exists($ruta)) {
        return [];
    }

    //file() devuelve un array con una posicion por cada linea del fichero.
    //FILE_IGNORE_NEW_LINES quita el salto de linea del final de cada una y
    //FILE_SKIP_EMPTY_LINES se salta las lineas en blanco
    $lineas = file($ruta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lineas === false) {
        return [];
    }

    //convierto cada linea en un Punto y me quedo solo con las correctas
    $puntos = [];
    foreach ($lineas as $linea) {
        $punto = lineaAPunto($linea);
        if ($punto !== null) {
            $puntos[] = $punto;
        }
    }
    return $puntos;
}

/**
 * Funcion para cuando añadimos, borramos o se sube algun archivo con puntos reescribo el fichero entero
 * ademas guarda el array Puntos en el fichero (cada linea es un punto)
 *
 * @param array $puntos
 * @return boolean
 */
function guardarPuntos(array $puntos): bool {

    $ruta = rutaFicheroPuntos();

    //si la carpeta del fichero no existe la creo
    if (!file_exists(dirname($ruta))) {
        mkdir(dirname($ruta), 0777, true);
    }

    //construyo el contenido: una linea por punto
    $contenido = "";
    foreach ($puntos as $punto) {
        $contenido .= puntoALinea($punto) . PHP_EOL;
    }

    //LOCK_EX bloquea el fichero mientras escribo, por si dos peticiones del mismo cliente
    //llegan a la vez. file_put_contents devuelve false si falla (me lo sugerió claude, ya que fue lo que pasó en clase mientras nos mostrabas la practica y se creaban muchos puntos solos)
    return file_put_contents($ruta, $contenido, LOCK_EX) !== false;
}

/**
 * Funcion que genera la imagen a partir del array puntos
 *
 * @param array $puntos
 * @return GdImage|false
 */
function crearImagenGD(array $puntos): GdImage|false {

    //creo la imagen en blanco con el marco negro 
    $imagen = imagecreatetruecolor(ANCHO_IMAGEN, ALTO_IMAGEN);
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    $negro = imagecolorallocate($imagen, 0, 0, 0);

    //relleno todo de blanco y dibujo el marco negro alrededor (aqui uso las variables del tamaño de la imagen )
    imagefill($imagen, 0, 0, $blanco);
    imagerectangle($imagen, 0, 0, ANCHO_IMAGEN - 1, ALTO_IMAGEN - 1, $negro);

    //diametro en pixeles del circulo segun el grosor del punto (1 fino, 2 medio, 3 grueso)
    //para luego en vez de x sean circulos
    $diametros = [1 => 4, 
                  2 => 8, 
                  3 => 12];

    //Voy dibujando los puntos dentro de la imagen
    foreach ($puntos as $punto) {

        //si el punto cae fuera de la imagen no lo dibujo (esto no va a apasar poque controlamos que e los valores sean menores a 500)
        if ($punto->getX() >= ANCHO_IMAGEN || $punto->getY() >= ALTO_IMAGEN) {
            continue;
        }

        //saco el rgb del color: Punto::COLORES[color en ingles]["rgb"] es un array [rojo, verde, azul]

        [$rojo, $verde, $azul] = Punto::COLORES[$punto->getColor()]["rgb"];

        $color = imagecolorallocate($imagen, $rojo, $verde, $azul);//le meto el RGB de cada punto

        $diametro = $diametros[$punto->getGrosor()]; //creo el diametro a partir del grosor del punto

        //dibujo el punto como un circulo relleno centrado en sus coordenadas
        imagefilledellipse($imagen, $punto->getX(), $punto->getY(), $diametro, $diametro, $color);
    }

    return $imagen; //paso la imagen en el return
}

/**
 * Esta funcion crea la imagen y la guarda en la ruta, selo se usa para crearla la primera vez y cada vez que se borra, añade
 * un punto o se carga un fichero.
 *
 * @param array $puntos
 * @return boolean
 */
function guardarImagenPuntos(array $puntos): bool {

    $imagen = crearImagenGD($puntos);//creo una imagen usando la funcion de antes

    if ($imagen === false) {//si da fallo pues devuelvo false
        return false;
    }

    $ruta = rutaImagenPuntos(); //saco la ruta con la funcion

    //si la carpeta imagenes/puntos no existe la creo
    if (!file_exists(dirname($ruta))) {
        mkdir(dirname($ruta), 0777, true);
    }

    //imagejpeg guarda la imagen en el fichero (el 90 es la calidad del jpg)
    return imagejpeg($imagen, $ruta, 90);
}