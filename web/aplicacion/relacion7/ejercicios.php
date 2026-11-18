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

//variable para los erroes
$errores = [];
$punto = null;



//miro si se pulsa el boton 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $accion = $_POST["accion"] ?? "";

    //si se ha pulsado el boton guardar empiezo a validar y a meter o no errores
    if($accion == "Guardar"){

        //saco en variables los valores

        // convierto a entero (false si no lo es) porque el $_POST siempre trae strings
        $x = filter_var($_POST["ejeX"] ?? "", FILTER_VALIDATE_INT);
        $y = filter_var($_POST["ejeY"] ?? "", FILTER_VALIDATE_INT);
        $color = $_POST["color"] ?? ""; //el color si o si siempre se elije porque el select tiene uno por defecto
        $grosor = filter_var($_POST["grosor"] ?? "", FILTER_VALIDATE_INT);


        //valido el ejeX, si no esta entre 0 y 500 
        if($x === false || !\VALFINAL\validaEntero($x,0,500,2)){
            $errores["x"] = "<p class='mensajeError'>Valor del eje X no está entre 0 y 500</p>";
        }
        //valido el ejeY, si no esta entre 0 y 500 
        if($y === false || !\VALFINAL\validaEntero($y,0,500,2)){
            $errores["y"] = "<p class='mensajeError'>Valor del eje Y no está entre 0 y 500</p>";
        }

        //valido el grosor por si no a elegido ninguno
        if ($grosor === false) {
            $errores["grosor"] = "<p class='mensajeError'>Debes elegir un grosor</p>";
        }
        
        //compruebo que no existan errores (empty devuelve true si está $errores vacio)
        if (empty($errores)) {
            try {
                $punto = new Punto($x, $y, $color, $grosor);
            } catch (Exception $e) {
                $errores["general"] = "<p class='mensajeError'>" . $e->getMessage() . "</p>";
            }
        }

    }
   
}








$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 7", $barraUbi);
cuerpo($errores, $punto);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo(array $errores, mixed $punto)
{

if($punto != null){
    echo "Se ha creado el punto correctamente".PHP_EOL;
}else{

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
                //uso la COnstante colores, y cojo la clave (que sera en ingles pero datos sera en español)
                foreach (Punto::COLORES as $clave => $datos){
            ?> 
                    
                <option value="<?= $clave ?>"><?= $datos['nombre'] ?></option>

            <?php 
            }
            ?>
        </select>
        <br>
        <br>
        <label>Grosor:</label>
        <br>
        <br>
        <?php 
                //Creo un foreach dentro para el grosor donde voy creando los radios
                //uso la COnstante grosores
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
<?php

}


}

