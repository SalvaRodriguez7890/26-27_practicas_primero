<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
    "TEXTO"=>"inicio",
    "ENLACE"=>"/index.php",
        ],
    [
    "TEXTO"=>"pruebas",
    "ENLACE"=>"/aplicacion/pruebas/index.php",
    ],
     [
    "TEXTO"=>"eje. formulario"
    ]
];


$o = [
    "options" => [
        "min_range"=>100,
        "max_range"=>200,
        "default"=>100
    ]
];

$res = filter_var('123',FILTER_VALIDATE_INT, $o);

$o = [
    "options" => [
        "min_range"=>100,
        "max_range"=>200,
        "default"=>100
    ],
    "flags"=>FILTER_FLAG_ALLOW_HEX
];

$res = filter_var('0x81',FILTER_VALIDATE_INT, $o);

//Inicializadores

$datos = [
    "nombre" => "Vic",
    "precio" => 12
        ];
$errores = [];

if(isset($_POST["cr"])){

//Verifico el nombre

    $nombre = "";


}




$usuario = getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Pruebas Basicas", $barra);        
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************



//vista
function cabecera() {}

//vista
function cuerpo()
{


?>
  
<?php


?>


<?php
}
?>
<!-- Comentario HTML--> 