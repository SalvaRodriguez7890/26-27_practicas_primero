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
        "TEXTO" => "eje. Ficheros"
    ]
];

// Datos de ejemplo que se guardarán en datos.txt la primera vez
$datos = [
    ["nombre", "vicente", 16],
    ["noemi", "ordenador", 12331, 12]
];

// Solo se crea datos.txt si todavía no existe
// (así no se sobrescribe cada vez que se sube un archivo)
if (!file_exists(RUTABASE . "/ficheros/datos.txt")) {
    // Intenta escribir los datos de ejemplo; si la función devuelve false, hubo un error
    if (!escribirFichero("datos.txt", $datos)) {
        // Muestra una página de error con el mensaje indicado
        paginaError("No se han podido guardar los datos en archivo");
        // Detiene la ejecución del script
        exit;
    }
}

// Se vacía el array para rellenarlo con lo que realmente hay en el fichero
$datos = [];

// Lee datos.txt y guarda su contenido en $datos (paso por referencia); si falla, devuelve false
if (!leerDeFichero("datos.txt", $datos)) {
    // Muestra una página de error
    paginaError("No se han podido leer los datos en archivo");
    // Detiene la ejecución
    exit;
}

// Array donde se acumularán los errores de validación, agrupados por campo
$errores = [];

//"DESCARGA AL VUELO"
if (isset($_POST["descargar"])) {

    $nombreSalida="datos.txt";

    header('Content-Type:'.'text/plain');

    header('Content-Disposition:attachment;filename="'.$nombreSalida.'"');

    echo "Esto es lo que va a en la respuesta".PHP_EOL;
    echo "Y por tanto en el fichero".PHP_EOL;

    exit;


}



// Solo se entra aquí si se ha pulsado el botón "Enviar fichero" (name="subida")
if (isset($_POST["subida"])) {

    // Recoge el nombre escrito por el usuario; si no existe usa "" y trim quita espacios de los extremos
    $nombreElegido = trim($_POST["nombre_archivo"] ?? "");

    // --- Validación del nombre elegido ---

    // Si el nombre está vacío, se añade un error
    if ($nombreElegido === "") {
        $errores["nombre_archivo"][] = "Debes indicar un nombre para el archivo";
    // Si no está vacío, comprueba con una expresión regular que solo tenga letras, números, - y _
    // (esto evita nombres peligrosos como ../../index que escaparían de la carpeta)
    } elseif (!preg_match('/^[A-Za-z0-9_\-]+$/', $nombreElegido)) {
        $errores["nombre_archivo"][] = "El nombre solo puede contener letras, números, guiones y guiones bajos";
    }

    // --- Validación del fichero subido ---

    // Si PHP no ha recibido ningún fichero con el nombre "archivo"
    if (!isset($_FILES["archivo"])) {
        $errores["archivo"][] = "Fichero no se ha indicado";
    // Si la subida ha tenido algún problema (no seleccionado, demasiado grande, etc.)
    } elseif ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
        $errores["archivo"][] = "Fichero indicado no es correcto";
    // Si la subida fue correcta, se comprueba que sea un PDF
    } else {
        // Obtiene la extensión del nombre original del fichero y la pasa a minúsculas (.PDF = .pdf)
        $extension = strtolower(pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION));
        // Si la extensión no es pdf, se añade un error
        if ($extension !== "pdf") {
            $errores["archivo"][] = "Solo se permiten archivos .pdf";
        }

        // Comprobar el tipo real del contenido (no solo la extensión, que se puede falsificar)
        // Crea un objeto finfo que devuelve el tipo MIME del contenido
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        // Analiza el fichero temporal subido y obtiene su tipo MIME real
        $mime = $finfo->file($_FILES["archivo"]["tmp_name"]);
        // Si el contenido real no es un PDF, se añade un error
        if ($mime !== "application/pdf") {
            $errores["archivo"][] = "El contenido del archivo no es un PDF válido";
        }
    }

    // Si no hay ningún error de validación, se procede a guardar el fichero
    if (!$errores) {
        // Construye la ruta final: carpeta ficheros + nombre elegido + extensión .pdf forzada
        $nombreSubida = RUTABASE . "/ficheros/" . $nombreElegido . ".pdf";

        // Si ya existe un archivo con ese nombre, no se sobrescribe y se avisa
        if (file_exists($nombreSubida)) {
            $errores["nombre_archivo"][] = "Ya existe un archivo con ese nombre";
        // Mueve el fichero desde la carpeta temporal a su destino definitivo; si falla, error
        } elseif (!move_uploaded_file($_FILES["archivo"]["tmp_name"], $nombreSubida)) {
            $errores["archivo"][] = "El archivo no se ha podido subir";
        }
    }
}

// Dibuja la plantilla de la vista

