<?php
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");



/**
 * Se tendrá la clase Punto (guardada en /scripts/clases) para guardar un punto con las siguientes
 * características:
 *- Constante pública de clase COLORES con los colores posibles (mínimo 4 colores) donde
 *cada fila será de la forma nombre_color_inglés => [“nombre”=> “nombre color español”,
 *“rgb” => [entero rojo, entero azul, entero verde]],
 *(ej “black”=>[“nombre”=>”negro”, “rgb” =>[0,0,0]]).
 *- Constante pública de clase GROSORES con los grosores posibles ([1 =>”fino”, 2 =>
 *“medio”, 3 => “grueso”]
 *- Propiedades x (entero, entre 0 y 20000), y (entero, entre 0 y 20000), color (cadena, valor
 *en inglés – según constante COLORES) y grosor (entero, valores según la constante
 *GROSORES – 1, 2, 3- ). Las propiedades son privadas y se acceden con métodos set/get.
 *Los set devuelven true/false si es correcto el valor. Si es correcto se actualiza el valor de
 *la propiedad.
 *- En el constructor se pasan parámetros para todas las propiedades. Si no se cumple
 *alguna restricción se lanza una excepción.
 *- No se pueden crear propiedades dinámicas.
 *
 */

class Punto {

    public const COLORES = [
        "brown" => ["nombre"=>"marron","rgb"=>[165, 42, 42]],
        "lightgreen" => ["nombre"=>"verde claro","rgb"=>[144, 238, 144]],
        "yellow" => ["nombre"=>"amarillo","rgb"=>[255,255, 0]],
        "pink" => ["nombre"=>"rosa","rgb"=>[255, 192, 203]],
        "darkblue" => ["nombre"=>"azul oscuro","rgb"=>[0, 0, 139]],
        "red" => ["nombre"=>"rojo","rgb"=>[255, 0, 0]],
        "green" => ["nombre"=>"verde","rgb"=>[0, 255, 0]],
        "blue" => ["nombre"=>"azul","rgb"=>[0, 0, 255]]  
                            ];
    public const GROSORES = [
                            1=>"fino",
                            2=>"medio",
                            3=>"grueso",
                            4=>"muy grueso"
                            ];

    private int $_x;
    private int $_y;
    private string $_color;
    private int $_grosor;

    /**
     * Constructor de la clase Puto
     */
    public function __construct(int $ejeX, int $ejeY, string $color, int $grosor) {
       
        //compruebo el ejex
        if (!$this->setX($ejeX)) {
            throw new Exception("Valor del Eje X incorrecto");
        }
        //compruebo el ejey
        if (!$this->setY($ejeY)) {
            throw new Exception("Valor del Eje Y incorrecto");
        }
        //Compruebo color
        if (!$this->setColor($color)) {
            throw new Exception("El color no existe");
        }
        //Compruebo grosor
        if (!$this->setGrosor($grosor)) {
            throw new Exception("El grosor no existe");
        }
    }


    /**
     * Método mágico __set: se ejecuta al asignar una propiedad que no existe
     * o no es accesible. Lanzo una excepción para impedir propiedades dinámicas.
     */
    public function __set(string $nombre, $valor): void {
        throw new \Exception("No se pueden crear propiedades dinámicas en la clase " . self::class . ": $nombre");
    }

    /* GETTERS  y SETTERS */

    public function getX(): int {
        return $this->_x;
    }

    public function setX(int $X): bool {
       
        //con la libreria VALFINAL VALIDO el numero entero entre 0 y 20000
       if(!\VALFINAL\validaEntero($X, 0, 20000, 0)){
        return false;
       }   
        $this->_x = $X;
        return true;
    }

    public function getY(): int {
        return $this->_y;
    }

    public function setY(int $Y): bool {

        //con la libreria VALFINAL VALIDO el numero entero entre 0 y 20000
       if(!\VALFINAL\validaEntero($Y, 0, 20000, 0)){
        return false;
       }   
        $this->_y = $Y;
        return true;
    }

    public function getGrosor(): int {
        return $this->_grosor;
    }

    public function setGrosor(int $grosor): bool {
       //el grosor lo compruebo igual que con el color, comprobando si xiste el parametro grosor
       // dentro del array de grosores

        if(!array_key_exists($grosor, self::GROSORES)){
            return false;
        }

        $this->_grosor = $grosor;
        return true;
    }

    public function getColor(): string {
        return $this->_color;
    }

    public function setColor(string $color): bool {
        //voy a usar el array_key_exists, al que le paso el color y el array de la constante COLORES
        //la cual voy a comparar el color (en ingles) a ver si existe dentro del array 
        //uso self:: para referime a la propiead colores
        if(!array_key_exists($color, self::COLORES)){
            return false; //si no está devuelvo false
        }
        $this->_color = $color;
        return true;
    }

    /**
     * To String para mostrar algo del punto
     *
     * @return string
     */
    public function toString():string {

       return  $this->getX() . " ; ". $this->getY(). " ; ". $this->getColor(). " ; ". $this->getGrosor();
    }




}