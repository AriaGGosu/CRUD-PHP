<?php

class Modelo {

// en la siguiente funcion de la clase modelo comparamos el valor de $rutas anteriormente traido por metodo GET
// y se le asigna un valor de string como ruta a la variable $pagina con el valor concatenado de la variable
// $rutas concatenado a "php" para entregar una informacion dependiendo de lo que tenga el metodo GET

    static public function RutasModelo($rutas){

        if($rutas == "ingreso" || $rutas == "registrar" || $rutas == "empleados" || 
           $rutas == "salir" || $rutas == "empleados" || $rutas == "editar"){

            $pagina ="vistas/modulos/". $rutas.".php";

        }elseif($rutas == "index"){

            $pagina = "vistas/modulos/ingreso.php";

        }else {

            $pagina = "vistas/modulos/ingreso.php";

        }

        return $pagina;

    }
}

?>