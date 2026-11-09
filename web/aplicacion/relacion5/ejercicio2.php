<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
include_once(dirname(__FILE__) . "/../../scripts/librerias/validacion.php");
//controlador



$barraUbi = [
    [
        "TEXTO"=>"Inicio",
        "ENLACE" =>"/index.php"
    ],
    [
        "TEXTO"=>"Relacion 5",
        "ENLACE" =>"/aplicacion/relacion5/ejercicios.php"
    ],
    [
        "TEXTO"=>"Ejercicio 2",
        "ENLACE" =>"/aplicacion/relacion5/ejercicios2.php"
    ]
];

//Valores
$valores = [
    "nombre" => "",
    "password" => "",
    "fecha_nacimiento" => "",
    "diaC" => "",
    "mesC" => "",
    "anioC" => "",
    "hora" => "",
    "estado" => "",
    "estudios" => [],
    "hermanos" => "0",
    "sueldo" => "1100"
];
$errores = [];
$enviadoCorrectamente = false;

//Ahora voy a comprobar si el usuario le a dado a lboton y ha enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//Voy sacando los datos del formulario
    $valores['nombre'] = $_POST['nombre'] ?? '';
    $valores['password'] = $_POST['password'] ?? '';
    $valores['fecha_nacimiento'] = $_POST['fecha_nacimiento'] ?? '';
    $valores['diaC'] = $_POST['diaC'] ?? '';
    $valores['mesC'] = $_POST['mesC'] ?? '';
    $valores['anioC'] = $_POST['anioC'] ?? '';
    $valores['hora'] = $_POST['hora'] ?? '';
    $valores['estado'] = isset($_POST['estado']) ? $_POST['estado'] : '';
    $valores['estudios'] = isset($_POST['estudios']) ? $_POST['estudios'] : [];
    $valores['hermanos'] = $_POST['hermanos'] ?? '0';
    $valores['sueldo'] = $_POST['sueldo'] ?? '1100';

//Empiezo a validar usando mi libreria

//El nombre no puede medir mas de 25, no puede estar vacio, empezar por h
    if (!VALFINAL\validaCadena($valores['nombre'], 25, "") || trim($valores['nombre']) === "") {
        //si entra dentro de este if es por que devuelv false, osea o da error al comprobar la cadena
        //o se le ha pasado una cadena vacia, pues meto un error al array errores.
        $errores['nombre'] = "El nombre no puede estar vacío ni superar los 25 caracteres.";
    } else {
        //sino lo pongo en mayuscula
        $valores['nombre'] = strtoupper(trim($valores['nombre']));
        //ahora compruebo si empieza por H mayuscula
        if (str_starts_with($valores['nombre'], 'H')) {
            //si empesace pues le meto este error al array
            $errores['nombre'] = "El nombre no puede empezar por la letra H.";
        }
    }

