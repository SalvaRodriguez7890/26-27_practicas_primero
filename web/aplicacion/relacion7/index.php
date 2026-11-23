<?php
//incluyo la cabecera
include_once(dirname(__FILE__) . "/../../cabecera.php");

//incluyo la validacion
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");


//controlador



$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "ENLACE" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 7",
        "ENLACE" =>"/aplicacion/relacion7/ejercicios.php"
    ]
];

//variable para los errores
$errores = [];

//array de los valores del punto que ingresamos
$valores = [
        "ejeX" => "",
        "ejeY" => "",
        "color"=> "",
        "grosor"=>""
            ];




//miro si se pulsa el boton 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $accion = $_POST["accion"] ?? "";

    //
    //  zona donde valido y guardo el punto que se le pasa
    //

    //si se ha pulsado el boton guardar empiezo a validar y a meter o no errores
    if($accion == "Guardar"){

        //saco en variables los valores desde el formulario
        $valores["ejeX"] = $_POST["ejeX"];
        $valores["ejeY"] = $_POST["ejeY"];
        $valores["color"] = $_POST["color"];
        $valores["grosor"] = $_POST["grosor"] ;


        // convierto a entero (false si no lo es) porque el $_POST siempre trae strings
        $x = filter_var($valores["ejeX"] ?? "", FILTER_VALIDATE_INT);
        $y = filter_var($valores["ejeY"] ?? "", FILTER_VALIDATE_INT);
        $color = $valores["color"] ?? ""; //el color si o si siempre se elije porque el select tiene uno por defecto
        $grosor = filter_var($valores["grosor"] ?? "", FILTER_VALIDATE_INT);


        //valido el ejeX, si no esta entre 0 y 500, ademas tambien compruebo que los filtros no devuelven false
        if($x === false || !\VALFINAL\validaEntero($x,0,500,2)){
            $errores["x"] = "<p class='mensajeError'>Valor del eje X no está entre 0 y 500</p>";
        }
        //valido el ejeY, si no esta entre 0 y 500 
        if($y === false || !\VALFINAL\validaEntero($y,0,500,2)){
            $errores["y"] = "<p class='mensajeError'>Valor del eje Y no está entre 0 y 500</p>";
        }

        //valido el grosor por si no ha elegido ninguno, usando la constante de grosores del Punto
        if ($grosor === false || !\VALFINAL\validaRango($grosor,Punto::GROSORES,2)) {
            $errores["grosor"] = "<p class='mensajeError'>Debes elegir un grosor</p>";
        }

        if (!\VALFINAL\validaRango($color, Punto::COLORES, 2)) {
                $errores["color"] = "<p class='mensajeError'>Debes elegir un color</p>";
            }
        
        //compruebo que no existan errores 
        if (empty($errores)) {
            try {
                $punto = new Punto($x, $y, $color, $grosor); //Creo el punto
                $arrayPuntos[] = $punto; //lo añado al array de puntos

             //actualizo el fichero de puntos y hago otra vez la imagen para que reflejen el nuevo punto
                if (!guardarPuntos($arrayPuntos) || !guardarImagenPuntos($arrayPuntos)) {
                    paginaError("No se han podido guardar los puntos o la imagen");
                    exit;
                }

                //recargo la pagina con un redirect para que, si el usuario pulsa F5, el navegador
                //no vuelva a enviar el formulario y se añada el punto repetido. El ?ok=guardar es
                //para que al volver se muestre el mensaje de "punto guardado"
                header("Location: /aplicacion/relacion7/index.php?ok=guardar");
                exit;


            } catch (Exception $e) {
                $errores["general"] = "<p class='mensajeError'>" . $e->getMessage() . "</p>";
            }
        }

    }

    //
    //Zona para borrar el punto que queramos
    //
    //si hemos pulsado el de borrar un punto
    if($accion == "borrar"){

            //saco la posicion del combo y le paso por filtro por si acaso
            $indice = filter_var($_POST["punto"] ?? "", FILTER_VALIDATE_INT);

        //Miro que el indice esté entre 0 y la longitud del array -1
        if($indice === false || !\VALFINAL\validaEntero($indice,0,count($arrayPuntos)-1,0)){
            //si no pasa le meto error de borrar
            $errores["borrar"] = "Debes elegir un punto para borrarlo";
        }
        else{
            //si todo ha ido "bien" lo quito del array
            //el array_splice puede borrar una posicion del array que le diga, pero ademas vuelve a numerar 
            //desde 0 el array
            array_splice($arrayPuntos, $indice, 1);

             //actualizo el fichero y la imagen para que reflejen el borrado
            if (!guardarPuntos($arrayPuntos) || !guardarImagenPuntos($arrayPuntos)) {
                paginaError("No se han podido guardar los puntos o la imagen");
                exit;
            }

            //recargo la pagina index.php (con el mensaje de borrado)
            header("Location: /aplicacion/relacion7/index.php?ok=borrar");
            exit;

        }

    }

    ///
    //Zona sube ficheros
    //

    if ($accion == "Subir") {

        // Valido el fichero

        //$_FILES["fichero"]["error"] vale UPLOAD_ERR_NO_FILE si no se ha elegido ningun fichero
        if (!isset($_FILES["fichero"]) || $_FILES["fichero"]["error"] === UPLOAD_ERR_NO_FILE) {

            $errores["fichero"] = "Debes seleccionar un fichero";

        //cualquier otro codigo distinto de UPLOAD_ERR_OK es un error por ejemplo si es muy pesado
        } elseif ($_FILES["fichero"]["error"] !== UPLOAD_ERR_OK) {

            $errores["fichero"] = "El fichero indicado no es correcto";

        } else {

            //compruebo la extension del nombre original que sea la de .txt y en minuscula
            $extension = strtolower(pathinfo($_FILES["fichero"]["name"], PATHINFO_EXTENSION));

            if ($extension !== "txt") {

                $errores["fichero"] = "Solo se permiten ficheros .txt";

            } else {
                //compruebo que el contenido sea texto plano
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                if ($finfo->file($_FILES["fichero"]["tmp_name"]) !== "text/plain") {

                    $errores["fichero"] = "El contenido del fichero no es un txt valido";
                }
            }
        }

         //si el fichero es correcto lo leo y añado los puntos que sean validos
        if (empty($errores)) {

            //el fichero subido esta en una ruta temporal ($_FILES[..]["tmp_name"]); lo leo con
            //file(), una posicion del array por linea y sin lineas vacias
            $lineas = file($_FILES["fichero"]["tmp_name"], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ($lineas === false) {
                $errores["fichero"] = "No se ha podido leer el fichero";
            } else {
                //Hago dos variables para ver cuantas lineas eran correctas
                $anadidos = 0;
                $descartados = 0;

                foreach ($lineas as $linea) {
                    //lineaAPunto devuelve un Punto ya creado si la linea cumple las condiciones o null si no las cumple
                    $punto = lineaAPunto($linea);
                    if ($punto === null) {
                        $descartados++;
                    } else {
                        //los puntos correctos los meto dentro del array
                        $arrayPuntos[] = $punto;
                        $anadidos++;
                    }
                }

                //solo actualizo el fichero y la imagen si se ha añadido algun punto
                if ($anadidos > 0 && (!guardarPuntos($arrayPuntos) || !guardarImagenPuntos($arrayPuntos))) {
                    paginaError("No se han podido guardar los puntos o la imagen");
                    exit;
                }

                //recargo la pagina pasando por la url cuantos puntos se han añadido y cuantas
                //lineas se han descartado, para mostrarlo como mensaje
                header("Location: /aplicacion/relacion7/index.php?ok=subida&add=$anadidos&mal=$descartados");
                exit;
            }
        }
    }

   
}


    //Resultados tras hacer algo con la URL (GET) tras los redirects
    $mensaje = "";
    $accion_get = $_GET["ok"] ?? "";

    //Si se pulsa guardar
    if ($accion_get == "guardar") {

        $mensaje = "Punto guardado correctamente";

    } elseif ($accion_get == "borrar") { // si se borra
        $mensaje = "Punto borrado correctamente";

    } elseif ($accion_get == "subida") { // para subir archivos
        //los contadores vienen por la url, asi que los valido como enteros (si no lo son pongo 0)
        $add = filter_var($_GET["add"] ?? 0, FILTER_VALIDATE_INT);
        $mal = filter_var($_GET["mal"] ?? 0, FILTER_VALIDATE_INT);

        $mensaje = "Puntos añadidos: " . ($add === false ? 0 : $add) . ". Lineas descartadas: " . ($mal === false ? 0 : $mal);
    }

   

