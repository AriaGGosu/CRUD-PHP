<?php

class Model {

// en la siguiente funcion de la clase modelo comparamos el valor de $rutas anteriormente traido por metodo GET
// y se le asigna un valor de string como ruta a la variable $pagina con el valor concatenado de la variable
// $rutas concatenado a "php" para entregar una informacion dependiendo de lo que tenga el metodo GET

    static public function RoutesModel($routes){

        if($routes == "login" || $routes == "register" || $routes == "employee" || 
           $routes == "logout" || $routes == "edit"){

            $page ="view/modules/". $routes.".php";

        }elseif($routes == "index"){

            $page = "view/modules/login.php";

        }else {

            $page = "view/modules/login.php";

        }

        return $page;

    }
}

?>