// Abre el <html> y el <head> con el título de la página
inicioCabecera("APLICACION PRIMER TRIMESTRE");
// Añade contenido extra dentro del <head> (función definida más abajo)
cabecera();
// Cierra el <head>
finCabecera();
// Abre el <body> con el título de la sección y la barra de navegación
inicioCuerpo("Pruebas Ficheros", $barra);
// Dibuja el contenido principal: errores, tabla y formulario
cuerpo($datos, $errores);
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
// Recibe los datos a mostrar en la tabla y los errores de validación
function cuerpo(array $datos, array $errores)
{
    // Si hay al menos un error, se muestran
    if (count($errores) != 0) {
        // Recorre cada campo con errores (nombre_archivo, archivo...)
        foreach ($errores as $campo => $mensajes) {
            // Recorre cada mensaje de error de ese campo
            foreach ($mensajes as $mensaje) {
                // Imprime el mensaje en rojo; htmlspecialchars evita que se inyecte HTML
                echo "<p style='color:red'>" . htmlspecialchars($mensaje) . "</p>";
            }
        }
    // Si no hay errores Y se ha enviado el formulario, la subida fue correcta
    } elseif (isset($_POST["subida"])) {
        // Imprime el mensaje de éxito en verde
        echo "<p style='color:green'>Archivo subido correctamente</p>";
    }
// Cierra PHP para escribir HTML directamente
?>
    <h2>Datos leídos del fichero</h2>
    <table border="1" cellpadding="5">
        <?php // Recorre cada fila del array (cada línea del fichero) ?>
        <?php foreach ($datos as $fila) { ?>
            <tr>
                <?php // Recorre cada columna de la fila actual ?>
                <?php foreach ($fila as $columna) { ?>
                    <?php // Imprime el valor en una celda; (string) lo convierte a texto y htmlspecialchars lo protege ?>
                    <td><?= htmlspecialchars((string)$columna) ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <h2>Subir fichero</h2>
    <?php // enctype multipart/form-data es obligatorio para poder enviar ficheros; action vacío = misma página ?>
    <form enctype="multipart/form-data" action="" method="POST">
        <?php // Campo oculto que indica el tamaño máximo permitido (2 MB) ?>
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
        Nombre del archivo (sin extensión):
        <?php // Campo de texto para el nombre; required impide enviarlo vacío; value conserva lo escrito si hay errores ?>
        <input type="text" name="nombre_archivo" required
               value="<?= htmlspecialchars($_POST['nombre_archivo'] ?? '') ?>" />
        <br><br>
        Enviar este archivo (solo PDF):
        <?php // Selector de fichero; accept filtra en el navegador para mostrar solo PDF (la validación real se hace en PHP) ?>
        <input name="archivo" type="file" accept="application/pdf,.pdf" />
        <?php // Botón de envío; su name="subida" es lo que detecta el controlador con isset($_POST["subida"]) ?>
        <input type="submit" name="subida" value="Enviar fichero" />

        <input type="submit" name="descargar" value="Descargar" />
    </form>
<?php
// Vuelve a abrir PHP para cerrar la función
}

// ---------- FUNCIONES ----------

/**
 * Función para escribir en un fichero
 * @param string $nombre nombre del fichero
 * @param array|null $datos valores
 * @return bool true si va bien, false si hay error
 */
function escribirFichero(string $nombre, ?array $datos = null): bool
{
    // Si no se han pasado datos (null), no hay nada que escribir: devuelve error
    if (!isset($datos)) {
        return false;
    }

    // Ruta de la carpeta donde se guardan los ficheros
    $ruta = RUTABASE . "/ficheros";

    // Si la carpeta no existe, se crea (true = crea también carpetas intermedias)
    if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true);
    }
    // Añade el nombre del fichero a la ruta para obtener la ruta completa
    $ruta .= "/" . $nombre;

    // Abre el fichero en modo escritura ("w" lo crea o lo vacía si ya existía)
    $fic = fopen($ruta, "w");
    // Si no se ha podido abrir, devuelve error
    if (!$fic) {
        return false;
    }

    // Recorre cada fila del array de datos
    foreach ($datos as $fila) {
        // Variable donde se construye la línea de texto
        $linea = "";
        // Recorre cada columna de la fila
        foreach ($fila as $columna) {
            // Añade el valor seguido de una coma como separador
            $linea .= $columna . ",";
        }
        // Añade el salto de línea al final
        $linea .= "\r\n";
        // Escribe la línea en el fichero
        fputs($fic, $linea);
    }

    // Cierra el fichero para liberar el recurso
    fclose($fic);
    // Todo ha ido bien
    return true;
}

/**
 * Función para leer de un fichero
 * @param string $nombre nombre del fichero
 * @param array $datos array (por referencia) donde se guardan los datos leídos
 * @return bool true si va bien, false si hay error
 */
function leerDeFichero(string $nombre, array &$datos): bool
{
    // Construye la ruta completa del fichero a leer
    $ruta = RUTABASE . "/ficheros/" . $nombre;

    // Para leer, el fichero debe existir (no se crea nada)
    if (!file_exists($ruta)) {
        return false;
    }

    // Abre el fichero en modo lectura ("r")
    $fic = fopen($ruta, "r");
    // Si no se ha podido abrir, devuelve error
    if (!$fic) {
        return false;
    }

    // Se borra el contenido del array
    $datos = [];

    // Se lee el fichero línea a línea hasta que fgets devuelva false (fin del fichero)
    while (($linea = fgets($fic)) !== false) {
        // trim quita espacios y los saltos de línea (\r y \n) de los extremos
        $linea = trim($linea);
        // Ignora las líneas vacías
        if ($linea != "") {
            // Quita la coma final sobrante que añadió escribirFichero
            $linea = rtrim($linea, ",");
            // Separa la línea por comas y añade el resultado como una nueva fila del array
            $datos[] = explode(",", $linea);
        }
    }

    // Cierra el fichero
    fclose($fic);
    // Todo ha ido bien
    return true;
}