//miro que la contraseña tenga minimo 8 y maximo 9, con almenos 1 numero, 1 mayucula y minuscula y 1 caqracter especial
// uso la siguiente expresion regular

 $passPatron = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\$\-\;\<\>\@]).{8,15}$/';

 //Valido la expresion regular con la contraseña
    if (!VALFINAL\validaExpresion($valores['password'], $passPatron, "")) {
        //si se ha introducido una contraseña que no cumpla con la expresion pues meto este error al array de errores
        $errores['password'] = "La contraseña debe tener entre 8 y 15 caracteres, incluir mayúscula, minúscula, número y un carácter especial ($-;<>@).";
    }

    //Para la fecha de nacimiento la valido con la funcion
    if (!VALFINAL\validaFecha($valores['fecha_nacimiento'], "")) {
        //si devuelve false pues meto el error
        $errores['fecha_nacimiento'] = "La fecha de nacimiento no es válida (formato dd/mm/aaaa).";
    }

    //Con empty compruebo que en errores 'fecha_nacimiento' este vacia, si lo esta entonces sigo comprobando
      if (empty($errores['fecha_nacimiento'])) {
        $d = $valores['diaC'];
        $m = $valores['mesC'];
        $a = $valores['anioC'];

        //Ahora compreubo que la fecha sea correcta con el checkdate
        if (!checkdate($m, $d,$a)) {
            $errores['carnet'] = "La fecha de carnet introducida no es válida.";
        } else {
            //Creo dos datetime para ssaber si es mayor de edad
            $dtNacimiento = DateTime::createFromFormat('d/m/Y', $valores['fecha_nacimiento']);
            $dtCarnet = new DateTime("$a-$m-$d");

            //A la edadd el carte le resto la fecha de nacimiento con el metodo diff y saco el año con el y
            $edadAlCarnet = $dtNacimiento->diff($dtCarnet)->y;

            //si es menor de 18 le meto elrror
            if ($edadAlCarnet < 18) {
                $errores['carnet'] = "Debes ser mayor de edad (al menos 18 años) en la fecha del carnet.";
            }
        }
    } else {    
        //si no a entrado en todo lo de atras es porque directamente no es valida la fecha
        $errores['carnet'] = "Introduce una fecha de nacimiento válida para comprobar el carnet.";
    }

    //Valido la hora de levantarse
    if (!VALFINAL\validaHora($valores['hora'], "")) {
        //si validarHora devuelve false pues le meto el error
        $errores['hora'] = "La hora introducida no es válida (formato hh:mm:ss).";
    }

    //Estado (1 a 4 válidos, 5 incorrecto para prueba, obligatorio)
    $estadosValidos = [1, 2, 3, 4, 5];
    $valEstado = $valores['estado'];
    
    //compruebo que no este vacio, que este dentro del rango y que no sea 5, si alguno se cumple le meto el error
    if ($valores['estado'] === '' || !VALFINAL\validaRango($valEstado, $estadosValidos, 1) || $valEstado === 5) {
        $errores['estado'] = "Debe seleccionar un estado válido obligatorio.";
    }

    //Estudios (0 a 5 válidos, 6 incorrecto, al menos uno, si 0 se desmarca el resto)
    $estudiosValidos = [0, 1, 2, 3, 4, 5, 6];
    //con array_map 'interval' paso el valor string que contiene $valores['estudios'] a valor numerico
    $valores['estudios'] = array_map('intval', $valores['estudios']);

    //vuevlo a comprobar que el error 'estudios' esté vacio
    if (empty($valores['estudios'])) {
        //si esta vacio pues le digo que hay que seleccionar almenos 1
        $errores['estudios'] = "Debe seleccionar al menos una opción de estudios.";
    } else {
        //ahora con un foreach recorro los estudios
        foreach ($valores['estudios'] as $est) {
            //voy validando estudios y comprobando su rango y que sea difeente de 6 (que era la incorrecta)
            //estudios validos es el array que va desde el 1 al 5
            if (!VALFINAL\validaRango($est, $estudiosValidos, 1) || $est === 6) {
                $errores['estudios'] = "Se ha seleccionado una opción de estudios no válida.";
                break;
            }
        }
        //compreubo si el estudio "0" (sin estudios) esta dentro del los valores
        if (in_array(0, $valores['estudios'])) {
            //si está marcado pues pongo que ese valor es 0 porque no teien estudios
            $valores['estudios'] = [0];
        }
    }

    //Hermanos, que minimo o no tienes o tienes 20
    $valHermanos = $valores['hermanos'];
    //lo valido a entero
    if (!VALFINAL\validaEntero($valHermanos, 0, 20, 0)) {
        //meto el error si esque sale
        $errores['hermanos'] = "El número de hermanos debe estar entre 0 y 20.";
    } else {
        //meto el valor
        $valores['hermanos'] = $valHermanos;
    }

    //Ahora con el sueldo, pero este es un valor real un float
    $valSueldo = $valores['sueldo'];
    if (!VALFINAL\validaReal($valSueldo, 1000.0, 150000.0, 1100.0)) {
        $errores['sueldo'] = "El sueldo debe estar comprendido entre 1000 y 150000 €.";
    } else {
        $valores['sueldo'] = $valSueldo;
    }

    //Si no hay errores, paso al resumen
    if (empty($errores)) {
        $enviadoCorrectamente = true;
    }
}







$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Relacion de Ejercicios 5", $barraUbi);
cuerpo($valores, $errores, $enviadoCorrectamente);  //llamo a la vista
finCuerpo();
// **********************************************************


//vista
function cabecera() 
{
   
}



