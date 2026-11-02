<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador

$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "LINK" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 4",
        "LINK" =>""
    ],
    [
        "TEXTO"=>"Ejercicios Clases",
        "LINK" =>"/aplicacion/relacion4"
    ]
];

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 4", $barraUbi);
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


echo "<hr>".PHP_EOL;

echo "<b>EJERCICIO 1:</b> <br><br>".PHP_EOL;
//Para probar el ejercicio 1 creo 3 objetos, metiendoles edad y sin meterle
//para comprobar el atributo por defecto 10 de edad

//$trompeta = new InstrumentoBase("Trompeta", 5);

//$guitarra = new InstrumentoBase("Guitarra", 40);

//$saxofon = new InstrumentoBase("Saxofon");

//ahora simplemente los muestro pero de forma distinta a como se crearon
//para comprobar que aunque guitarra la muestre la ultima me diga que fue
//la segunda en crearse (instacia 2)
    //echo "<b>".$trompeta."</b>".PHP_EOL;
    //echo "<br>".PHP_EOL;
    //echo "<br>".PHP_EOL;
    //echo "<b>".$saxofon."</b>".PHP_EOL;
    //echo "<br>".PHP_EOL;
    //echo "<br>".PHP_EOL;
    //echo "<b>".$guitarra."</b>".PHP_EOL;

//ahora vamos a probar a aumentar la edad de los 3

    //echo "<br>".PHP_EOL;
    //echo "<br>".PHP_EOL;
    //echo "<b>Le sumamos un año a cada instrumento y ahora tienen:</b>".PHP_EOL;

//$guitarra->envejecer();
//$saxofon->envejecer();
//$trompeta->envejecer();

