<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador
$barra=[
    [
    "TEXTO"=>"inicio",
    "ENLACE"=>"/index.php",
    "ADICIONAL" => ">>"
    ],
    [
    "TEXTO"=>"otro"
    ],
    [
    "TEXTO"=>"index",
    "ADDICIONAL" => "&copy;&copy;"
    ]
];

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION", $barra);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <!--Comentario-->

    <?php
}

//vista
function cuerpo()
{
?>
    

    <a href="./aplicacion/pruebas/index.php">Acceso a pruebas</a>
    <br>
    
<?php
}