//vista
function cuerpo($valores, $errores, $enviadoCorrectamente)
{
//Compreubo si la variable "$enviadoCorrectamente" está a true, si es a sí muestro el resumen
if ($enviadoCorrectamente) {
        // RESUMEN SI TODO ES CORRECTO
        echo "<h2>Datos Correctos</h2>";
        echo "<p><b>Nombre:</b> " . $valores['nombre']. "</p>";
        echo "<p><b>Fecha de nacimiento:</b> " . $valores['fecha_nacimiento']. "</p>";
        echo "<p><b>Fecha de carnet:</b> " . $valores['diaC'] . "/" . $valores['mesC'] . "/" . $valores['anioC'] . "</p>";
        echo "<p><b>Hora de levantarse:</b> " . $valores['hora'] . "</p>";
        
        //creo un array asociativo con los valores
        $textosEstado = [1 => "Estudiante", 2 => "En paro", 3 => "Trabajando", 4 => "Jubilado"];
        //Con el implode junto en una cadena el array de estado y los muestro
        echo "<p><b>Estado:</b> " . ($textosEstado[$valores['estado']] ?? 'Desconocido') . "</p>";

        $textosEstudios = [0 => "Sin estudios", 1 => "Primaria", 2 => "Secundaria", 3 => "Bachillerato", 4 => "Ciclo formativo", 5 => "Universitarios"];
        $estudiosElegidos = [];

        foreach ($valores['estudios'] as $cod) {
            //con el foreach y el isset voy comprobando que el codigo exista en el array de estudios
            if (isset($textosEstudios[$cod])) {
                $estudiosElegidos[] = $textosEstudios[$cod];
            }
        }
        //vuelvo a mostar con implode los valores del aray estudio
        echo "<p><b>Estudios:</b> " . implode(", ", $estudiosElegidos) . "</p>";
        echo "<p><b>Hermanos:</b> " . $valores['hermanos'] . "</p>";
        echo "<p><b>Sueldo:</b> " . $valores['sueldo'] . " €</p>";
    } else {
        //Si la variable esta a false pues muestro el formulario con los erroes
        creaFormulario($valores, $errores);
    }


}

function creaFormulario($valores, $errores){
//Con empty miro si el formulari otiene errores, si es la primera vez que se carga aqui ni entra, pero si lo que ha pasado
//es que se ha enviado con el boton y hay errores, pues si existiran erroes y los mostrare
if (!empty($errores)) {
    //le he metido un id que luego en el css le meto stylos
        echo "<div id='mensajeError'><b>Se han encontrado los siguientes errores:</b><ul>";
        //Con el foreach los muestro error por error
        foreach ($errores as $err) {
            echo "<li>$err</li>";
        }
        echo "</ul></div><br>";
    }

?>    
    <br>
    <form method="POST" action="">
    
         <!--nombre--> 
        <label>Nombre (Cadena máx 25):</label><br>
        <input type="text" name="nombre" id="nombre">
        <br><br>

       <!--contraseña-->
        <label>Contraseña (Cadena máx 15, min 8 y usar caracteres especiales):</label><br>
        <input type="password" name="password" id="pass">
        <br><br>

    <!--fecha de nacimiento-->

        <label>Fecha de nacimiento (Cadena ejemplo: dd/mm/aaaa):</label><br>
        <input type="text" name="fecha_nacimiento" id="fechaNac" placeholder="dd/mm/aaaa">
        <br><br>

        <!--Fecha carnet -->
        <label>Fecha de carnet:</label><br>
        <label>Dia:</label>
        <input type="text" name="diaC" id="diaC"><br>
        <label>Mes:</label>
        <input type="text" name="mesC" id="mesC"><br>
        <label>Año:</label>
        <input type="text" name="anioC" id="anioC"><br>
        <br>

    <!--hora de levantarse -->
        <label>Hora de levantarse (Cadena 00:00:00):</label><br>
        <input type="text" name="hora" id="hora" placeholder="00:00:00">
        <br><br>
       
        <!--Estado--> 
        <label>Estado:</label><br>
        <input type="radio" name="estado" value="1"> 1 - estudiante<br>
        <input type="radio" name="estado" value="2"> 2 - en paro<br>
        <input type="radio" name="estado" value="3"> 3 - trabajando<br>
        <input type="radio" name="estado" value="4"> 4 - jubilado<br>
        <input type="radio" name="estado" value="5"> 5 - incorrecta<br>
        <br>

         <!--estudios-->
        <label>Estudios (Puedes marcar varios, o sólo 0 si no tienes):</label><br>
        <input type="checkbox" name="estudios[]" value="0"> 0 - sin estudios<br>
        <input type="checkbox" name="estudios[]" value="1"> 1 - primaria<br>
        <input type="checkbox" name="estudios[]" value="2"> 2 - secundaria<br>
        <input type="checkbox" name="estudios[]" value="3"> 3 - bachillerato<br>
        <input type="checkbox" name="estudios[]" value="4"> 4 - ciclo formativo<br>
        <input type="checkbox" name="estudios[]" value="5"> 5 - universitarios<br>
        <input type="checkbox" name="estudios[]" value="6"> 6 - incorrecta<br>
        <br>

        <!--hermanos--> 
        <label>Hermanos (Entero entre 0 y 20):</label><br>
        <input type="text" name="hermanos" value="0">
        <br><br>

         <!--sueldo -->
        <label>Sueldo (Real entre 1000 y 150000 €):</label><br>
        <input type="text" name="sueldo" value="1100">
        <br><br>

       
        <input type="submit" value="Enviar datos">

    </form>

    <?php
}