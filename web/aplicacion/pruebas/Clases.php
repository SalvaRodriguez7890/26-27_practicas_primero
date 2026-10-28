<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");

//controlador
$barra = [
    [
        "TEXTO" => "inicio",
        "ENLACE" => "/index.php",
    ],
    [
        "TEXTO" => "Pruebas",
        "ENLACE" => "/aplicacion/pruebas/index.php",
    ],
    [
        "TEXTO" => "clases"
    ]
];
$usuario = getenv("MYSQL_USER");


//se crea una instancia de la clase prueba 
$instancia = new ClasePrueba();
//accede a la propiedad pública de la instancia 
$instancia->propPublica = 50;

//se accede a la propiedad de clase (estática)
ClasePrueba::$propEstatica[1] = 10;

$datos=["codigo"=>12,"nombre"=>"prueba2"];
$datosJSon=json_encode($datos);

//esto da error porque el consturtor es privado
//$inst = new Prueba(12,"cadena");

//no hay constructor público, por lo que tengo que
//llamar a las funciones de creación estaticas
$p1 = Prueba::desdeDatos(5, 'Objeto');
$p2 = Prueba::desdeJson($datosJSon);


//$programa = Unica::crear(100);

//$programa->numero =1;

//$segunda = Unica::crear(300);

$ins = new Instituto();


//sobrecarga

// $clase1 = new Clasenormal();
// $clase2 = new Clasenormal();

// $clase1->cadena ="Hola mundo";

// $cad ="";

// if(isset($clase1->cadena)){
//     $cad = $clase1->cadena;
// }

//clase sin sobrecarga
// $clase1 = new ClaseSinSobrecarga();

// $clase1->cadena = "adios";
// $cad = $clase1->cadena;

// if(isset($clase1->cadena)){
//     $cad = $clase1->cadena;
// }

//clase sobrecargada

// $clase1 = new ClaseSobrecargada();

// $val = $clase1->moreno;
// $val = $clase1->marcha;
// $val = $clase1->numero;
// //$val = $clase1->hora;

// $clase1->marcha=$val;
// $clase1->numero=$val+10;
// $clase1->hora=$val;


//Uso de la clase dinamica que guarda las propiedades en un array privado
$clase1 = new ClaseDinamica();
$clase2 = new ClaseDinamica();

$clase1->nombre = "vicente";

$cadena = $clase1->nombre;

$clase1 -> varPublica=20;

if(isset($clase2->nombre))
        $cadena=$clase2->nombre;

unset($clase1->nombre);

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Pruebas", $barra);
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
}


/**
 * Clase prueba usada para mostrar el funcionamiento de los
 * distintos elementos
 */
class ClasePrueba
{

    //definición de constantes
    public const PI = 2.14;

    //definición de propiedad
    public int $propPublica = 1;

    private string $_propPrivada = "hola";

    protected float $_propProtegida = 1.234;

    //definición de propiedad estática
    public static $propEstatica = array(1, 2, 3);

    //definición de método
    public function metodo()
    {
        //acceso a las propiedades desde el propio objeto
        $this->propPublica = 13;

        $this->_propPrivada = 100;

        $this->_propProtegida = "adios";

        //acceso a la propiedad estática

        self::$propEstatica[0] = "otra";

        return true;
    }
}

/**
 * Clase de prueba en la que se comprueban las propiedades y métodos.
 */
class Prueba
{
    private ?int $_codigo;
    private ?string $_nombre;
    //el constructor es privado
    private function __construct(?int $codigo = null, ?string $nombre =
    null)
    {
        $this->_codigo = $codigo;
        $this->_nombre = $nombre;
    }
    //constructor estatico publico
    public static function desdeDatos(int $codigo, string $nombre): static
    {

        if($codigo < 0)
            $codigo = 0;

        //creo el objeto usando static
        $obj = new static($codigo, $nombre);
        return $obj;
    }
    //constructor estatico publico
    public static function desdeJson(string $json): static
    {
        $datos = json_decode($json);
        return new static($datos->codigo, $datos->nombre);
    }
}

// class Unica{

//     private static bool $_creada = false;
//     public int $numero = 12;

//     private ?Unica $_objeto = null;

//     private function __construct(int $val=0){
//         $this -> numero = $val;
//     }

//     public static function crear(int $numero):static{

//         if(self::$_creada){
//             return self::$_objeto;
//         }

//         $obj = new static($numero);
//         self::$_objeto=$obj;
//         self::$_creada=true;

//         return self::$_objeto;
//     }




// }