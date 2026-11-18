<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
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



$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 7", $barraUbi);
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
   
}

//vista
function cuerpo()
{



  ?>
    
    <h1>INGRESA LAS COORDENADAS</h1>
    <hr>
    <br>

    <form id="coordenadas" method="POST">
        <label>Eje X:</label>
        <input id="ejeX" type="text" name="ejeX">
        <br>
        <br>
        <label>Eje Y:</label>
        <input id="ejeY" type="text" name="ejeY"><br>
        <br>
        <input id="btnGuardar" type="submit" name="accion" value="guardar">
    </form>



    
<?php


}