$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 7", $barraUbi);
cuerpo($errores,  $arrayPuntos, $valores, $mensaje);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo(array $errores,  array $arrayPuntos, array $valores, string $mensaje)
{

    //Si mensaje no esta vacio lo muestro
    if ($mensaje != "") {
        echo "<p class='mensajeOk'>" . htmlspecialchars($mensaje) . "</p>" . PHP_EOL;
    }
    //error general
    if (isset($errores["general"])) {
        echo "<p class='mensajeError'>" . htmlspecialchars($errores["general"]) . "</p>" . PHP_EOL;
    }
   
  ?>
    
    <h1>INGRESA LAS COORDENADAS</h1>
    <hr>
    <br>

    <form id="coordenadas" method="POST">
        <label>Eje X:</label>
        <input id="ejeX" type="number" name="ejeX">
        <?php
            if(isset($errores["x"])){
                echo $errores["x"].PHP_EOL;
            }
        ?>


        <br>
        <br>
        <label>Eje Y:</label>
        <input id="ejeY" type="number" name="ejeY"><br>
        <?php
            if(isset($errores["y"])){
                echo $errores["y"].PHP_EOL;
            }
        ?>
        <br>
        <label>Color:</label>
        <select id="color" name="color">
            <?php 
                //Creo un foreach dentro del select donde voy creando los options
                //uso la Constante colores, y cojo la clave
                foreach (Punto::COLORES as $clave => $datos){
            ?> 
                    
                <option value="<?= $clave ?>"><?= $datos['nombre'] ?></option>

            <?php 
            }
            ?>
        </select>
    
         <?php
         //por si sale un error en el color
            if(isset($errores["color"])){
                echo "<p class='mensajeError'>" . htmlspecialchars($errores["color"]) . "</p>" . PHP_EOL;
            }
        ?>
            
            
        <br>
        <br>
        <label>Grosor:</label>
        <br>
        <br>
        <?php 
                //Creo un foreach dentro para el grosor donde voy creando los radios
                foreach (Punto::GROSORES as $key => $valor){
            ?> 
                <label>     

                    <input type="radio" name="grosor" value="<?= $key ?>">

                    <?= $valor ?>

                </label>
                <br>

            <?php 
            }
            if(isset($errores["grosor"])){
                echo $errores["grosor"].PHP_EOL;
            }
            ?>
        
        <br>
        <input id="btnGuardar" type="submit" name="accion" value="Guardar">
    </form>
    <br>
    <hr>
    <h2>PUNTOS ALMACENADOS POR AHORA</h2>
    <div>
        <textarea id="textAreaPuntos" cols="50" rows="25" readonly>
             <?php 
            if(count($arrayPuntos)>0){
                
                for($i = 0 ; $i<count($arrayPuntos) ; $i++){
                    
                    echo  $arrayPuntos[$i]->toString().PHP_EOL;
                  
                }

            }
            
            ?>
        </textarea>
    </div>
    <br>
    <div>
        <?php
            //le añado a la url de la imagen la fecha de modificacion del fichero
            $version = file_exists(rutaImagenPuntos()) ? filemtime(rutaImagenPuntos()) : 0;
        ?>
        <!-- Esta imagen se lee del fichero jpg que se creo/actualizo al añadir, borrar o subir puntos -->
        <img id="imagenPuntos" src="<?= urlImagenPuntos() ?>?v=<?= $version ?>" alt="Imagen con los puntos" width="<?= ANCHO_IMAGEN ?>" height="<?= ALTO_IMAGEN ?>">
    </div>
    <br>
        <a class="boton" href="/aplicacion/relacion7/imagen.php">Descargar</a>
    <br>
    <br>
    <hr>
    <br>
    <br>

    <hr>
    <h2>BORRAR PUNTO</h2>

    <form id="borrar" method="POST" action="/aplicacion/relacion7/index.php">
        
        <?php
        //si el arraypuntos contiene algun punto creo un select de puntos
            if(count($arrayPuntos)>0){
        ?>

        <select id="punto" name="punto">

            <?php
            //hago un foreach para recorrer el array y meter un option por punto
                foreach($arrayPuntos as $indice => $pt){
                    
            ?>
                <option value="<?= $indice ?>"> <?= $indice+1?> - <?= $pt->toString()?> </option>
            <?php 
            } 
            ?>
        </select>
        
        <input id="btnBorrar" type="submit" name="accion" value="borrar">

        <?php 
            } else { //si no pues digo que no hay puntos
        ?>

            <p>No hay puntos para borrar</p>
        <?php 
            } 

            //si cuando borro pasa un error
            if(isset($errores["borrar"])){
                echo "<p class='mensajeError'>". $errores["borrar"]. "</p>".PHP_EOL;
            }
            
        ?>

    </form>

    <br>
    <hr>
    <br>

    <h2>SUBIR FICHERO DE PUNTOS</h2>
    <!-- enctype="multipart/form-data" es obligatorio para poder enviar ficheros -->
    <form id="subir" method="POST" action="/aplicacion/relacion7/index.php" enctype="multipart/form-data">
        <!-- le meto un tamaño de 2mb -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
        <input type="file" name="fichero" accept=".txt,text/plain">
        <input type="submit" name="accion" value="Subir">
        <p>Formato de cada linea: <b>x ; y ; color ; grosor</b></p>
        <?php
            if(isset($errores["fichero"])){ //si hay algun error
                echo "<p class='mensajeError'>" . htmlspecialchars($errores["fichero"]) . "</p>" . PHP_EOL;
            }
        ?>
    </form>

<?php
}