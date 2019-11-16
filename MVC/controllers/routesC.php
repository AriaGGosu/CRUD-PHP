<?php

class RoutesController{

    public function Template() {
        include "view/template.php";
    }
// funcion publica con nombre rutas
// esta funcion comprueba si la variable rutas traida por metodo get esta definida
// si esta definida guardamos la variable en la variable "ruta" en $rutas 
// o si no le asignamos un valor por defecto 

    public function Routes(){
        if(isset($_GET["ruta"])){
            $routes = $_GET["ruta"];
        }else{
            $routes = "index";
        }

// aqui tenemos la variable $respuesta que sera un objeto de la clase modelo
// asociada a la funcion RutasModelo y esta recibira el valor traido por metodo GET de $routes

    $response = Model::RoutesModel($routes);
    include $response;
    
    }
}

?>