//Ahora vamos a llamar a la edad directamente para saber si han envejecido
    
   // echo "<br>".PHP_EOL;
    //echo "<br>".PHP_EOL;
    //echo "El instrumento: ".$trompeta->getDesripcion()." tiene <b>".$trompeta->getEdad()."</b> años".PHP_EOL;
    ////echo "<br>".PHP_EOL;
    //echo "<br>".PHP_EOL;
    //echo "El instrumento: ".$saxofon->getDesripcion()." tiene <b>".$saxofon->getEdad()."</b> años".PHP_EOL;
    //echo "<br>".PHP_EOL;
    //echo "<br>".PHP_EOL;
    //echo "El instrumento: ".$guitarra->getDesripcion()." tiene <b>".$guitarra->getEdad()."</b> años".PHP_EOL;



    
    /**
    * Clase para probrar la interfaz IFabricable
    */

    class SillaPlastico implements IFabricable {
        
        public function metodoFabricacion(): string {
            return "1. Inyección de polipropileno en molde. 2. Enfriamiento. 3. Ensamblaje de patas.";
        }

        public function metodoReciclado(): string {
            return "Triturado del plástico para fundirlo y reutilizarlo en la creación de nuevos moldes.";
        }
    }
    echo "<hr><br>".PHP_EOL;
    echo "<b>EJERCICIO 2:</b> <br><br>".PHP_EOL;      

    //creo un objeto de la clase que implementa la interfaz para probar los metodos
    $pruebaInterfaz = new SillaPlastico();

    echo "<b>Metodo Fabricacion:</b> <br>".PHP_EOL;

    //llamo a un metodo
    echo "<br>".$pruebaInterfaz->metodoFabricacion().PHP_EOL;

    echo "<br>".PHP_EOL;
    echo "<br>"."<b>Metodo Reciclado:</b> <br>".PHP_EOL;

    //y ahora el otro
    echo "<br>".$pruebaInterfaz->metodoReciclado().PHP_EOL;

    
    echo "<br>".PHP_EOL;
    echo "<br><hr><br>".PHP_EOL;

    echo "<b>EJERCICIO 3:</b> <br><br>".PHP_EOL;      

    echo "<b>Creo el objeto Clarinete y llamo a los diferentes metodos de esta:</b> <br>".PHP_EOL;
    //Creo un objeto de la clase InstrumentoViento y por ejemplo le digo que es "flautta" no le pongo edad ni material para que coja los valores por defecto
    $clarinete = new InstrumentoViento();
    
    echo "<br><b>Para afinar el clarinete -> </b>".$clarinete->afinar().PHP_EOL;

    echo "<br>".PHP_EOL;

    echo "<br><b>El Clarinete suena -> </b>".$clarinete->sonido().PHP_EOL;

    echo "<br>".PHP_EOL;
    //ahora voy a usar el método toString para que me mustre sus caracteristicas y ve si funciona el llamamiento al super que realicé
    echo "<br><b>El Clarinete tiene unas caracteristicas -> </b>".$clarinete->__toString().PHP_EOL;

    echo "<br>".PHP_EOL;
    echo "<br><hr><br>".PHP_EOL;

    echo "<b>EJERCICIO 4:</b> <br><br>".PHP_EOL;      

    echo "<b>Creo el objeto flauta y llamo a los diferentes metodos de esta:</b> <br>".PHP_EOL;
    //LLamo al método estatic0o de la clase CrearDesdeArray pàra crear una flauta, el array lo creo directamente dentro del método
    $flauta = Flauta::CrearDesdeArray(['material' => 'madera de pino', 'edad' => 31]);
    
    echo "<br><b>Para afinar la flauta -> </b>".$flauta->afinar().PHP_EOL;

    echo "<br>".PHP_EOL;

    echo "<br><b>La Flauta suena -> </b>".$flauta->sonido().PHP_EOL;

    echo "<br>".PHP_EOL;


    //ahora voy a usar el método toString para que me mustre sus caracteristicas y ve si funciona el llamamiento al super que realicé
    echo "<br><b>La Flauta tiene unas caracteristicas -> </b>".$flauta->__toString().PHP_EOL;

    echo "<br>".PHP_EOL;

    echo "<br><b>Clonamos la flauta y la llamamos \$flauta2 </b>".PHP_EOL;
    //cremaos flauta2 llamando al clone que definimos, este nuevo objeto será igual pero con edad = 0
    $flauta2 = clone $flauta;

    echo "<br><b>Para afinar la flauta2 -> </b>".$flauta2->afinar().PHP_EOL;

    echo "<br>".PHP_EOL;

    echo "<br><b>La Flauta suena -> </b>".$flauta2->sonido().PHP_EOL;

    echo "<br>".PHP_EOL;


    //ahora voy a usar el método toString para que me mustre sus caracteristicas y ve si funciona el llamamiento al super que realicé
    echo "<br><b>La Flauta2 tiene unas caracteristicas -> </b>".$flauta2->__toString().PHP_EOL;

    
    echo "<br>".PHP_EOL;
    echo "<br><hr><br>".PHP_EOL;

    echo "<b>EJERCICIO 5:</b> <br><br>".PHP_EOL;   

    // Para probar la enumeracion simplemente creo una variable con un estado, por ejemplo casasdo
    $miEstado = EstadoCivil::CASADO;

    //Pruebo el método descripcion() para obtener la descripción del estado civil
    echo "Descripción del estado: " . $miEstado->descripcion() . "<br>"; 

    //Pruebo el método valor de ese estado
    echo "Valor: " . $miEstado->valor() . "<br>"; // Imprime: 20

    // Accdo a las vbariables también usando directamente la ->
    echo "Nombre del estado: " . $miEstado->name . "<br>"; 
    echo "Valor del estado: " . $miEstado->value . "<br>"; 

    echo "<br>";

    //Ahora voy a probar a sacar los casos usando un foreach para recorrer el array que nos devuelve
    echo "<strong>Listado de todos los casos:</strong><br>";

    //Creo el foreach con diorectamente el llamamiento al la funcion casos()
    foreach (EstadoCivil::casos() as $caso) {
        // Cadaa caso es un estado civil, por lo que accedo a sus metodos
        echo "- " . $caso->descripcion() . " (Valor: " . $caso->valor() . ")<br>";
    }



}


