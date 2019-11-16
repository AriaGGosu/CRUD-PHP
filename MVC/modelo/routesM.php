<?php

class Modelo {

// en la siguiente funcion de la clase modelo comparamos el valor de $rutas anteriormente traido por metodo GET
// y se le asigna un valor de string como ruta a la variable $pagina con el valor concatenado de la variable
// $rutas concatenado a "php" para entregar una informacion dependiendo de lo que tenga el metodo GET

    static public function RutasModelo($rutas){

        if($rutas == "login" || $rutas == "register" || $rutas == "employee" || 
           $rutas == "logout" || $rutas == "edit"){

            $pagina ="vistas/modules/". $rutas.".php";

        }elseif($rutas == "index"){

            $pagina = "vistas/modules/login.php";

        }else {

            $pagina = "vistas/modules/login.php";

        }

        return $pagina;

    }
}

?>