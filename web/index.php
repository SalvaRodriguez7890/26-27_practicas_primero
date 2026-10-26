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
            <br>
                <lu>
                    <li><a href="/aplicacion/pruebas/index.php">Acceso a Pruebas</a></li>
                    <li><a href="/aplicacion/relacion1/ejercicios.php">Acceso a ejercicios Relacion 1</a></li>
                    <li><a href="/aplicacion/relacion1Corregida/index.php">Acceso a ejercicios Relacion 1 CORREGIDA</a></li>
                    <li><a href="/aplicacion/relacion2/ejercicios.php">Acceso a ejercicios Relacion 2</a></li>
                    <li><a href="/aplicacion/relacion3/ejercicios.php">Acceso a ejercicios Relacion 3</a></li>
                    <li><a href="/aplicacion/expresionesRegulares/expresiones.php">Acceso a Expresiones Regularses (Ejemplos)</a></li>
                </lu>

   
    
<?php
}
