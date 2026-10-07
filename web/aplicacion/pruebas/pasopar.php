<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$usuario = getenv("MYSQL_USER");

//Datos basicos
$nombre="Salvador";
$edad=26;

$basicos=[
    "nombre" => $nombre,
    "edad" => $edad
];

//relleno otras

$otras=rellenarOtras();

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Index pruebas",[]);
cuerpo($basicos, $otras);  //llamo a la vista
finCuerpo();
// **********************************************************






//vista
function cabecera() {

        ?>
            <!--Comentario estp es el head-->

        <?php

    

}

//vista
function cuerpo($bas, $ot)
{
?>
    <br><br>
    Hola, estás en Index.php

    <br>
    <a href="./basicas.php">Acceso a Basicas</a>
    <br>
    <br>
    

<?php

    echo "Mi nombre es: {$bas["nombre"]} de {$bas["edad"]} años".PHP_EOL;
    echo "Con otros datos {$ot}".PHP_EOL;

}

function rellenarOtras(){
    return "de 2-DAW";
}